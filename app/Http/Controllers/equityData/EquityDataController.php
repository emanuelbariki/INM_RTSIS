<?php

namespace App\Http\Controllers\equityData;

use App\Http\Controllers\baseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\coreCapitalDeductions;
use App\Models\dividendsPayable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EquityDataController extends Controller
{
    protected $endpoint = 'https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/equity/';

    protected $url;
    protected $bic;

    public function __construct()
    {
        $this->url = 'https://suptech-wso2-dev.bot.go.tz:8245/bank-assets/v1/equity/';
        $this->bic = '021';
    }

    public function dividendsPayable(Request $request)
    {
        Log::info("dividendsPayable");
        $datas = dividendsPayable::where('sentStatus', 'no')->get();
        $response = null;
        Log::info(json_encode($datas,JSON_PRETTY_PRINT));
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "dividendsPayable";
            $reportName = 'dividendsPayableData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info($sdata);
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');

    }

    public function getDividendsPayable(Request $request)
    {
        $datas = ShareCapital::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "ShareCapital";
            $reportName = 'ShareCapitalData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function shareCapital(Request $request)
    {
        $datas = ShareCapital::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "ShareCapital";
            $reportName = 'ShareCapitalData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function getShareCapital(Request $request)
    {
        $datas = ShareCapital::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "ShareCapital";
            $reportName = 'ShareCapitalData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function otherCapitalAccount(Request $request)
    {
        $datas = otherCapitalAccount::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "otherCapitalAccount";
            $reportName = 'otherCapitalAccountData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function getOtherCapitalAccount(Request $request)
    {
        $datas = otherCapitalAccount::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "otherCapitalAccount";
            $reportName = 'otherCapitalAccountData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function coreCapitalDeductions(Request $request)
    {
        $datas = coreCapitalDeductions::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "coreCapitalDeductions";
            $reportName = 'coreCapitalDeductionsData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function getCoreCapitalDeductions(Request $request)
    {
        $datas = coreCapitalDeductions::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "coreCapitalDeductions";
            $reportName = 'coreCapitalDeductionsData';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }
}
