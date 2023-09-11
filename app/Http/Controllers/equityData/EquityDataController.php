<?php

namespace App\Http\Controllers\equityData;

use App\Http\Controllers\baseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\coreCapitalDeductions;
use App\Models\dividendsPayable;
use App\Models\shareCapital;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EquityDataController extends Controller
{
    protected $endpoint = 'https://suptech-wso2-dev.bot.go.tz:8245/bank-equity/v1/equity/';

    protected $url;
    protected $bic;

    public function __construct()
    {
        $this->url = 'https://suptech-wso2-dev.bot.go.tz:8245/bank-equity/v1/equity/';
        $this->bic = '021';
    }

    public function dividendsPayable(Request $request)
    {   
        
        $base = new baseController;
        $endpoint = $this->url . "dividendsPayable";
        $reportName = 'dividendsPayableData';
        return $base->sendDataToEndpoint(dividendsPayable::class, $endpoint, $reportName);


    }

    public function getDividendsPayable(Request $request)
    {   
        
        $base = new baseController;
        $endpoint = $this->url . "shareCapital";
        $reportName = 'shareCapitalData';
        return $base->sendDataToEndpoint(ShareCapital::class, $endpoint, $reportName);

    }

    public function shareCapital(Request $request)
    {   
    
        $base = new baseController;
        $endpoint = $this->url . "shareCapital";
        $reportName = 'shareCapitalData';
        return $base->sendDataToEndpoint(shareCapital::class, $endpoint, $reportName);

    }

    public function otherCapitalAccount(Request $request)
    {
        
        $base = new baseController;
        $endpoint = $this->url . "otherCapitalAccount";
        $reportName = 'otherCapitalAccountData';
        return $base->sendDataToEndpoint(otherCapitalAccount::class, $endpoint, $reportName);

    }

    public function coreCapitalDeductions(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "coreCapitalDeductions";
        $reportName = 'coreCapitalDeductionsData';
        return $base->sendDataToEndpoint(coreCapitalDeductions::class, $endpoint, $reportName);

    }


}
