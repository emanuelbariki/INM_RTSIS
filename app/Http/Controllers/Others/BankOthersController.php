<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\baseController;
use App\Http\Controllers\Controller;
use App\Models\accountCategory;
use App\Models\atmInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankOthersController extends Controller
{
    protected $url;
    protected $bic;

    public function __construct()
    {
        // $this->url = 'https://196.46.101.104:8245/bot-suptech-others/v1/others/';
        $this->url = 'https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/others/';
        $this->bic = '021';
    }

    public function accountCategory(Request $request)
    {

        $requestData = $request->all();
        // Log::info("Request Data \n".json_encode($requestData, JSON_PRETTY_PRINT));

        $base = new baseController();
        foreach ($requestData as $key => $Rdata) {
            if ($key == 'accountCategory') {
                foreach ($requestData[$key]['oracelData'] as $index => $value) {
                    // Log::info(json_encode($value),JSON_PRETTY_PRINT);
                    $value = $base->convertKeysToCamelCase($value);
                    // if ($value['accountType'] > 7) {
                    //     $value['accountType'] = 1;
                    // }
                    $value['sentStatus'] = "no";
                    // unset($value['currency']);

                    // $accountCategoryData = new accountCategory($value);
                    // // Log::info("databaseData: ".json_encode($value, JSON_PRETTY_PRINT));
                    // $accountCategoryData->save();

                    accountCategory::create($value);

                    $datas[] = $value;
                }
            }
        }

        // foreach ($datas as $key => $sdata) {
        //     Log::info(json_encode($sdata,JSON_PRETTY_PRINT));

        //     $endpoint = $this->url . "accountCategory";
        //     $reportName = 'accountCategory';
        //     $informationId = baseController::quickRandom(10);
        //     $data = [
        //         $sdata
        //     ];
        //     $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        // }

        $response = null;
        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function atmInformation(Request $request)
    {
        Log::info("atmInformation");

        $requestData = $request->all();
        // Log::info("Request Data \n".json_encode($requestData, JSON_PRETTY_PRINT));

        $base = new baseController();
        foreach ($requestData as $key => $Rdata) {
            if ($key == 'atmInformation') {
                foreach ($requestData[$key]['oracelData'] as $index => $value) {
                    // Log::info(json_encode($value));
                    $value = $base->convertKeysToCamelCase($value);
                    $value['sentStatus'] = "no";

                    $atmInformationData = new atmInformation($value);
                    Log::info("databaseData: " . json_encode($value, JSON_PRETTY_PRINT));
                    $atmInformationData->save();

                    $datas[] = $value;
                }
            }
        }

        // dd($datas);

        // $endpoint = $this->url . "atmInformation";
        // $informationId = baseController::quickRandom(10);

        // $reportName = 'atmDetails';
        // $data =[
        //     [
        //         "reportingDate"=>"170720231007",
        //         "atmName"=>"NYERERE BRANCH",
        //         "branchCode"=>"005",
        //         "atmCode"=>"0DN02002",
        //         "qrFsrCode"=>"100206694",
        //         "postalCode"=>null,
        //         "region"=>"07",
        //         "district"=>"02",
        //         "ward"=>"182",
        //         "street"=>"magogoni",
        //         "houseNumber"=>null,
        //         "gpsCoordinates"=>"-3.3697854348950873, 36.68789863800102",
        //         "linkedAccount"=>"30050310040001",
        //         "openingDate"=>"041020181210",
        //         "atmStatus"=>"1",
        //         "closureDate"=>null,
        //         "atmCategory"=>"1",
        //         "atmChannel"=>"1"
        //     ]
        // ];

        // $response = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        // return $response;
        $response = null;
        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function atmTransaction(Request $request)
    {
        Log::info("atmTransaction");
        // $endpoint = $this->url . "atmTransaction";
        // $informationId = baseController::quickRandom(10);

        // $reportName = 'atmTransaction';
        // $data = [
        //             [
        //                 "reportingDate"=> "190720230107",
        //                 "atmCode"=> "string",
        //                 "tillNumber"=> "string",
        //                 "transactionDate"=> "190720230107",
        //                 "transactionId"=> "string",
        //                 "transactionType"=> "string",
        //                 "currency"=> "1",
        //                 "orgTransactionAmount"=> 0,
        //                 "tzsTransactionAmount"=> 0,
        //                 "atmChannel"=> "string",
        //                 "atmServices"=> "string",
        //                 "mobileMoneyServices"=> "string",
        //                 "valueAddedTaxAmount"=> 0,
        //                 "exciseDutyAmount"=> 0,
        //                 "electronicLevyAmount"=> 0
        //             ]
        //         ];

        // $response = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        // return response($response, 200)
        //           ->header('Content-Type', 'Application/json');

        return null;

    }

    public function branchInformation(Request $request)
    {
        Log::info("branchInformation");
        // $endpoint = "https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/bankOthers/branchInformation";//;$this->url . "branchInformation";
        // $informationId = baseController::quickRandom(10);

        // $reportName = 'branchDetails';
        // $data = [
        //     [
        //         "postalCode"=>"string",
        //         "region"=>"03",
        //         "district"=>"06",
        //         "ward"=>"032",
        //         "street"=>"string",
        //         "houseNumber"=>0,
        //         "reportingDate"=>"180720230307",
        //         "branchName"=>"string",
        //         "taxIdentificationNumber"=>"string",
        //         "businessLicense"=>"string",
        //         "branchCode"=>"string",
        //         "qrFsrCode"=>"string",
        //         "gpsCoordinates"=>"string",
        //         "bankingServices"=>"string",
        //         "mobileMoneyServices"=>"string",
        //         "registrationDate"=>"180720230307",
        //         "branchStatus"=>"1",
        //         "closureDate"=>"180720230307",
        //         "contactPerson"=>"string",
        //         "telephoneNumber"=>"string",
        //         "altTelephoneNumber"=>"string",
        //         "branchCategory"=>"1"
        //     ]
        // ];

        // $response = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        // return $response;

        return null;
    }
}
