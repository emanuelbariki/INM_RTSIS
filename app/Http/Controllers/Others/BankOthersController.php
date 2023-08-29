<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\baseController;
use App\Http\Controllers\Controller;
use App\Models\accountCategory;
use App\Models\atmInformation;
use App\Models\atmTransaction;
use App\Models\BranchInformation;
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
        $accountCategory = accountCategory::where('sentStatus', 'no')->get();
        $response = null;
        if ($accountCategory->isNotEmpty()) {
            # code...
            $endpoint = $this->url . "accountCategory";
            $reportName = 'accountCategory';
            foreach ($accountCategory as $key => $sdata) {
                $informationId = baseController::quickRandom(10);
                $data = [
                    $sdata
                ];
                
                $response['response'][] = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
            }
            return response($response, 200)
                ->header('Content-Type', 'Application/json');
        } else {
            return response("No Data Found", 200)
                ->header('Content-Type', 'Application/json');
        }
    }

    public function atmInformation(Request $request)
    {
        Log::info("atmInformation");

        // Log::info("Request Data \n".json_encode($requestData, JSON_PRETTY_PRINT));
        $requestData = atmInformation::where('sentStatus', 'no')->get();
        $response = null;


        if ($requestData->isNotEmpty()) {
            # code...
            $baseController = new baseController();
            $endpoint = $this->url . "atmInformation";
            $reportName = 'atmDetails';
            foreach ($requestData as $key => $sdata) {
                $informationId = baseController::quickRandom(10);
                unset($sdata['relatedId']);
                foreach ($sdata as $key => $value) {
                    if (is_array($value)) {
                        $newData[$key] = $baseController->removeQuotedIntegers($value); // Recursive call
                    } elseif (is_numeric($value)) {
                        $newData[$key] = (int)$value;
                    } else {
                        $newData[$key] = $value;
                    }
                }
                $data = [
                    $sdata
                ];
                
                $response['response'][] = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
            }
            return response($response, 200)
                ->header('Content-Type', 'Application/json');
        } else {
            return response("No Data Found", 200)
                ->header('Content-Type', 'Application/json');
        }

        $response = null;
        return response($response, 200)
            ->header('Content-Type', 'Application/json');
    }

    public function atmTransaction(Request $request)
    {
        Log::info("atmTransaction");
        $baseController = new baseController();

        // Log::info("Request Data \n".json_encode($requestData, JSON_PRETTY_PRINT));
        $requestData = atmTransaction::where('sentStatus', 'no')->get();
        $response = null;


        if ($requestData->isNotEmpty()) {
            # code...
            $endpoint = $this->url . "atmTransaction";
            $reportName = 'atmTransaction';
            foreach ($requestData as $key => $sdata) {
                $informationId = baseController::quickRandom(10);
                unset($sdata['relatedId']);

                $sdata = $baseController->removeQuotedIntegers($sdata);
                $data = [
                    $sdata
                ];
                
                $response['response'][] = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
            }
            return response($response, 200)
                ->header('Content-Type', 'Application/json');
        } else {
            return response("No Data Found", 200)
                ->header('Content-Type', 'Application/json');
        }

        $response = null;
        return response($response, 200)
            ->header('Content-Type', 'Application/json');
        return null;
    }

    public function branchInformation(Request $request)
    {
        Log::info("branchInformation");
        $baseController = new baseController();

        // Log::info("Request Data \n".json_encode($requestData, JSON_PRETTY_PRINT));
        $requestData = BranchInformation::where('sentStatus', 'no')->get();
        $response = null;

        if ($requestData->isNotEmpty()) {
            # code...
            $endpoint = $this->url . "branchInformation";
            $reportName = 'branchDetails';
            foreach ($requestData as $key => $sdata) {
                $informationId = baseController::quickRandom(10);
                unset($sdata['relatedId']);

                // $sdata = $baseController->removeQuotedIntegers($sdata);
                $data = [
                    $sdata
                ];
                
                $response['response'][] = baseController::postEndPointResponse($endpoint, $data, $informationId, $reportName);
            }
            return response($response, 200)
                ->header('Content-Type', 'Application/json');
        } else {
            return response("No Data Found", 200)
                ->header('Content-Type', 'Application/json');
        }

        $response = null;
        return response($response, 200)
            ->header('Content-Type', 'Application/json');
        return null;

        // $endpoint = "https://suptech-wso2-dev.bot.go.tz:8245/bot-suptech-others/v1/bankOthers/branchInformation";//;$this->url . "branchInformation";
        // $informationId = baseController::quickRandom(10);

        // $reportName = 'branchDetails';
        

        return null;
    }
}
