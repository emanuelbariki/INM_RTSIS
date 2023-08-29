<?php

namespace App\Http\Controllers\viewdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankOthersController extends Controller
{
    //
    function accountCategory() {
        $tData['allData'] = DB::table('account_category')->get();
        $tData['title'] = 'Account Category';
        return view('reports.index', $tData);
    }

    function atmInformation() {
        $tData['allData'] = DB::table('atm_information')->get();
        $tData['title'] = 'ATM Information';
        return view('reports.index', $tData);
    }

    function atmTransaction() {
        $tData['allData'] = DB::table('atm_transactions')->get();
        $tData['title'] = 'ATM Transaction';
        return view('reports.index', $tData);
    }

    function branchInformation() {
        $tData['allData'] = DB::table('branch_information')->get();
        $tData['title'] = 'Branch Information';
        return view('reports.index', $tData);
    }
}
