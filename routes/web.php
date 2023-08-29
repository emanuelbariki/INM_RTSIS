<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\equityData\EquityDataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\liabilities\LiabilitiesDataController;
use App\Http\Controllers\Others\BankOthersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\baseController;
use App\Http\Controllers\assets\AssetsDataController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\viewdata\AssetsDataController as viewAssetsDataController;
use App\Http\Controllers\viewdata\BankOthersController as viewBankOthersController;
use App\Http\Controllers\viewdata\EquityDataController as viewEquityDataController;




// include('auth.php');
require __DIR__ . '/auth.php';

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('index');

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'send-data'], function () {
        
        // AssetsData
        Route::any('/balanceWithOtherBanks', [AssetsDataController::class, 'balanceOtherBanks']);
        Route::any('/balanceBot', [AssetsDataController::class, 'balanceBot']);

        Route::any('/assetOwned', [AssetsDataController::class, 'assetOwned']);
        Route::any('/equityInvestment', [AssetsDataController::class, 'equityInvestment']);
        Route::any('/invDebtSecurities ', [AssetsDataController::class, 'invDebtSecurities ']);
        Route::any('/otherAsset', [AssetsDataController::class, 'otherAsset']);
        Route::any('/cheques', [AssetsDataController::class, 'cheques']);
        Route::any('/cashInformation', [AssetsDataController::class, 'cashInformation']);
        Route::any('/interbankLoansReceivable', [AssetsDataController::class, 'interbankLoansReceivable']);
        Route::any('/loan', [AssetsDataController::class, 'loan']);
        Route::any('/interBranchFloatItem', [AssetsDataController::class, 'interBranchFloatItem']);
        Route::any('/overdraft', [AssetsDataController::class, 'overdraft']);
        Route::any('/claimTreasury', [AssetsDataController::class, 'claimTreasury']);
        Route::any('/institutionPremises', [AssetsDataController::class, 'institutionPremises']);
        Route::any('/customerLiabilities', [AssetsDataController::class, 'customerLiabilities']);
        Route::any('/commercialOtherBillsPurchased', [AssetsDataController::class, 'commercialOtherBillsPurchased']);
        Route::any('/underwritingAccounts', [AssetsDataController::class, 'underwritingAccounts']);
        Route::any('/digitalCredit', [AssetsDataController::class, 'digitalCredit']);
        Route::any('/microfinanceSegmentLoans', [AssetsDataController::class, 'microfinanceSegmentLoans']);
        Route::any('/premisesFurnitureEquipment', [AssetsDataController::class, 'premisesFurnitureEquipment']);

        
        //BankOthers
        Route::any('/accountCategory', [BankOthersController::class, 'accountCategory']);
        Route::any('/atmInformation', [BankOthersController::class, 'atmInformation']);
        Route::any('/atmTransaction', [BankOthersController::class, 'atmTransaction']);
        Route::any('/branchInformation', [BankOthersController::class, 'branchInformation']);

        // Equity data
        Route::any('/coreCapitalDeductions', [EquityDataController::class, 'coreCapitalDeductions']);
        Route::any('/dividendsPayable', [EquityDataController::class, 'dividendsPayable']);
        Route::any('/shareCapital', [EquityDataController::class, 'shareCapital']);
        Route::any('/otherCapitalAccount', [EquityDataController::class, 'otherCapitalAccount']);
        // Route::any('/coreCapitalDeductions', [EquityDataController::class, 'coreCapitalDeductions']);

        // liabilities data
        Route::post('/digitalSaving', [LiabilitiesDataController::class, 'digitalSaving']);
        Route::post('/interBranchFloatItem', [LiabilitiesDataController::class, 'interBranchFloatItem']);
        Route::post('/bankersCheques', [LiabilitiesDataController::class, 'bankersCheques']);
        Route::post('/transfersPayable', [LiabilitiesDataController::class, 'transfersPayable']);
        Route::post('/accruedTaxes', [LiabilitiesDataController::class, 'accruedTaxes']);
        Route::post('/subordinatedDebt', [LiabilitiesDataController::class, 'subordinatedDebt']);
        Route::post('/unearnedIncome', [LiabilitiesDataController::class, 'unearnedIncome']);
        Route::post('/outstandingAcceptances', [LiabilitiesDataController::class, 'outstandingAcceptances']);
        Route::post('/depositInformation', [LiabilitiesDataController::class, 'depositInformation']);
        Route::post('/borrowingsInformation', [LiabilitiesDataController::class, 'borrowingsInformation']);
        Route::post('/interbankLoanPayable', [LiabilitiesDataController::class, 'interbankLoanPayable']);
        Route::post('/otherLiabilities', [LiabilitiesDataController::class, 'otherLiabilities']);



    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::group(['prefix' => 'assetData'], function () {
            Route::get('/balanceWithOtherBanks', [viewAssetsDataController::class, 'balanceOtherBanks'])->name('balanceWithOtherBanks');
            Route::get('/balanceBot', [viewAssetsDataController::class, 'balanceBot'])->name('balanceBot');
            Route::get('/assetOwned', [viewAssetsDataController::class, 'assetOwned'])->name('assetOwned');
            Route::get('/equityInvestment', [viewAssetsDataController::class, 'equityInvestment'])->name('equityInvestment');
            Route::get('/invDebtSecurities', [viewAssetsDataController::class, 'invDebtSecurities'])->name('invDebtSecurities');
            Route::get('/otherAsset', [viewAssetsDataController::class, 'otherAsset'])->name('otherAsset');
            Route::get('/cashInformation', [viewAssetsDataController::class, 'cashInformation'])->name('cashInformation');
            Route::get('/interbankLoansReceivable', [viewAssetsDataController::class, 'interbankLoansReceivable'])->name('interbankLoansReceivable');
            Route::get('/loan', [viewAssetsDataController::class, 'loan'])->name('loan');
            Route::get('/interBranchFloatItem', [viewAssetsDataController::class, 'interBranchFloatItem'])->name('interBranchFloatItem');
            Route::get('/overdraft', [viewAssetsDataController::class, 'overdraft'])->name('overdraft');
            Route::get('/claimTreasury', [viewAssetsDataController::class, 'claimTreasury'])->name('claimTreasury');
            Route::get('/institutionPremises', [viewAssetsDataController::class, 'institutionPremises'])->name('institutionPremises');
            Route::get('/customerLiabilities', [viewAssetsDataController::class, 'customerLiabilities'])->name('customerLiabilities');
            Route::get('/cheques', [viewAssetsDataController::class, 'cheques'])->name('cheques');
            Route::get('/commercialOtherBillsPurchased', [viewAssetsDataController::class, 'commercialOtherBillsPurchased'])->name('commercialOtherBillsPurchased');
            Route::get('/underwritingAccounts', [viewAssetsDataController::class, 'underwritingAccounts'])->name('underwritingAccounts');
            Route::get('/digitalCredit', [viewAssetsDataController::class, 'digitalCredit'])->name('digitalCredit');
            Route::get('/microfinanceSegmentLoans', [viewAssetsDataController::class, 'microfinanceSegmentLoans'])->name('microfinanceSegmentLoans');
            Route::get('/premisesFurnitureEquipment', [viewAssetsDataController::class, 'premisesFurnitureEquipment'])->name('premisesFurnitureEquipment');
        });

        Route::group(['prefix' => 'bankOthers'], function () {
            Route::get('/accoun0tCategory', [viewBankOthersController::class, 'accountCategory'])->name('accountCategory');
            Route::get('/atmInformation', [viewBankOthersController::class, 'atmInformation'])->name('atmInformation');
            Route::get('/atmTransaction', [viewBankOthersController::class, 'atmTransaction'])->name('atmTransaction');
            Route::get('/branchInformation', [viewBankOthersController::class, 'branchInformation'])->name('branchInformation');
        });

        Route::group(['prefix' => 'EquityData'], function () {
            Route::get('/coreCapitalDeductions', [viewEquityDataController::class, 'coreCapitalDeductions'])->name('coreCapitalDeductions');
            Route::get('/dividendsPayable', [viewEquityDataController::class, 'dividendsPayable'])->name('dividendsPayable');
            Route::get('/shareCapital', [viewEquityDataController::class, 'shareCapital'])->name('shareCapital');
            Route::get('/otherCapitalAccount', [viewEquityDataController::class, 'otherCapitalAccount'])->name('otherCapitalAccount');
        });
    });





    Route::get('{first}/{second}/{third}', [DashboardController::class, 'dashboard'])->name('third');;
    Route::get('{first}/{second}', [DashboardController::class, 'dashboard'])->name('second');;
    Route::get('{any}', [DashboardController::class, 'dashboard'])->name('any');;
});
