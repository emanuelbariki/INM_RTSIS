<?php

namespace App\Http\Controllers\assets;

use App\Http\Controllers\baseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\balanceOtherBanks;
use App\Models\otherAssetData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use stdClass;
use App\Jobs\postDataJob;
use App\Models\balanceBot;
use App\Models\cheques;
use App\Models\premisesFurnitureEquipment;
use assetOwned;

class AssetsDataController extends Controller
{
    protected $url;
    protected $bic;

    public function __construct()
    {
        $this->url = 'https://suptech-wso2-dev.bot.go.tz:8245/bank-assets/v1/asset/';
        $this->bic = '021';
    }

    public function postEndPointResponse($endpoint, $data, $informationId)
    {
        $headers = array(
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Sender' => $this->bic
        );

        if ($informationId) {
            $headers['informationId'] = $informationId;
        }

        $response = Http::withHeaders($headers)->post($this->url.$endpoint, $data);

        if ($response->status() === 201) {
            return $data = $response->json();
        } else {
            $statusCode = $response->status();
            $errorMessage = $response['error']['message'];

            return $error = [$statusCode, $errorMessage];
        }
    }


    public function assetOwned (Request $request)
    {
        $datas = assetOwned::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "assetOwned";
            $reportName = 'assetOwned';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function equityInvestment(Request $request)
    {
        $datas = equityInvestment::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "equityInvestment";
            $reportName = 'equityInvestment';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function invDebtSecurities (Request $request)
    {
        $datas = invDebtSecurities::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "invDebtSecurities";
            $reportName = 'invDebtSecurities';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function otherAsset(Request $request)
    {

        $otherAsset = otherAssetData::where('sentStatus', 'no')->get();

        $endpoint = $this->url . "otherAsset";
        $reportName = 'otherAssetData';
        foreach ($otherAsset as $key => $sdata) {
            // echo "<pre>";
            print_r(json_encode($sdata, JSON_PRETTY_PRINT));
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            // postDataJob::dispatch($data, $informationId, $reportName);
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response(['message' => 'Job dispatched to the background'], 200)
        ->header('Content-Type', 'application/json');
    }


    public function cashInformation(Request $request)
    {
        $datas = cashInformation::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "cashInformation";
            $reportName = 'cashInformation';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function balanceBot(Request $request)
    {
        $datas = balanceBot::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "balanceBot";
            $reportName = 'balanceBOT';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function balanceOtherBanks(Request $request)
    {
        $datas = balanceOtherBanks::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "balanceOtherBanks";
            $reportName = 'balanceOtherBank';
            $sdata['bankCode'] = $sdata['bankName'];
            unset($sdata['bankName']);
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
        // return $response;
    }


    public function balanceMno(Request $request)
    {
        $datas = balanceMno::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "balanceMno";
            $reportName = 'balanceMno';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function interbankLoansReceivable(Request $request)
    {
        $datas = interbankLoansReceivable::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "interbankLoansReceivable";
            $reportName = 'interbankLoansReceivable';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function loan(Request $request)
    {
        $datas = loan::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "loan";
            $reportName = 'loan';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function interBranchFloatItem(Request $request)
    {
        $datas = interBranchFloatItem::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "interBranchFloatItem";
            $reportName = 'interBranchFloatItem';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function overdraft(Request $request)
    {
        $datas = overdraft::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "overdraft";
            $reportName = 'overdraft';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function claimTreasury(Request $request)
    {
        $datas = claimTreasury::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "claimTreasury";
            $reportName = 'claimTreasury';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function institutionPremises(Request $request)
    {
        $datas = institutionPremises::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "institutionPremises";
            $reportName = 'institutionPremises';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function customerLiabilities(Request $request)
    {
        $datas = customerLiabilities::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "customerLiabilities";
            $reportName = 'customerLiabilities';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function cheques(Request $request)
    {
        $datas = cheques::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "cheques";
            $reportName = 'cheques';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function commercialOtherBillsPurchased(Request $request)
    {
        $datas = commercialOtherBillsPurchased::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "commercialOtherBillsPurchased";
            $reportName = 'commercialOtherBillsPurchased';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function underwritingAccounts(Request $request)
    {
        $datas = underwritingAccounts::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "underwritingAccounts";
            $reportName = 'underwritingAccounts';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function digitalCredit(Request $request)
    {
        $datas = digitalCredit::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "digitalCredit";
            $reportName = 'digitalCredit';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function microfinanceSegmentLoans(Request $request)
    {
        $datas = microfinanceSegmentLoans::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "microfinanceSegmentLoans";
            $reportName = 'microfinanceSegmentLoans';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }


    public function premisesFurnitureEquipment(Request $request)
    {
        $datas = premisesFurnitureEquipment::where('sentStatus', 'no')->get();

        $response = null;
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "premisesFurnitureEquipment";
            $reportName = 'premisesFurnitureEquipment';
            $informationId = baseController::quickRandom(10);
            $data = [
                $sdata
            ];
            Log::info(json_encode($data,JSON_PRETTY_PRINT));
            $response[] = baseController::postEndPointResponse($endpoint, $data, $informationId,$reportName);
        }

        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

}
