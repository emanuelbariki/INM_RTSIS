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
        $base = new baseController;
        $endpoint = $this->url . "accountCategory";
        $reportName = 'accountCategory';
        return $base->sendDataToEndpoint(accountCategory::class, $endpoint, $reportName);
    }

    public function atmInformation(Request $request)
    {
        Log::info("atmInformation");

        $base = new baseController;
        $endpoint = $this->url . "atmInformation";
        $reportName = 'atmDetails';
        return $base->sendDataToEndpoint(atmInformation::class, $endpoint, $reportName);

    }

    public function atmTransaction(Request $request)
    {
        Log::info("atmTransaction");
        $base = new baseController;
        $endpoint = $this->url . "atmTransaction";
        $reportName = 'atmTransaction';
        return $base->sendDataToEndpoint(atmTransaction::class, $endpoint, $reportName);

    }

    public function branchInformation(Request $request)
    {
        Log::info("branchInformation");
        $base = new baseController;
        $endpoint = $this->url . "branchInformation";
        $reportName = 'branchDetails';
        return $base->sendDataToEndpoint(BranchInformation::class, $endpoint, $reportName);
    }
    
}
