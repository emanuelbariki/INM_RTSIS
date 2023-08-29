<?php

namespace App\Http\Controllers\viewdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquityDataController extends Controller
{
    //

    function coreCapitalDeductions()
    {
        $tData['allData'] = DB::table('core_capital_deductions')->get();
        $tData['title'] = 'Core Capital Deductions';
        return view('reports.index', $tData);
    }

    function dividendsPayable()
    {
        $tData['allData'] = DB::table('dividends_payable')->get();
        $tData['title'] = 'Dividends Payable';
        return view('reports.index', $tData);
    }

    function shareCapital()
    {
        $tData['allData'] = DB::table('share_capital')->get();
        $tData['title'] = 'Share Capital';
        return view('reports.index', $tData);
    }

    function otherCapitalAccount()
    {
        $tData['allData'] = DB::table('other_capital_account')->get();
        $tData['title'] = 'Other Capital Account';
        return view('reports.index', $tData);
    }
}
