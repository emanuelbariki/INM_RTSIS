<?php

namespace App\Imports;

use App\Models\ExportLetterCredit;
use Maatwebsite\Excel\Concerns\ToModel;

class ExportLetterCreditImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ExportLetterCredit([

            "reportingDate" => "string",
            "openingDate" => "string",
            "maturityDate" => "string",
            "holderName" => "string",
            "relationshipType" => "Domestic bank related",
            "beneficiaryName" => "string",
            "beneficiaryCountry" => "string",
            "crRatingCounterForeignBank" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedForeignBank" => "Grade A",
            "currency" => "string",
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "assetClassificationType" => "Current",
            "sectorSnaClassification" => "string",
            "pastDueDays" => 0,
            "provision" => "string"
        ]);
    }
}
