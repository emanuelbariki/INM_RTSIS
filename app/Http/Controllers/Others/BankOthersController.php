<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\baseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankOthersController extends Controller
{
    //
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
                    // Log::info(json_encode($value));
                    $value = $base->convertKeysToCamelCase($value);
                    if ($value['accountType'] > 7) {
                        $value['accountType'] = 1;
                    }
                    $value['accountType'] = $value['accountType']; //str_pad($value['accountType'],2,"0",STR_PAD_LEFT);
                    unset($value['currency']);
                    $datas[] = $value;
                }
            }
        }

        foreach ($datas as $key => $sdata) {
            Log::info(json_encode($sdata, JSON_PRETTY_PRINT));

            $endpoint = $this->url . "accountCategory";
            $reportName = 'accountCategory';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata,
            ];
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
        }
        // echo "<pre>";
        // print_r($response);
        // die();

        // $data = [
        //     [
        //         "reportingDate"=> "180720230107",
        //         "accountCode"=> "ODF01",
        //         "accountDescription"=> "OVERDRAFT GENERAL LCY",
        //         "accountType"=> "5",
        //         "accountCreationDate"=> "180720230107",
        //         "accountClosureDate"=> null,
        //         "accountStatus"=> "active"
        //     ]
        // ];

        return response($response, 200)->header('Content-Type', 'Application/json');
        // return $response;
    }

    public function atmInformation(Request $request)
    {
        $endpoint = $this->url . "atmInformation";
        $informationId = baseController::quickRandom(10);

        $reportName = 'atmDetails';
        $data = [
            [
                "reportingDate" => "170720231007",
                "atmName" => "NYERERE BRANCH",
                "branchCode" => "005",
                "atmCode" => "0DN02002",
                "qrFsrCode" => "100206694",
                "postalCode" => null,
                "region" => "07",
                "district" => "02",
                "ward" => "182",
                "street" => "magogoni",
                "houseNumber" => null,
                "gpsCoordinates" => "-3.3697854348950873, 36.68789863800102",
                "linkedAccount" => "30050310040001",
                "openingDate" => "041020181210",
                "atmStatus" => "1",
                "closureDate" => null,
                "atmCategory" => "1",
                "atmChannel" => "1",
            ],
        ];

        $response = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
        return $response;
    }

    public function atmTransaction(Request $request)
    {
        // https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/others/atmTransaction

        $endpoint = $this->url . "atmTransaction";
        $informationId = baseController::quickRandom(10);

        $reportName = 'atmTransaction';
        $data = [
            [
                "reportingDate" => "190720230107",
                "atmCode" => "string",
                "tillNumber" => "string",
                "transactionDate" => "190720230107",
                "transactionId" => "string",
                "transactionType" => "string",
                "currency" => "1",
                "orgTransactionAmount" => 0,
                "tzsTransactionAmount" => 0,
                "atmChannel" => "string",
                "atmServices" => "string",
                "mobileMoneyServices" => "string",
                "valueAddedTaxAmount" => 0,
                "exciseDutyAmount" => 0,
                "electronicLevyAmount" => 0,
            ],
        ];
        // $base = new baseController();
        // $data = $base->convertKeysToCamelCase($data[0]);

        // dd($data);
        $response = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
        return response($response, 200)
            ->header('Content-Type', 'Application/json');
        // return $response;

    }

    public function branchInformation(Request $request)
    {
        $endpoint = "https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/bankOthers/branchInformation"; //;$this->url . "branchInformation";
        $informationId = baseController::quickRandom(10);

        $reportName = 'branchDetails';
        $data = [
            [
                "postalCode" => "string",
                "region" => "03",
                "district" => "06",
                "ward" => "032",
                "street" => "string",
                "houseNumber" => 0,
                "reportingDate" => "180720230307",
                "branchName" => "string",
                "taxIdentificationNumber" => "string",
                "businessLicense" => "string",
                "branchCode" => "string",
                "qrFsrCode" => "string",
                "gpsCoordinates" => "string",
                "bankingServices" => "string",
                "mobileMoneyServices" => "string",
                "registrationDate" => "180720230307",
                "branchStatus" => "1",
                "closureDate" => "180720230307",
                "contactPerson" => "string",
                "telephoneNumber" => "string",
                "altTelephoneNumber" => "string",
                "branchCategory" => "1",
            ],
        ];

        $response = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
        return $response;
    }
}
