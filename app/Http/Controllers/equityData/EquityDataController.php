<?php

namespace App\Http\Controllers\equityData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EquityDataController extends Controller
{
    protected $endpoint = 'https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/equity/';

    public function __construct() {
        $this->url = 'https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/equity/';
        $this->bic = 'IMBLTZTZ';
    }
   
    public function postEndPointResponse($endpoint, $data, $informationId){
        $headers = array(
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Sender' => $this->bic
        );

        

        if ($informationId) {
            $headers['informationId'] = $informationId;
        }

        Log::info("Headers: ". json_encode($headers, JSON_PRETTY_PRINT));
        Log::info("URL: ".$this->url.$endpoint);

        $response = Http::withHeaders($headers)->post($this->url.$endpoint, $data);
        Log::info("Response: ". json_encode($response, JSON_PRETTY_PRINT));
        if ($response->status() === 201) {
            return $data = $response->json();
        } else {
            $statusCode = $response->status();
            $errorMessage = null;
            if (isset($response['error'])) {
                # code...
                $errorMessage = $response['error']['message'];
            }

            return $error = [$statusCode, $errorMessage];
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
        ])->get($this->url.$endpoint);

        return $response;
    }

    public function dividendsPayable(Request $request)
    {
        $informationId = null; 
        $data = [
            'dividendsPayableData' => [
                [
                    'reportingDate' => 'string',
                    'dividendType' => 'string',
                    'currency' => 'string',
                    'orgAmount' => 0,
                    'tzsAmount' => 0,
                ]
            ]
        ];
        Log::info("Data: ".json_encode($data, JSON_PRETTY_PRINT));
        $response = $this->postEndPointResponse('dividendsPayable', $data, $informationId);
        return $response;
    }

    public function getDividendsPayable(Request $request)
    {
        # code...
        $response = getEndPointResponse("/dividendsPayable", $request->informationId);
        return $response;
    }

    public function shareCapital(Request $request)
    {
        $informationId = null;
        $data = [
            'shareCapitalData' => [
                [
                    'reportingDate'=> $request->reportingDate,
                    'capitalCategory'=> 'Authorized share capital',
                    'capitalSubCategory'=> 'string',
                    'transactionDate'=> 'string',
                    'shareholderNames'=> 'string',
                    'clientType'=> 'string',
                    'shareholderCountry'=> 'string',
                    'numberOfShares'=> 0,
                    'sharePriceBookValue'=> 'string',
                    'currency'=> 'string',
                    'orgAmount'=> 0,
                    'tzsAmount'=> 0,
                    'sectorSnaclassification'=> 'string'
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/shareCapital', $data, $informationId);
        return $data;
    }

    public function getShareCapital(Request $request)
    {
        # code...
        $response = getEndPointResponse("/otherCapitalAccount", $request->informationId);
        return $response;
    }

    public function otherCapitalAccount(Request $request)
    {
        $informationId = null;
        $data = [
            'otherCapitalData' => [
                [
                    'reportingDate'=> 'string',
                    'transactionDate'=> 'string',
                    'transactionType'=> 'string',
                    'reserveCategory'=> 'string',
                    'reserveSubCategory'=> 'string',
                    'currency'=> 'string',
                    'orgAmount'=> 0,
                    'tzsAmount'=> 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse("/otherCapitalAccount", $data, $informationId);
        return $data;
    }

    public function getOtherCapitalAccount(Request $request)
    {
        # code...
        $response = getEndPointResponse("/otherCapitalAccount", $request->informationId);
        return $response;
    }


    public function coreCapitalDeductions(Request $request)
    {
        $informationId = null;
        $data = [
            'coreCapitalDeductionsInformation' => [
                [
                    'reportingDate'=> 'string',
                    'transactionDate'=> 'string',
                    'deductionsType'=> 'string',
                    'currency'=> 'string',
                    'orgAmount'=> 0,
                    'tzsAmount'=> 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse("/coreCapitalDeductions", $data, $informationId);
        return $data;
    }

    public function getCoreCapitalDeductions(Request $request)
    {
        # code...
        $response = getEndPointResponse("/coreCapitalDeductions", $request->informationId);
        return $response;
    }
}
