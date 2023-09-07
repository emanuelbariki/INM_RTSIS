<?php

namespace App\Http\Controllers\viewdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class BankOthersController extends Controller
{
    //
    function accountCategory()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('account_category')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('account_category')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Account Category';
        return view('reports.index', $tData);
    }


    function atmInformation()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('atm_information')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('atm_information')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'ATM Information';
        return view('reports.index', $tData);
    }


    function atmTransaction()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('atm_transactions')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('atm_transactions')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'ATM Transaction';
        return view('reports.index', $tData);
    }


    function branchInformation()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('branch_information')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('branch_information')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Branch Information';
        return view('reports.index', $tData);
    }
}
