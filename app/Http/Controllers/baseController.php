<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use stdClass;

class baseController extends Controller
{

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
        
        log::info("Token: ".$res);
        $token = new Token();
        $token->token = json_decode($res);
        $token->token = $token->token->access_token;
        $token->save();


        return $res;
    }

    public static function postEndPointResponse($endpoint, $data, $informationId, $reportName)
    {

        try {
            
            $base = new baseController();

            $currentTime = Carbon::now();
            $token = Token::latest()->first();

            if ($token != null) {
                # code...
                $createdAt = $token->created_at;
                if ($createdAt->diffInMinutes($currentTime) >= 1) {
                    $token = json_decode($base->getToken());
                    $token = $token->access_token;
                } else {
                    $token = $token->token;
                }
            }else{
                $token = json_decode($base->getToken());
                $token = $token->access_token;
            }
            
            Log::info("URL: " . $endpoint);

            $cert_store = Storage::disk('public')->get('IMBANKprivate.pfx');
            if (openssl_pkcs12_read($cert_store, $cert_info, "passphrase")) {
                openssl_sign(json_encode($data), $signature, $cert_info['pkey'], "sha256WithRSAEncryption");

                //output crypted data base64 encoded
                $signature = base64_encode($signature);
                $content = array(
                    '' . $reportName . '' => $data,
                    "signature" => $signature
                );

                $json_string = json_encode($content, JSON_PRETTY_PRINT);

                $currentDateTime = Carbon::now();
                $formattedDateTime = $currentDateTime->format('Y-m-d H:i'); 

                $headers = array(
                    'Content-Type:application/json',
                    'Sender: 021',
                    'fspInformationId:' . $informationId,
                    'Date:'.$formattedDateTime,
                    'informationId: ' . $informationId,
                    'Authorization: Bearer ' . $token,
                    'Content-Length:' . strlen($json_string),
                );

                // Log::info("Headers: " . json_encode($headers, JSON_PRETTY_PRINT));
                Log::info("Data: " . $json_string);

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

                    Log::info("###  response from the server ####");
                    Log::info(json_encode(json_decode($resultCurlPost), JSON_PRETTY_PRINT));
                    return json_encode(json_decode($resultCurlPost), JSON_PRETTY_PRINT);
                } catch (Exception $e) {
                    Log::error('Error during cURL request: ' . $e->getMessage());
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

                Log::error("Error Code: $status");
                Log::error("Error Here: " . json_encode($response, JSON_PRETTY_PRINT));

                return (($status == 400)) ? "Remote server is not available" : $response->getReasonPhrase();
            }
        }
    }

    /**
     * receives the endpoint gets the information
     *
     * @param string $endpoint
     * @return object
     */
    public function getEndPointResponse($endpoint, $informationId)
    {
        $response = Http::withHeaders([
            'Sender' => $this->bic,
            'informationId' => $informationId,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get($this->url . $endpoint);

        return $response;
    }

    public function creatSignature($payload)
    {

        // Path to the PFX file
        $pfxPath = storage_path('app/public/IMBANKprivate.pfx');
        $pfxPassword = 'pfx_password';
        $payload = 'This is the payload to be signed';

        // Read the PFX file contents
        $pfxContents = Storage::disk('public')->get('IMBANKprivate.pfx');

        // Load the PFX file
        $privateKey = openssl_pkcs12_read($pfxContents, $certs, $pfxPassword);

        // Extract the private key from the PFX file
        $key = $certs['pkey'];

        // Sign the payload
        $signature = '';
        openssl_sign($payload, $signature, $key, OPENSSL_ALGO_SHA256);

        // Free the private key resource from memory
        openssl_free_key($key);

        // Base64 encode the signature for transmission or storage
        $base64Signature = base64_encode($signature);

        // Use the $base64Signature as needed


        // Use the $base64Signature as needed

    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function convertKeysToCamelCase(array $data) {

        $result = [];
        foreach ($data as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            $result[$key] = $value;
        }
        return $result;
    }


    public function getOracleData(Request $request)
    {

        return "Bariki";

        // $currentTime =  mktime(date("H"),   date("i"),   date("s"));
        // $currentTime = date('H:i:s', $currentTime);
        // $tomorrow = date("Y-m-d", strtotime('tomorrow'));
        // $thisyear = date('Y');
        // define('NOW',$currentTime);
        // define('TODAY', date('Y-m-d'));
        // define('TOMORROW', $tomorrow);
        // define('THISYEAR', $thisyear);
        // define('CURRENTTIMESTAMP', TODAY." ".NOW);

        // define('ROOTDIR', $_SERVER['DOCUMENT_ROOT']);
        // define('LOGFILE', ROOTDIR.'/logs/');
        // // Check if the request method is POST
        // if ($request) {
        //     // Get the raw POST data
        //     // $postData = $request->all();//file_get_contents('php://input');
        //     $postData = $request->all();

        //     createLog("Recieved Data");
        //     createLog($postData);
        //     // Check if data was received
        //     if (!empty($postData)) {
        //         // Decode the JSON data into a PHP object
        //         $jsonData = json_decode($postData);

        //         // Check if JSON decoding was successful
        //         if ($jsonData !== null) {

        //             $return = getData($jsonData->sql);
        //             header('Content-Type: application/json');
        //             echo $return;
        //             die();
        //         } else {
        //             // JSON decoding failed
        //             http_response_code(400); // Bad Request
        //             echo "Invalid JSON data";
        //         }
        //     } else {
        //         // No data received
        //         http_response_code(400); // Bad Request
        //         echo "No data received";
        //     }
        // } else {
        //     // Invalid request method
        //     http_response_code(405); // Method Not Allowed
        //     echo "Invalid request method";
        // }


        // function getData($sql){
        //     $conn = oci_connect('system', 'manager', '192.168.214.10:1521/IMTZDEV');
        //     if (!$conn) {
        //         $e = oci_error();
        //         trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        //     }

        //     $stid = oci_parse($conn, $sql);

        //     oci_execute($stid);

        //     $columnNames = array(); // Array to store column names

        //     // Fetch column names
        //     for ($i = 1; $i <= oci_num_fields($stid); $i++) {
        //         $columnNames[] = oci_field_name($stid, $i);
        //     }

        //     while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        //         $data[]= $row;
        //     }
        //     //echo "<pre>";
        //     //print_r($data);
        //     //echo "</tr>\n";
        //     return json_encode($data,JSON_PRETTY_PRINT);
        // }

        // function createLog($logtext){
        //     $logtext = "[".TODAY."]"." [".NOW."] ".$logtext;

        //     $logtext = $logtext."\n";
        //     file_put_contents(LOGFILE.superClean(TODAY).".LOG", $logtext, FILE_APPEND | LOCK_EX);
        //     $logtext = $logtext."\n";
        // }
        // function superClean($str) {
        //     return preg_replace("#\n\n#","\n",preg_replace("#\r\r#","\r",trim(preg_replace("#[^A-Za-z0-9 ,\.'\"\(\)-_\+%!\*\$&=?;:\[\]{}\\/\n\r]#",'',$str))));
        // }

    }
}
