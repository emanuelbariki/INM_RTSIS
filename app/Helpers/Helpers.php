<?php
namespace App\Helpers;

use App\Models\Token;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;

class Helpers
{
    /**
     * Getting random strings
     */
    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    /**
     * Getting token
     */
    public function getToken()
    {
        $client = new Client();

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'FT22PfIs_8IuYV0PhaCxekYBqFIa',
                'client_secret' => 'ly3Mu2CQVV4JZc5kRl8iJOPQY1ca',
            ],
        ];

        $request = new Request('POST', 'https://suptech-wso2-dev.bot.go.tz:8245/token', $headers);
        $res = $client->sendAsync($request, $options)->wait();
        $res = $res->getBody()->getContents();

        $token = new Token();

        $token->token = json_decode($res);
        $token->token = $token->token->access_token;
        $token->save();

        return $res;
    }

    public function postEndPointResponse($endpoint, $data, $informationId, $reportName)
    {

        try {

            $getToken = $this->getToken();
            // $base = new baseController();

            $currentTime = Carbon::now();
            $token = Token::latest()->first();

            if ($token != null) {
                $createdAt = $token->created_at;

                if ($createdAt->diffInMinutes($currentTime) >= 1) {
                    $token = json_decode($getToken);

                    $token = $token->access_token;
                } else {
                    $token = $token->token;
                }
            } else {
                $token = json_decode($getToken);
                $token = $token->access_token;
            }

            // TODO change the name
            $cert_store = Storage::disk('public')->get('IMBANKprivate.pfx');

            // TODO enable open ssl in php file
            if (openssl_pkcs12_read($cert_store, $cert_info, "passphrase")) {

                openssl_sign(json_encode($data), $signature, $cert_info['pkey'], "sha256WithRSAEncryption");

                //output crypt data base64 encoded
                $signature = base64_encode($signature);
                $content = array(
                    '' . $reportName . '' => $data,
                    "signature" => $signature,
                );

                $json_string = json_encode($content, JSON_PRETTY_PRINT);

                $currentDateTime = Carbon::now();
                $formattedDateTime = $currentDateTime->format('Y-m-d H:i');

                // FIXME sender change
                $headers = array(
                    'Content-Type:application/json',
                    'Sender: 021',
                    'fspInformationId:' . $informationId,
                    'Date:' . $formattedDateTime,
                    'informationId: ' . $informationId,
                    'Authorization: Bearer ' . $token,
                    'Content-Length:' . strlen($json_string),
                );

                // Log::info("Headers: " . json_encode($headers, JSON_PRETTY_PRINT));
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

                    // TODO Store Sent Payload

                    curl_close($ch);

                    // Log::info("###  response from the server ####");
                    // Log::info(json_encode(json_decode($resultCurlPost), JSON_PRETTY_PRINT));

                    return json_encode(json_decode($resultCurlPost), JSON_PRETTY_PRINT);
                } catch (Exception $e) {
                    // Log::error('Error during cURL request: ' . $e->getMessage());
                    curl_close($ch); // Close the cURL handle in case of an error
                    return 'Error during cURL request: ' . $e->getMessage();
                }
            } else {
                return "OPEN SSL Failed";
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $status = $response->getStatusCode(); // HTTP status code;

                // Log::error("Error Code: $status");
                // Log::error("Error Here: " . json_encode($response, JSON_PRETTY_PRINT));

                return (($status == 400)) ? "Remote server is not available" : $response->getReasonPhrase();
            }
        }
    }
}
