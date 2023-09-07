<?php

namespace App\Http\Controllers\viewdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class EquityDataController extends Controller
{
    //

    function coreCapitalDeductions()
    {
        $parts = explode("::", __METHOD__);
        $methodName = end($parts);
        $tData = $this->getData('core_capital_deductions', 'Core Capital Deductions',$methodName);
        return view('reports.index', $tData);
    }

    function dividendsPayable()
    {
        $parts = explode("::", __METHOD__);
        $methodName = end($parts);
        $tData = $this->getData('dividends_payable', 'Dividends Payable',$methodName);
        return view('reports.index', $tData);
    }

    function shareCapital()
    {
        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData = $this->getData('share_capital', 'Share Capital',$methodName);
        return view('reports.index', $tData);
    }

    function otherCapitalAccount()
    {
        $parts = explode("::", __METHOD__);
        $methodName = end($parts);
        $tData = $this->getData('other_capital_account', 'Other Capital Account',$methodName);
        return view('reports.index', $tData);
    }

    private function getData($tableName, $title, $methodName)
    {
        $sentStatus = isset($_GET['sent']) ? 'yes' : 'no';

        $tData['allData'] = DB::table($tableName)
            ->where('sentStatus', $sentStatus)
            ->get();
            
        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = $title;
        return $tData;
    }
}
