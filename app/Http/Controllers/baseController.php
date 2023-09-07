<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use stdClass;

class baseController extends Controller
{
    protected $url;
    protected $bic;

    public function __construct()
    {
        $this->url = 'https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/';
        $this->bic = '021';
    }

    public function getToken()
    {

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'FT22PfIs_8IuYV0PhaCxekYBqFIa',
                'client_secret' => 'ly3Mu2CQVV4JZc5kRl8iJOPQY1ca'
            ]
        ];
        $request = new Request('POST', 'https://suptech-wso2-dev.bot.go.tz:8245/token', $headers);
        $res = $client->sendAsync($request, $options)->wait();
        $res = $res->getBody()->getContents();

        log::info("Token: " . $res);
        $token = new Token();
        $token->token = json_decode($res);
        $token->token = $token->token->access_token;
        $token->save();
        return $res;
    }

    public function sendDataToEndpoint($model, $endpoint, $reportName)
    {
        // $datas = $model::where ('sentStatus', 'no')->get();
        $datas = $model::where('sentStatus', '!=','yes')
            ->limit(5)
            ->get();


        $response = [];
        if (!empty($datas)) {
            foreach ($datas as $sdata) {
                $sdataArray = $sdata->toArray();

                if ($model == balanceOtherBanks::class) {
                    $sdataArray['bankCode'] = $sdataArray['bankName'];
                    unset($sdataArray['bankName']);
                }

                if ($model == cheques::class) {
                    $sdataArray['issuerBanker'] = $sdataArray['issuerBankerCode'];
                    unset($sdataArray['issuerBankerCode']);
                }

                $informationId = baseController::quickRandom(10);
                $data = [$sdataArray];

                $resultCurlPost = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
                $resultCurlPost = json_decode(json_encode($resultCurlPost), true);

                if (is_array($resultCurlPost)) {
                    $sentStatus = $resultCurlPost['rtsisInformation']['informationCode'] == '1001' ? 'yes' : 'failed';
                    $model::where('id', $sdata['id'])->update(['sentStatus' => $sentStatus]);
                    Log::debug($sentStatus);
                }

                $response[]['request'] = $data;
                $response[]['response'] = $resultCurlPost;
            }
            return response()->json($response, HttpResponse::HTTP_OK);
        } else {
            return response()->json("No Data to Send", HttpResponse::HTTP_OK);
        }
    }

    public static function postEndPointResponse($endpoint, $data, $informationId, $reportName)
    {
        try {
            // Remove unnecessary fields from the data
            unset($data[0]['id'], $data[0]['created_at'], $data[0]['updated_at'], $data[0]['sentStatus']);

            $base = new baseController();

            // Get a valid token using the base controller's method
            $token = Token::latest()->first();
            $token = $base->getValidToken($token);

            Log::info("URL: " . $endpoint);

            // Generate the signature
            $signature = self::generateSignature($data, $reportName);

            // Create the content payload
            $content = [
                $reportName => $data,
                "signature" => $signature
            ];

            // Convert the content to JSON string
            $json_string = json_encode($content, JSON_PRETTY_PRINT);

            // Generate headers with required information
            $headers = self::generateHeaders($informationId, $token, $json_string);

            Log::info("Data: " . $json_string);

            // Perform the POST request using cURL
            $resultCurlPost = self::performCurlPost($endpoint, $json_string, $headers);

            return $resultCurlPost;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return 'Error: ' . $e->getMessage();
        }
    }

    public static function generateSignature($data, $reportName)
    {
        try {
            // Read the certificate store from the public disk
            $cert_store = Storage::disk('public')->get('IMBANKprivate.pfx');

            // Attempt to read the private key from the certificate store using a passphrase
            if (openssl_pkcs12_read($cert_store, $cert_info, "passphrase")) {
                // Sign the JSON-encoded data using the private key
                openssl_sign(json_encode($data), $signature, $cert_info['pkey'], "sha256WithRSAEncryption");
                return base64_encode($signature);
            } else {
                throw new \Exception("OPEN SSL Failed");
            }
        } catch (\Exception $e) {
            // Log and handle any exceptions that occur during signature generation
            Log::error('Signature Generation Error: ' . $e->getMessage());
            throw $e; // Re-throw the exception for handling at a higher level
        }
    }

    public static function generateHeaders($informationId, $token, $json_string)
    {
        try {
            $currentDateTime = Carbon::now();
            $formattedDateTime = $currentDateTime->format('Y-m-d H:i');

            return [
                'Content-Type: application/json',
                'Sender: 021',
                'fspInformationId: ' . $informationId,
                'Date: ' . $formattedDateTime,
                'informationId: ' . $informationId,
                'Authorization: Bearer ' . $token,
                'Content-Length: ' . strlen($json_string),
            ];
        } catch (\Exception $e) {
            // Log and handle any exceptions that occur during header generation
            Log::error('Header Generation Error: ' . $e->getMessage());
            throw $e; // Re-throw the exception for handling at a higher level
        }
    }

    public static function performCurlPost($endpoint, $json_string, $headers)
    {
        try {
            // Log::info("Data: " . $json_string);

            $ch = curl_init($endpoint);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_TIMEOUT, 50);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);

            try {
                $resultCurlPost = curl_exec($ch);
                if ($resultCurlPost === false || $resultCurlPost == null) {
                    throw new Exception('cURL request failed: ' . curl_error($ch));
                }

                curl_close($ch);

                Log::info("###  response from the server ####");
                Log::info(json_encode(json_decode($resultCurlPost), JSON_PRETTY_PRINT));
                $resultCurlPost = json_decode($resultCurlPost);

                return $resultCurlPost;
            } catch (Exception $e) {
                Log::error('Error during cURL request: ' . $e->getMessage());
                curl_close($ch); // Close the cURL handle in case of an error
                return 'Error during cURL request: ' . $e->getMessage();
            }
        } catch (\Exception $e) {
            // Log and handle any exceptions that occur during cURL request
            Log::error('cURL Request Error: ' . $e->getMessage());
            throw $e; // Re-throw the exception for handling at a higher level
        }
    }

    public function getValidToken($token)
    {
        if ($token != null) {
            $currentTime = Carbon::now();
            $createdAt = $token->created_at;

            // Check if the token is still valid (less than 1 minute old)
            if ($createdAt->diffInMinutes($currentTime) >= 1) {
                // Get a fresh token if the current token has expired
                $base = new baseController();
                $tokenData = json_decode($base->getToken());
                return $tokenData->access_token;
            } else {
                // Return the current token if it's still valid
                return $token->token;
            }
        } else {
            // Get a new token if no token is available
            $base = new baseController();
            $tokenData = json_decode($base->getToken());
            return $tokenData->access_token;
        }
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function convertKeysToCamelCase(array $data)
    {
        $result = [];

        foreach ($data as $key => $value) {
            // Convert snake_case key to camelCase
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            $result[$key] = $value;
        }

        return $result;
    }

    function camelCaseToSnakeCase($input)
    {
        $snakeCase = preg_replace('/([a-z0-9])([A-Z])/', '$1_$2', $input);
        return strtolower($snakeCase);
    }

    public function removeQuotedIntegers(array $data)
    {
        $newData = [];

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                // Recurse into sub-arrays
                $newData[$key] = $this->removeQuotedIntegers($value);
            } elseif (is_numeric($value)) {
                // Convert quoted numeric strings to integers
                $newData[$key] = (int)$value;
            } else {
                // Keep non-numeric values unchanged
                $newData[$key] = $value;
            }
        }

        return $newData;
    }
}
