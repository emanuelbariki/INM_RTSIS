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



// Auth::routes();

// Route::get('/', [HomeController::class, 'authLogin']);

// Route::any('/testFunction', [DashboardController::class, 'testFunction']);
Route::any('/hi', [DashboardController::class, 'testFunction'])->name('hi');
Route::post('testFunction', [DashboardController::class, 'testFunction'])->name('WebTestFunction');

Route::any('/getOracleData', [baseController::class, 'getOracleData']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/test', [EquityDataController::class, 'test'])->name('postEndPointResponse');

});

//BankOthers
Route::any('/accountCategory', [BankOthersController::class, 'accountCategory']);
Route::any('/atmInformation', [BankOthersController::class, 'atmInformation']);
Route::any('/atmTransaction', [BankOthersController::class, 'atmTransaction']);
Route::any('/branchInformation', [BankOthersController::class, 'branchInformation']);

// Equity data
Route::any('/dividendsPayable', [EquityDataController::class, 'dividendsPayable']);
Route::any('/shareCapital', [EquityDataController::class, 'shareCapital']);
Route::any('/otherCapitalAccount', [EquityDataController::class, 'otherCapitalAccount']);
Route::any('/coreCapitalDeductions', [EquityDataController::class, 'coreCapitalDeductions']);

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

//assets
Route::post('/assetOwned', [AssetsDataController::class, 'assetOwned']);
Route::post('/equityInvestment', [AssetsDataController::class, 'equityInvestment']);
Route::post('/invDebtSecurities ', [AssetsDataController::class, 'invDebtSecurities ']);
Route::post('/otherAsset', [AssetsDataController::class, 'otherAsset']);
Route::post('/cashInformation', [AssetsDataController::class, 'cashInformation']);
Route::post('/balanceBot', [AssetsDataController::class, 'balanceBot']);
Route::post('/balanceOtherBanks', [AssetsDataController::class, 'balanceOtherBanks']);
Route::post('/interbankLoansReceivable', [AssetsDataController::class, 'interbankLoansReceivable']);
Route::post('/loan', [AssetsDataController::class, 'loan']);
Route::post('/interBranchFloatItem', [AssetsDataController::class, 'interBranchFloatItem']);
Route::post('/overdraft', [AssetsDataController::class, 'overdraft']);
Route::post('/claimTreasury', [AssetsDataController::class, 'claimTreasury']);
Route::post('/institutionPremises', [AssetsDataController::class, 'institutionPremises']);
Route::post('/customerLiabilities', [AssetsDataController::class, 'customerLiabilities']);
Route::post('/cheques', [AssetsDataController::class, 'cheques']);
Route::post('/commercialOtherBillsPurchased', [AssetsDataController::class, 'commercialOtherBillsPurchased']);
Route::post('/underwritingAccounts', [AssetsDataController::class, 'underwritingAccounts']);
Route::post('/digitalCredit', [AssetsDataController::class, 'digitalCredit']);
Route::post('/microfinanceSegmentLoans', [AssetsDataController::class, 'microfinanceSegmentLoans']);
Route::post('/premisesFurnitureEquipment', [AssetsDataController::class, 'premisesFurnitureEquipment']);


// require __DIR__.'/auth.php';
