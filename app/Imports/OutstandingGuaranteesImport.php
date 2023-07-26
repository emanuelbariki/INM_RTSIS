<?php

namespace App\Imports;

use App\Models\OutstandingGuarantees;
use Maatwebsite\Excel\Concerns\ToModel;

class OutstandingGuaranteesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OutstandingGuarantees([

            "reportingDate" => "string",
            "openingDate" => "string",
            "maturityDate" => "string",
            "beneficiaryName" => "string",
            "relationshipType" => "Domestic bank related",
            "guaranteeTypes" => "Guarantees for loan, trade and securities",
            "collateralTypes" => "Gold",
            "beneficiaryCountry" => "string",
            "crRatingCounterForeignBank" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedForeignBank" => "Grade A",
            "currency" => "string",
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "pastDueDays" => 0,
            "assetClassificationType" => "Current",
            "sectorSnaClassification" => "string",
            "provision" => "string"
        ]);
    }
}
