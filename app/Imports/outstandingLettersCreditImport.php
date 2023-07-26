<?php

namespace App\Imports;

use App\Models\outstandingLettersCredit;
use Maatwebsite\Excel\Concerns\ToModel;

class outstandingLettersCreditImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new outstandingLettersCredit([
            // 'name' => $row[0],
            // 'numemp' => $row[1],
            // 'password' => $row[2],



            "reportingDate" => "string",
            "lettersCreditType" => "Sight Imports secured by cash, deposits or government securities",
            "collateralType" => "Gold",
            "openingDate" => "string",
            "maturityDate" => "string",
            "holderName" => "string",
            "relationshipType" => "Domestic bank related",
            "beneficiaryName" => "string",
            "beneficiaryCountry" => "string",
            "crRatingCounterImporter" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedImporter" => "Grade A",
            "currency" => "string",
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "orgOutstandingDepositsAmount" => 0,
            "tzsOutstandingDepositsAmount" => 0,
            "pastDueDays" => 0,
            "assetClassificationType" => "Current",
            "sectorSnaClassification" => "string",
            "provision" => "string"
        ]);
    }
}
