<?php

namespace App\Http\Controllers\viewdata;

use App\Http\Controllers\baseController;
use App\Http\Controllers\Controller;
use App\Models\balanceOtherBanks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetsDataController extends Controller
{
    //
    protected $base;
    function __construct()
    {
        $base = new baseController();   
    }

    function balanceOtherBanks() {

        $tData['allData'] = DB::table('balance_other_banks')->get();
        $tData['title'] = 'Balance With Other Banks';
        return view('reports.index', $tData);

    }

    function balanceBot() {
        $tData['allData'] = DB::table('balance_bot')->get();
        $tData['title'] = 'Balance With BOT';
        return view('reports.index', $tData);
    }

    function assetOwned() {
        $tData['allData'] = DB::table('asset_owned')->get();
        $tData['title'] = 'Asset Owned';
        return view('reports.index', $tData);
    }

    function cheques() {
        $tData['allData'] = DB::table('cheques')->get();
        $tData['title'] = 'Cheques';
        return view('reports.index', $tData);
    }

    function otherAsset() {
        $tData['allData'] = DB::table('other_asset_data')->get();
        $tData['title'] = 'Other Asset';
        return view('reports.index', $tData);
    }

    function cashInformation() {
        $tData['allData'] = DB::table('cash')->get();
        $tData['title'] = 'Cash';
        return view('reports.index', $tData);
    }
}
