<?php

namespace App\Http\Controllers\obs;

use App\Models\Ward;
use App\Models\Branch;
use App\Models\Region;

use App\Models\District;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Imports\InwardBillImport;
use Illuminate\Http\JsonResponse;
use App\Imports\OutwardBillImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExportLetterCreditImport;
use App\Imports\OutstandingGuaranteesImport;
use App\Imports\outstandingLettersCreditImport;

class OBSController extends Controller
{

    // TODO creating form for saving manually this data
    
    public function outstandingLettersCreditIndex()
    {
        $data['title'] = 'Off Balance Sheet';
        $data['subTitle'] = 'Outstanding Letters Credit';

        return view('obs.outstandingletterscredit', $data);
    }

    public function outstandingLettersCreditImport(Request $request)
    {
        Excel::import(new outstandingLettersCreditImport, $request->file('file'), 'xlsx');

        return redirect()->back()->with('success', 'data imported successfully.');
    }

    public function outwardsBillIndex()
    {
        $data['title'] = 'Off Balance Sheet';
        $data['subTitle'] = 'Outward Bills for collection';

        return view('obs.outwardbill', $data);
    }

    public function outwardsBillImport(Request $request)
    {
        Excel::import(new OutwardBillImport, $request->file('file'), 'xlsx');

        return redirect()->back()->with('success', 'data imported successfully.');
    }

    public function exportLetterOfCreditIndex()
    {
        $data['title'] = 'Off Balance Sheet';
        $data['subTitle'] = 'Export Letters of Credit';

        return view('obs.export-letter-credit', $data);
    }

    public function exportLettersCreditImport(Request $request)
    {
        Excel::import(new ExportLetterCreditImport, $request->file('file'), 'xlsx');

        return redirect()->back()->with('success', 'data imported successfully.');
    }

    public function outstandingGuaranteesIndex()
    {
        $data['title'] = 'Off Balance Sheet';
        $data['subTitle'] = 'Outstanding Guarantees and Indemnities';

        return view('obs.outstanding-guarantees', $data);
    }

    public function outstandingGuaranteesImport(Request $request)
    {
        Excel::import(new OutstandingGuaranteesImport, $request->file('file'), 'xlsx');

        return redirect()->back()->with('success', 'Data imported successfully.');
    }

    public function inwardBillIndex()
    {
        $data['title'] = 'Off Balance Sheet';
        $data['subTitle'] = 'Inward Bills for Collection';

        return view('obs.inward-bills', $data);
    }

    public function inwardBillImport(Request $request)
    {
        Excel::import(new InwardBillImport, $request->file('file'), 'xlsx');

        return redirect()->back()->with('success', 'data imported successfully.');
    }

    // other bank details
    public function branchInformationIndex(): View
    {
        $data['title'] = 'Branch Information';
        $data['subTitle'] = 'Branch Information';
        $data['branches'] = Branch::all();

        return view('obs.branch-information.index', $data);
    }

    public function branchInformationCreate(): view
    {
        $data['title'] = 'Branch';
        $data['subTitle'] = 'Branch Create';
        $data['regions'] = Region::select('reg_code as code', 'reg_name as name')->get();
        return view('obs.branch-information.add', $data);
    }

    public function getDistricts(Request $request): JsonResponse
    {
        $districts = District::where('reg_code', $request->region)->get();
        return response()->json($districts);
    }

    public function getWard(Request $request): JsonResponse
    {
        $ward = Ward::where('dis_code', $request->district)->get();
        return response()->json($ward);
    }

    // TODO exporting inside the database
    // TODO editing branch information
    // TODO creating schedular for sending them
    public function storeBranch(Request $request)
    {
        Branch::create([
            'postal_code' => $request->postal_code,
            'region' => $request->region,
            'district' => $request->district,
            'ward' => $request->ward,
            'street' => $request->street,
            'house_number' => $request->house_number,
            'reporting_date' => Date::now()->toDateString(),
            'branch_name' => $request->branch_name,
            'tax_identification_number' => $request->tax_identification_number,
            'business_license' => $request->business_license,
            'branch_code' => $request->branch_code,
            'qefsr_code' => $request->qrfsr_code,
            'gps_coordinates' => $request->gps_coordinates,
            'banking_services' => $request->bank_services,
            'mobile_money_services' => $request->mobile_money_services,
            'registration_date' => $request->registration_date,
            'branch_status' => $request->branch_status,
            'closure_date' => $request->closure_date,
            'contact_person' => $request->contact_person,
            'telephone_number' => $request->telephone_number,
            'alt_telephone_number' => $request->alt_telephone,
            'branch_category' => $request->branch_category,
            'status' => 1,
        ]);

        return redirect(route('branch.index'));
    }



    /**
     * Complaint fraud statistics
     */

    // TODO Adding fraud manually
    // TODO exporting inside the database
    // TODO editing branch information
    // TODO creating schedular for sending them
    public function complaintFraudStatisticsIndex(): view
    {
        $data['title'] = 'Other Bank Data';
        $data['subTitle'] = 'Complaint Fraud Statistics';

        return view('obs.complaint-fraud-statistic.index', $data);
    }



    // TODO Development of API for receiving new employee information
}
