<?php

namespace App\Imports;

use App\Models\InwardBill;
use Maatwebsite\Excel\Concerns\ToModel;

class InwardBillImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new InwardBill([
            "reportingDate" => "string",
            "openingDate" => "string",
            "maturityDate" => "string",
            "holderName" => "string",
            "relationshipType" => "Domestic bank related",
            "beneficiaryName" => "string",
            "beneficiaryCountry" => "string",
            "crRatingCounterDrawerBank" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedDrawerBank" => "Grade A",
            "currency" => "string",
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "assetClassificationType" => "Current",
            "snaClassification" => "string",
            "pastDueDays" => 0,
            "provision" => "string"
        ]);
    }
}
