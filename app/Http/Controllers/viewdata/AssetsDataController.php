<?php

namespace App\Http\Controllers\viewdata;

use App\Http\Controllers\baseController;
use App\Http\Controllers\Controller;
use App\Models\balanceOtherBanks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AssetsDataController extends Controller
{
    //
    protected $base;
    function __construct()
    {
        $base = new baseController();
    }

    function balanceOtherBanks()
    {

        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('balance_other_banks')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('balance_other_banks')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $currentMethodName = __METHOD__;
        $parts = explode("::",  __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();
        $tData['title'] = 'Balance With Other Banks';

        return view('reports.index', $tData);
    }

    function balanceBot()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('balance_bot')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('balance_bot')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::",  __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Balance With BOT';
        return view('reports.index', $tData);
    }

    function assetOwned()
    {
        $tData['allData'] = DB::table('asset_owned')->get();
        $tData['title'] = 'Asset Owned';
        return view('reports.index', $tData);
    }

    function cheques()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('cheques')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('cheques')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Cheques';
        return view('reports.index', $tData);
    }


    function otherAsset()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('other_asset_data')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('other_asset_data')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Other Asset';
        return view('reports.index', $tData);
    }

    function loan ()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('loan')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('loan')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Loans';
        return view('reports.index', $tData);
    }

    function cashInformation()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('cash')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('cash')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Cash';
        return view('reports.index', $tData);
    }

    function premisesFurnitureEquipment()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('premises_furniture_equipment')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('premises_furniture_equipment')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Premises Furniture Equipment';
        return view('reports.index', $tData);
    }

    function equityInvestment()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('equity_investment')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('equity_investment')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'equity Investment';
        return view('reports.index', $tData);
    }

    function invDebtSecurities()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('inv_debt_securities')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('inv_debt_securities')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'inv Debt Securities';
        return view('reports.index', $tData);
    }

    function interbankLoansReceivable ()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('interbank_loans_receivables')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('interbank_loans_receivables')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Inter Bank Loans Receivable';
        return view('reports.index', $tData);
    }

    function overdraft ()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('overdrafts')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('overdrafts')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Overdraft Details';
        return view('reports.index', $tData);
    }
}
