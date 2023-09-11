<?php

namespace App\Http\Controllers\viewdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class LiabilitiesDataController extends Controller
{
    //
    function digitalSaving()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('digital_saving')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('digital_saving')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Digital Savings';
        return view('reports.index', $tData);
    }

    function accruedTaxes()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('accrued_taxes')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('accrued_taxes')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Accrued Taxes';
        return view('reports.index', $tData);
    }

    function unearnedIncome()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('unearned_income')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('unearned_income')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Unearned Income';
        return view('reports.index', $tData);
    }

    function otherLiabilities()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('other_liabilities')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('other_liabilities')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Other Liabilities';
        return view('reports.index', $tData);
    }

    function LiabilitiesiInterBranchFloatItem ()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('inter_branch_float_item')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('inter_branch_float_item')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Inter Branch Float Item';
        return view('reports.index', $tData);
    }
    function bankersCheques()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('bankers_cheques')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('bankers_cheques')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Bankers Cheques';
        return view('reports.index', $tData);
    }
    
    function transfersPayable()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('transfers_payable')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('transfers_payable')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Transfers Payable';
        return view('reports.index', $tData);
    }

    function subordinatedDebt()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('subordinated_debt')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('subordinated_debt')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Transfers Payable';
        return view('reports.index', $tData);
    }

    function outstandingAcceptances()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('outstanding_acceptances')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('outstanding_acceptances')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Transfers Payable';
        return view('reports.index', $tData);
    }

    function depositInformation()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('deposit_information')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('deposit_information')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Transfers Payable';
        return view('reports.index', $tData);
    }

    function borrowingsInformation ()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('borrowings_information')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('borrowings_information')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Transfers Payable';
        return view('reports.index', $tData);
    }

    function interbankLoanPayable ()
    {
        if (isset($_GET['sent'])) {
            $tData['allData'] = DB::table('interbank_loan_payable')
                ->where('sentStatus', '=', 'yes')->get();
        } else {
            $tData['allData'] = DB::table('interbank_loan_payable')
                ->where('sentStatus', '!=', 'yes')->get();
        }

        $parts = explode("::", __METHOD__);
        $methodName = end($parts);

        $tData['link'] = "send-" . $methodName;
        $tData['currentUrl'] = URL::current();

        $tData['title'] = 'Transfers Payable';
        return view('reports.index', $tData);
    }
}
