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
use App\Jobs\sendDataToEndpointJob;
use App\Models\balanceBot;
use App\Models\cash;
use App\Models\cheques;
use App\Models\loan;
use App\Models\overdraft;
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

    public function assetOwned(Request $request)
    {   
        
        $base = new baseController;
        $endpoint = $this->url . "assetOwned";
        $reportName = 'assetOwned';
        return $base->sendDataToEndpoint(assetOwned::class, $endpoint, $reportName);

    }


    public function equityInvestment(Request $request)
    {  
        
        $base = new baseController;
        $endpoint = $this->url . "equityInvestment";
        $reportName = 'equityInvestmentData';
        return $base->sendDataToEndpoint(equityInvestment::class, $endpoint, $reportName);

    }


    public function invDebtSecurities(Request $request)
    {  
        
        $base = new baseController;
        $endpoint = $this->url . "invDebtSecurities";
        $reportName = 'invDebtSecuritiesData';
        return $base->sendDataToEndpoint(invDebtSecurities::class, $endpoint, $reportName);
        
    }


    public function otherAsset(Request $request)
    {  
        $base = new baseController;
        $endpoint = $this->url . "otherAsset";
        $reportName = 'otherAssetData';
        return $base->sendDataToEndpoint(otherAssetData::class, $endpoint, $reportName);
    }


    public function cashInformation(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "cashInformation";
        $reportName = 'cashData';
        return $base->sendDataToEndpoint(cash::class, $endpoint, $reportName);
    }


    public function balanceBot(Request $request)
    {

        $endpoint = $this->url . "balanceBot";
        $reportName = 'balanceBOT';

        dispatch(new sendDataToEndpointJob(balanceBot::class, $endpoint, $reportName));

        return "<script>
                    window.close();
                </script>";
        
    }


    public function balanceOtherBanks(Request $request)
    {   
        
        $base = new baseController;
        $endpoint = $this->url . "balanceOtherBanks";
        $reportName = 'balanceOtherBank';
        return $base->sendDataToEndpoint(balanceOtherBanks::class, $endpoint, $reportName);

    }


    public function balanceMno(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "balanceMno";
        $reportName = 'balanceMno';
        return $base->sendDataToEndpoint(balanceMno::class, $endpoint, $reportName);
    }


    public function interbankLoansReceivable(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "interbankLoansReceivable";
        $reportName = 'interbankLoansReceivable';
        return $base->sendDataToEndpoint(interbankLoansReceivable::class, $endpoint, $reportName);   
    }


    public function loan(Request $request)
    {
        
        $base = new baseController;
        $endpoint = $this->url . "loan";
        $reportName = 'loanInformation';
        return $base->sendDataToEndpoint(loan::class, $endpoint, $reportName);
        
    }


    public function interBranchFloatItem(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "interBranchFloatItem";
        $reportName = 'interBranchFloatItem';
        return $base->sendDataToEndpoint(interBranchFloatItem::class, $endpoint, $reportName);

    }


    public function overdraft(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "overdraft";
        $reportName = 'overdraftDetails';
        // dd("e");
        return $base->sendDataToEndpoint(overdraft::class, $endpoint, $reportName);
        
    }


    public function claimTreasury(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "claimTreasury";
        $reportName = 'claimTreasury';
        return $base->sendDataToEndpoint(claimTreasury::class, $endpoint, $reportName);
        
    }


    public function institutionPremises(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "institutionPremises";
        $reportName = 'institutionPremises';
        return $base->sendDataToEndpoint(institutionPremises::class, $endpoint, $reportName);
    }


    public function customerLiabilities(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "institutionPremises";
        $reportName = 'institutionPremises';
        return $base->sendDataToEndpoint(institutionPremises::class, $endpoint, $reportName);
        
    }


    public function cheques(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "cheques";
        $reportName = 'chequesClearing';
        return $base->sendDataToEndpoint(cheques::class, $endpoint, $reportName);
        
    }


    public function commercialOtherBillsPurchased(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "commercialOtherBillsPurchased";
        $reportName = 'commercialOtherBillsPurchased';
        return $base->sendDataToEndpoint(commercialOtherBillsPurchased::class, $endpoint, $reportName);
        
    }


    public function underwritingAccounts(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "underwritingAccounts";
        $reportName = 'underwritingAccounts';
        return $base->sendDataToEndpoint(underwritingAccounts::class, $endpoint, $reportName);
        
    }


    public function digitalCredit(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "digitalCredit";
        $reportName = 'digitalCredit';
        return $base->sendDataToEndpoint(digitalCredit::class, $endpoint, $reportName);
        
    }


    public function microfinanceSegmentLoans(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "microfinanceSegmentLoans";
        $reportName = 'microfinanceSegmentLoans';
        return $base->sendDataToEndpoint(microfinanceSegmentLoans::class, $endpoint, $reportName);
    }


    public function premisesFurnitureEquipment(Request $request)
    {
        $base = new baseController;
        $endpoint = $this->url . "premisesFurnitureEquipment";
        $reportName = 'premisesFurnitureEquipment';
        return $base->sendDataToEndpoint(premisesFurnitureEquipment::class, $endpoint, $reportName);
        
    }



}
