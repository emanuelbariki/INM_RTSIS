<?php

use App\Http\Controllers\assets\AssetsDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\equityData\EquityDataController;
use App\Http\Controllers\liabilities\LiabilitiesDataController;
use App\Http\Controllers\baseController;
use App\Http\Controllers\Others\BankOthersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::any('/accountCategory', [BankOthersController::class, 'accountCategory']);
Route::any('/', [DashboardController::class, 'testFunction'])->name('testFunctions');
Route::any('/testFunction', [DashboardController::class, 'testFunction']);
Route::any('/getOracleData', [baseController::class, 'getOracleData']);



// Route::any('testingApi',function () {
//     return "Emanuel";
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Bank Others


// Equity data
Route::post('/dividendsPayable', [EquityDataController::class, 'dividendsPayable']);
Route::post('/shareCapital', [EquityDataController::class, 'shareCapital']);
Route::post('/otherCapitalAccount', [EquityDataController::class, 'otherCapitalAccount']);
Route::post('/coreCapitalDeductions', [EquityDataController::class, 'coreCapitalDeductions']);

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
