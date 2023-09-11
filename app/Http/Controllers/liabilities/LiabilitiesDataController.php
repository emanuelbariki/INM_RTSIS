<?php

namespace App\Http\Controllers\liabilities;

use App\Http\Controllers\baseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\digitalSaving;
use App\Models\accruedTaxes;
use App\Models\bankersCheques;
use App\Models\depositInformation;
use App\Models\interbankLoanPayable;
use App\Models\interBranchFloatItem;
use App\Models\otherLiabilities;
use App\Models\outstandingAcceptances;
use App\Models\subordinatedDebt;
use App\Models\transfersPayable;
use App\Models\unearnedIncome;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LiabilitiesDataController extends Controller
{
    protected $endpoint = 'https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/liabilities/';
    protected $url;
    protected $bic;

    public function __construct()
    {
        $this->url = 'https://suptech-wso2-dev.bot.go.tz:8245/bank-liability/v1/liabilities/';
        $this->bic = '021';
    }


    /**
     * receives the endpoint and data and posts the information
     *
     * @param string $endpoint
     * @param array $data
     * @return object
     */
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

    public function digitalSaving(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "digitalSaving";
        $reportName = 'digitalSaving';
        return $base->sendDataToEndpoint(digitalSaving::class, $endpoint, $reportName);

    }




    public function LiabilitiesiInterBranchFloatItem(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "interBranchFloatItem";
        $reportName = 'interBranchFloatItem';
        return $base->sendDataToEndpoint(interBranchFloatItem::class, $endpoint, $reportName);
    }


    public function bankersCheques(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "bankersCheques";
        $reportName = 'bankersCheques';
        return $base->sendDataToEndpoint(bankersCheques::class, $endpoint, $reportName);

    }

    public function getBankersCheques(Request $request)
    {
        # code...
        return  getEndPointResponse('/bankersCheques', $request->informationId);
    }

    public function transfersPayable(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "transfersPayable";
        $reportName = 'transfersPayable';
        return $base->sendDataToEndpoint(transfersPayable::class, $endpoint, $reportName);

    }

    public function getTransfersPayable(Request $request)
    {
        # code...
        return  getEndPointResponse('/transfersPayable', $request->informationId);
    }


    public function accruedTaxes(Request $request)
    {
        // dd("Emanuel");
        $base = new baseController;
        $endpoint = $this->url . "accruedTax";
        $reportName = 'accruedTax';
        return $base->sendDataToEndpoint(accruedTaxes::class, $endpoint, $reportName);

    }


    public function getAccruedTaxes(Request $request)
    {
        # code...
        return  getEndPointResponse('/getAccruedTaxes', $request->informationId);
    }

    public function subordinatedDebt(Request $request)
    {
        $datas = subordinatedDebt::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "subordinatedDebt";
            $reportName = 'subordinatedDebt';
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

    
    public function getSubordinatedDebt(Request $request)
    {
        # code...
        return  getEndPointResponse('/subordinatedDebt', $request->informationId);
    }


    public function unearnedIncome(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "unearnedIncome";
        $reportName = 'unearnedIncome';
        return $base->sendDataToEndpoint(unearnedIncome::class, $endpoint, $reportName);
        
    }

    public function getUnearnedIncome(Request $request)
    {
        # code...
        return  getEndPointResponse('/unearnedIncome', $request->informationId);
    }

    public function outstandingAcceptances(Request $request)
    {
        $datas = outstandingAcceptances::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "outstandingAcceptances";
            $reportName = 'outstandingAcceptances';
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
      
    public function getOutstandingAcceptances(Request $request)
    {
        # code...
        return  getEndPointResponse('/outstandingAcceptances', $request->informationId);
    }

    public function depositInformation(Request $request)
    {
        $datas = depositInformation::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "depositInformation";
            $reportName = 'depositInformation';
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
         
    public function getDepositInformation(Request $request)
    {
        # code...
        return  getEndPointResponse('/depositInformation', $request->informationId);
    }

    public function borrowingsInformation(Request $request)
    {
        $datas = borrowingsInformation::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "borrowingsInformation";
            $reportName = 'borrowingsInformation';
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

    public function getBorrowingsInformation(Request $request)
    {
        # code...
        return  getEndPointResponse('/borrowingsInformation', $request->informationId);
    }

    public function interbankLoanPayable(Request $request)
    {
        $datas = interbankLoanPayable::where('sentStatus', 'no')->get();
        foreach ($datas as $key => $sdata) {
            
            $endpoint = $this->url . "interbankLoanPayable";
            $reportName = 'interbankLoanPayable';
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

                       
    public function getInterbankLoanPayable(Request $request)
    {
        # code...
        return  getEndPointResponse('/interbankLoanPayable', $request->informationId);
    }

    public function otherLiabilities(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "other";
        $reportName = 'otherLiabilities';
        return $base->sendDataToEndpoint(otherLiabilities::class, $endpoint, $reportName);
        
    }

    public function getOtherLiabilities(Request $request)
    {
        # code...
        return  getEndPointResponse('/otherLiabilities', $request->informationId);
    }
}
