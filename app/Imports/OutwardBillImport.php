<?php

namespace App\Imports;

use App\Models\OutwardBill;
use Maatwebsite\Excel\Concerns\ToModel;

class OutwardBillImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OutwardBill([
            "reportingDate" => "string",
            "openingDate" => "string",
            "maturityDate" => "string",
            "holderName" => "string",
            "relationshipType" => "Domestic bank related",
            "beneficiaryName" => "string",
            "beneficiaryCountry" => "string",
            "crRatingCounterBorrower" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedBorrower" => "Grade A",
            "currency" => "string",
            "orgAmount" => 0,
            "usdAmount" => 0,
            "tzsAmount" => 0,
            "pastDueDays" => 0,
            "assetClassificationType" => "Current",
            "snaClassification" => "string",
            "impairment" => 0,
            "botProvision" => 0
        ]);
    }
}
