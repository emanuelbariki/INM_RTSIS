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
use App\Http\Controllers\viewdata\LiabilitiesDataController as viewLiabilitiesDataController;




// include('auth.php');
require __DIR__ . '/auth.php';

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('index');

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'send-data'], function () {

        // AssetsData
        Route::any('/balanceWithOtherBanks', [AssetsDataController::class, 'balanceOtherBanks'])->name('send-balanceOtherBanks');
        Route::any('/balanceBot', [AssetsDataController::class, 'balanceBot'])->name('send-balanceBot');
        Route::any('/assetOwned', [AssetsDataController::class, 'assetOwned'])->name('send-assetOwned');
        Route::any('/equityInvestment', [AssetsDataController::class, 'equityInvestment'])->name('send-equityInvestment');
        Route::any('/invDebtSecurities ', [AssetsDataController::class, 'invDebtSecurities '])->name('send-invDebtSecurities');
        Route::any('/otherAsset', [AssetsDataController::class, 'otherAsset'])->name('send-otherAsset');
        Route::any('/cheques', [AssetsDataController::class, 'cheques'])->name('send-cheques');
        Route::any('/cashInformation', [AssetsDataController::class, 'cashInformation'])->name('send-cashInformation');
        Route::any('/interbankLoansReceivable', [AssetsDataController::class, 'interbankLoansReceivable'])->name('send-interbankLoansReceivable');
        Route::any('/loan', [AssetsDataController::class, 'loan'])->name('send-loan');
        Route::any('/interBranchFloatItem', [AssetsDataController::class, 'interBranchFloatItem'])->name('send-interBranchFloatItem');
        Route::any('/overdraft', [AssetsDataController::class, 'overdraft'])->name('send-overdraft');
        Route::any('/claimTreasury', [AssetsDataController::class, 'claimTreasury'])->name('send-claimTreasury');
        Route::any('/institutionPremises', [AssetsDataController::class, 'institutionPremises'])->name('send-institutionPremises');
        Route::any('/customerLiabilities', [AssetsDataController::class, 'customerLiabilities'])->name('send-customerLiabilities');
        Route::any('/commercialOtherBillsPurchased', [AssetsDataController::class, 'commercialOtherBillsPurchased'])->name('send-commercialOtherBillsPurchased');
        Route::any('/underwritingAccounts', [AssetsDataController::class, 'underwritingAccounts'])->name('send-underwritingAccounts');
        Route::any('/digitalCredit', [AssetsDataController::class, 'digitalCredit'])->name('send-digitalCredit');
        Route::any('/microfinanceSegmentLoans', [AssetsDataController::class, 'microfinanceSegmentLoans'])->name('send-microfinanceSegmentLoans');
        Route::any('/premisesFurnitureEquipment', [AssetsDataController::class, 'premisesFurnitureEquipment'])->name('send-premisesFurnitureEquipment');


        //BankOthers
        Route::any('/accountCategory', [BankOthersController::class, 'accountCategory'])->name('send-accountCategory');
        Route::any('/atmInformation', [BankOthersController::class, 'atmInformation'])->name('send-atmInformation');
        Route::any('/atmTransaction', [BankOthersController::class, 'atmTransaction'])->name('send-atmTransaction');
        Route::any('/branchInformation', [BankOthersController::class, 'branchInformation'])->name('send-branchInformation');

        // Equity data
        Route::any('/coreCapitalDeductions', [EquityDataController::class, 'coreCapitalDeductions'])->name('send-coreCapitalDeductions');
        Route::any('/dividendsPayable', [EquityDataController::class, 'dividendsPayable'])->name('send-dividendsPayable');
        Route::any('/shareCapital', [EquityDataController::class, 'shareCapital'])->name('send-shareCapital');
        Route::any('/otherCapitalAccount', [EquityDataController::class, 'otherCapitalAccount'])->name('send-otherCapitalAccount');
        // Route::any('/coreCapitalDeductions', [EquityDataController::class, 'coreCapitalDeductions']);

        // liabilities data
        Route::any('/digitalSaving', [LiabilitiesDataController::class, 'digitalSaving'])->name('send-digitalSaving');
        Route::any('/interBranchFloatItem', [LiabilitiesDataController::class, 'LiabilitiesiInterBranchFloatItem'])->name('send-LiabilitiesiInterBranchFloatItem');
        Route::any('/bankersCheques', [LiabilitiesDataController::class, 'bankersCheques'])->name('send-bankersCheques');
        Route::any('/transfersPayable', [LiabilitiesDataController::class, 'transfersPayable'])->name('send-transfersPayable');
        Route::any('/accruedTaxes', [LiabilitiesDataController::class, 'accruedTaxes'])->name('send-accruedTaxes');
        Route::any('/subordinatedDebt', [LiabilitiesDataController::class, 'subordinatedDebt'])->name('send-subordinatedDebt');
        Route::any('/unearnedIncome', [LiabilitiesDataController::class, 'unearnedIncome'])->name('send-unearnedIncome');
        Route::any('/outstandingAcceptances', [LiabilitiesDataController::class, 'outstandingAcceptances'])->name('send-outstandingAcceptances');
        Route::any('/depositInformation', [LiabilitiesDataController::class, 'depositInformation'])->name('send-depositInformation');
        Route::any('/borrowingsInformation', [LiabilitiesDataController::class, 'borrowingsInformation'])->name('send-borrowingsInformation');
        Route::any('/interbankLoanPayable', [LiabilitiesDataController::class, 'interbankLoanPayable'])->name('send-interbankLoanPayable');
        Route::any('/otherLiabilities', [LiabilitiesDataController::class, 'otherLiabilities'])->name('send-otherLiabilities');
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

        Route::group(['prefix' => 'Liabilities'], function () {
            // liabilities data
            Route::get('/digitalSaving', [viewLiabilitiesDataController::class, 'digitalSaving'])->name('digitalSaving');
            Route::get('/interBranchFloatItem', [viewLiabilitiesDataController::class, 'LiabilitiesiInterBranchFloatItem'])->name('LiabilitiesiInterBranchFloatItem');
            Route::get('/bankersCheques', [viewLiabilitiesDataController::class, 'bankersCheques'])->name('bankersCheques');
            Route::get('/transfersPayable', [viewLiabilitiesDataController::class, 'transfersPayable'])->name('transfersPayable');
            Route::get('/accruedTaxes', [viewLiabilitiesDataController::class, 'accruedTaxes'])->name('accruedTaxes');
            Route::get('/subordinatedDebt', [viewLiabilitiesDataController::class, 'subordinatedDebt'])->name('subordinatedDebt');
            Route::get('/unearnedIncome', [viewLiabilitiesDataController::class, 'unearnedIncome'])->name('unearnedIncome');
            Route::get('/outstandingAcceptances', [viewLiabilitiesDataController::class, 'outstandingAcceptances'])->name('outstandingAcceptances');
            Route::get('/depositInformation', [viewLiabilitiesDataController::class, 'depositInformation'])->name('depositInformation');
            Route::get('/borrowingsInformation', [viewLiabilitiesDataController::class, 'borrowingsInformation'])->name('borrowingsInformation');
            Route::get('/interbankLoanPayable', [viewLiabilitiesDataController::class, 'interbankLoanPayable'])->name('interbankLoanPayable');
            Route::get('/otherLiabilities', [viewLiabilitiesDataController::class, 'otherLiabilities'])->name('otherLiabilities');
        });
    });





    Route::get('{first}/{second}/{third}', [DashboardController::class, 'dashboard'])->name('third');;
    Route::get('{first}/{second}', [DashboardController::class, 'dashboard'])->name('second');;
    Route::get('{any}', [DashboardController::class, 'dashboard'])->name('any');;
});
