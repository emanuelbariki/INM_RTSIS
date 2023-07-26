<?php

namespace App\Http\Controllers\obs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class OffBalanceSheetController extends Controller
{
    /**
     * receives the endpoint and data and posts the information
     *
     * @param string $endpoint
     * @param array $data
     * @return object
     */
    public function postEndPointResponse($endpoint, $data)
    {
        $response = Http::withHeaders([
            'Sender' => 'BIC',
            'informationId' => '3fe6d84ac82f43a26deffd6ab2cbde1853316f12e670db9f0ca3f07a23641b01',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post($endpoint, $data);

        if ($response->status() === 201) {
            return $data = $response->json();
        } else {
            $statusCode = $response->status();
            $errorMessage = $response['error']['message'];

            return $error = [$statusCode, $errorMessage];
        }
    }


    public function outstandingGuarantees ()
    {
        $data = [
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
        ];

        $response = $this->postEndPointResponse('/outstandingGuarantees ', $data);

        return $response;
    }


    public function exportLettersCredit()
    {
        $data = [
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
        ];

        $response = $this->postEndPointResponse('/exportLettersCredit ', $data);

        return $response;
    }


    public function outstandingLettersCredit()
    {
        $data = [
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
        ];

        $response = $this->postEndPointResponse('/outstandingLettersCredit ', $data);

        return $response;
    }


    public function inwardBills()
    {
        $data = [
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
        ];

        $response = $this->postEndPointResponse('/inwardBills ', $data);

        return $response;
    }

    public function outwardBills()
    {
        $data = [
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
        ];

        $response = $this->postEndPointResponse('/outwardBills ', $data);

        return $response;
    }


    public function boughtForwardExchange()
    {
        $data = [
            "reportingDate" => "string",
            "counterpartName" => "string",
            "relationshipType" => "Domestic bank related",
            "currencyA" => "string",
            "currencyB" => "string",
            "orgAmountCurrencyA" => 0,
            "exchangeRateCurrencyAB" => 0,
            "orgAmountCurrencyB" => 0,
            "exchangeRateCurrencyA2TZS" => 0,
            "exchangeRateCurrencyB2TZS" => 0,
            "tzsAmountCurrencyA" => 0,
            "tzsAmountCurrencyB" => 0,
            "transactionDate" => "string",
            "valueDate" => "string",
            "counterpartCrRating" => 0,
            "transactionType" => "string",
            "counterpartCountry" => "string",
            "crRatingCounterSeller" => "Highly rated Multilateral Development Banks",
            "gradesUnratedSeller" => "Grade A",
            "pastDueDays" => 0,
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/boughtForwardExchange/', $data);

        return $response;
    }


    public function soldForwardExchange()
    {
        $data = [
            "reportingDate" => "string",
            "counterpartName" => "string",
            "relationshipType" => "Domestic bank related",
            "currencyA" => "string",
            "currencyB" => "string",
            "orgAmountCurrencyA" => 0,
            "exchangeRateCurrencyAB" => 0,
            "orgAmountCurrencyB" => 0,
            "exchangeRateCurrencyA2TZS" => 0,
            "exchangeRateCurrencyB2TZS" => 0,
            "tzsAmountCurrencyA" => 0,
            "tzsAmountCurrencyB" => 0,
            "transactionDate" => "string",
            "valueDate" => "string",
            "transactionType" => "string",
            "counterpartCountry" => "string",
            "crRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesUnratedCustomer" => "Grade A",
            "pastDueDays" => 0,
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/soldForwardExchange/', $data);

        return $response;
    }


    public function trustFiduciaryAccount()
    {
        $data = [
            "reportingDate" => "string",
            "depositDate" => "string",
            "beneficiaryName" => "string",
            "relationshipType" => "Domestic bank related",
            "collateralType" => "Gold",
            "beneficiaryCountry" => "string",
            "creditRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedCustomer" => "Grade A",
            "currency" => 0,
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "pastDueDays" => "string",
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/soldForwardExchange/', $data);

        return $response;
    }


    public function safekeepingHealdItem()
    {
        $data = [
            "reportingDate" => "string",
            "itemOwnerNmae" => "string",
            "relationshipType" => "Domestic bank related",
            "itemType" => "string",
            "contractDate" => "string",
            "depositDate" => "string",
            "ownerCountry" => "string",
            "creditRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedCustomer" => "Grade A",
            "currency" => 0,
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "withdrawalDate" => "string",
            "pastDueDays" => "string",
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/safekeepingHealdItem/', $data);

        return $response;
    }


    public function accountsUnsold()
    {
        $data = [
            "reportingDate" => "string",
            "securityIssuerName" => "string",
            "relationshipType" => "Domestic bank related",
            "underwrittenSecurityType" => "string",
            "contractDate" => "string",
            "issuerCountry" => "string",
            "creditRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedCustomer" => "Grade A",
            "currency" => 0,
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "pastDueDays" => "string",
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/accountsUnsold/', $data);

        return $response;
    }


    public function lateDepositPayments()
    {
        $data = [
            "reportingDate" => "string",
            "depositDate" => "string",
            "depositorName" => "string",
            "relationshipType" => "Domestic bank related",
            "gradesUnratedCustomer" => "Grade A",
            "currency" => "string",
            "orgDepositedAmount" => 0,
            "tzsDepositedAmount" => 0,
            "sectorSnaClassification" => "string",
            "pastDueDays" => 0,
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/lateDepositPayments/', $data);

        return $response;
    }


    public function chequeUnsold()
    {
        $data = [
            "reportingDate" => "string",
            "payeeName" => "string",
            "instrumentDate" => "string",
            "instrumentIssuerBank" => "string",
            "drawerName" => "string",
            "relationshipType" => "Domestic bank related",
            "crRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesUnratedCustomer" => "Grade A",
            "currency" => "string",
            "orgAmount" => 0,
            "tzsAmount" => 0,
            "sectorSnaClassification" => "string",
            "pastDueDays" => 0,
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/chequeUnsold/', $data);

        return $response;
    }


    public function securitiesSold()
    {
        $data = [
            "reportingDate" => "string",
            "relationshipType" => "Domestic bank related",
            "valueDate" => "string",
            "maturityDate" => "string",
            "buyerName" => "string",
            "buyerCountry" => "string",
            "crRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedCustomer" => "Grade A",
            "currency" => "string",
            "orgSoldAmount" => 0,
            "usdSoldAmount" => 0,
            "tzsSoldAmount" => 0,
            "orgRepurchaseAmount" => 0,
            "usdRepurchaseAmount" => 0,
            "tzsRepurchaseAmount" => 0,
            "snaClassification" => "string",
            "pastDueDays" => 0,
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/securitiesSold/', $data);

        return $response;
    }


    public function securitiesPurchased()
    {
        $data = [
            "reportingDate" => "string",
            "sellerName" => "string",
            "relationshipType" => "Domestic bank related",
            "transactionDate" => "string",
            "valueDate" => "string",
            "maturityDate" => "string",
            "sellerCountry" => "string",
            "crRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedCustomer" => "Grade A",
            "currency" => "string",
            "orgPurchasedAmount" => 0,
            "usdPurchasedAmount" => 0,
            "tzsPurchasedAmount" => 0,
            "orgResaleAmount" => 0,
            "usdResaleAmount" => 0,
            "tzsResaleAmount" => 0,
            "snaClassification" => "string",
            "pastDueDays" => 0,
            "impairment" => 0,
            "botProvision" => 0
        ];

        $response = $this->postEndPointResponse('/securitiesPurchased/', $data);

        return $response;
    }


    public function undrawnBalance()
    {
        $data = [
            "reportingDate" => "string",
            "clientFileNumber" => "string",
            "borrowerName" => "string",
            "relationshipType" => "Domestic bank related",
            "contractDate" => "string",
            "categoryUndrawnBalance" => "Unexpired overdraft lines",
            "crRatingCounterCustomer" => "Highly rated Multilateral Development Banks",
            "gradesUnratedCustomer" => "Grade A",
            "currency" => "string",
            "orgSanctionedAmount" => 0,
            "tzsSactionedAmount" => 0,
            "orgDisbursedAmount" => 0,
            "tzsDisbursedAmount" => 0,
            "orgUnutilisedAmount" => 0,
            "tzsUnutilisedAmount" => 0,
            "collateralType" => "Gold",
        ];

        $response = $this->postEndPointResponse('/undrawnBalance/', $data);

        return $response;
    }


    public function preOperatingExpenses()
    {
        $data = [
            "reportingDate" => "string",
            "currency" => "string",
            "orgAmount" => 0,
            "usdAmount" => 0,
            "tzsAmount" => 0
        ];

        $response = $this->postEndPointResponse('/preOperatingExpenses/', $data);

        return $response;
    }


    public function currencySwap()
    {
        $data = [
            "reportingDate" => "string",
            "contractDate" => "string",
            "maturityDate" => "string",
            "counterpartName" => "string",
            "relationshipType" => "Domestic bank related",
            "crRatingCounterPart" => "Highly rated Multilateral Development Banks",
            "gradesUnratedCounterPart" => "Grade A",
            "currencyA" => "string",
            "currencyB" => "string",
            "orgAmountCurrencyA" => 0,
            "tzsAmountCurrencyA" => 0,
            "spotExchangeRateCurrencyAB" => 0,
            "orgAmountCurrencyB" => 0,
            "tzsAmountCurrencyB" => 0,
            "exchangeRateCurrencyA2TZS" => 0,
            "exchangeRateCurrencyB2TZS" => 0,
            "fowardExchangeRate" => 0,
            "fowardExchangeRateCurrencyA2TZS" => 0,
            "fowardExchangeRateCurrencyB2TZS" => 0,
            "transactionDate" => "string",
            "tzsFowardCurrencyA" => 0,
            "tzsFowardCurrencyB" => 0,
            "valueDate" => "string",
            "crRatingCounterpart" => "string",
            "transactionType" => "string",
            "sectorSnaClassification" => "string"

        ];

        $response = $this->postEndPointResponse('/currencySwap/', $data);

        return $response;
    }


    public function interestRateSwap()
    {
        $data = [
            "reportingDate" => "string",
            "contractDate" => "string",
            "maturityDate" => "string",
            "counterpartName" => "string",
            "counterpartCountry" => "string",
            "relationshipType" => "Domestic bank related",
            "crRatingCounterpart" => "Highly rated Multilateral Development Banks",
            "gradesforUnratedCounterPart" => "Grade A",
            "currency" => 0,
            "orgContractAmount" => 0,
            "tzsContractAmount" => 0,
            "fixedInterestRate" => 0,
            "floatInterestRate" => 0,
            "LIBORRate" => 0,
            "taxRate" => 0,
            "arrangementFee" => "string",
            "sectorSnaClassification" => "string",
            "tradingIntent" => "Available for Sale"
        ];

        $response = $this->postEndPointResponse('/interestRateSwap/', $data);

        return $response;
    }


    public function equityDerivatives()
    {
        $data = [
            "reportingDate" => "string",
            "contractDate" => "string",
            "maturityDate" => "string",
            "counterpartName" => "string",
            "crRatingCounterpart" => "Highly rated Multilateral Development Banks",
            "gradesUnratedCounterPart" => "Grade A",
            "relationshipType" => "Domestic bank related",
            "equityDerivativesCategory" => "putOptions",
            "sectorSnaClassification" => "string",
            "counterpartCountry" => "string",
            "currency" => "string",
            "orgContractAmount" => 0,
            "tzsContractAmount" => 0,
            "fixedInterestRate" => 0,
            "tzsStartStockPriceAmount" => 0,
            "orgStockPriceAmount" => 0,
            "tzsStockPriceAmount" => 0,
            "tradingIntent" => "Available for Sale"
        ];

        $response = $this->postEndPointResponse('/equityDerivatives/', $data);

        return $response;
    }


    public function interestRateFutures()
    {
        $data = [
            "reportingDate" => "string",
            "contractDate" => "string",
            "expiryDate" => "string",
            "underlyingAssetType" => "string",
            "counterpartName" => "string",
            "counterpartCountry" => "string",
            "relationshipType" => "Domestic bank related",
            "crRatingCounterpart" => "Highly rated Multilateral Development Banks",
            "gradesUnratedCounterPart" => "Grade A",
            "currency" => "string",
            "orgContractStartAmount" => 0,
            "tzsContractStartAmount" => 0,
            "orgContractCloseAmount" => 0,
            "tzsContractCloseAmount" => 0,
            "orgMarginAccStartAmount" => 0,
            "tzsMarginAccStartAmount" => 0,
            "orgMarginAccCloseAmount" => 0,
            "tzsMarginAccCloseAmount" => 0,
            "fixedInterestRate" => 0,
            "floatInterestRate" => 0,
            "liborRate" => 0,
            "taxRate" => 0,
            "arrangementFee" => "string",
            "sectorSnaClassification" => "string",
            "tradingIntent" => "Available for Sale"
        ];

        $response = $this->postEndPointResponse('/interestRateFutures/', $data);

        return $response;
    }


    public function incomeStatement()
    {
        $data = [
            "reportingDate" => "string",
            "interestIncome" => "string",
            "interestExpense" => "string",
            "badDebtsWrittenOffNotProvided" => "string",
            "provisionBadDoubtfulDebts" => "string",
            "impairmentsInvestments" => "string",
            "nonInterestIncome" => "string",
            "nonInterestExpenses" => "string",
            "incomeTaxProvision" => "string",
            "extraordinaryCreditsCharge" => "string",
            "nonCoreCreditsCharges" => "string",
            "amountInterestIncome" => 0,
            "amountInterestExpenses" => 0,
            "amountNonInterestIncome" => 0,
            "amountNonInterestExpenses" => 0,
            "amountnonCoreCreditsCharges" => 0
        ];

        $response = $this->postEndPointResponse('/incomeStatement/', $data);

        return $response;
    }


    public function individualInformation()
    {
        $data = [
            "reportingDate" => "string",
            "customerIdentificationNumber" => "string",
            "accountNumber" => "string",
            "currency" => "string",
            "accountOperationStatus" => "active",
            "classification" => "Individual",
            "smrCode" => "Non-Government",
            "negativeClientStatus" => "NoNegativeStatus",
            "firstName" => "string",
            "middleNames" => "string",
            "otherNames" => "string",
            "fullNames" => "string",
            "presentSurname" => "string",
            "birthSurname" => "string",
            "gender" => "Male",
            "maritalStatus" => "Single",
            "numberSpouse" => 0,
            "spousesFullName" => "string",
            "spouseIdentificationType" => "NationalIdentityCard",
            "maidenName" => "string",
            "nationality" => "string",
            "citizenship" => "string",
            "residency" => "string",
            "profession" => "string",
            "socialStatus" => "string",
            "employerStatus" => "string",
            "employerName" => "string",
            "monthlyIncome" => 0,
            "monthlyExpenses" => 0,
            "numberOfDependants" => 0,
            "educationLevel" => "NoEducation",
            "averageMonthlyExpenditure" => "string",
            "status" => "string",
            "snaSectorClassification" => "string",
            "fateStatus" => "string",



            "birthPostalCode" => 0,
            "birthRegion" => "string",
            "birthDistrict" => "string",
            "birthWard" => "string",
            "birthStreet" => "string",
            "birthHouseNumber" => 0,
            "birthDate" => "string",
            "birthCountry" => "string"

        ];

        $response = $this->postEndPointResponse('/individualInformation/', $data);

        return $response;
    }


    // public function new()
    // {
    //     $body = [
    //         'interestTrustAccountData' => [
    //             [
    //                 'reportingDate' => 'string',
    //                 'trustAccountNumber' => 'string',
    //                 'trustAccountName' => 'string',
    //                 'bankName' => 'string',
    //                 'currency' => 'string',
    //                 'interestTrustAccountBalance' => 0,
    //                 'interestApprovedForDistribution' => 0,
    //                 'actualInterestDistributedAmount' => 0,
    //                 'transactionType' => 'string',
    //                 'undistributedinterestAmount' => 0,
    //                 'transactionDate' => 'string',
    //                 'transactionID' => 'string',
    //                 'mobilemoneyCustomerCategory' => 'Subscribers'
    //             ]
    //         ]
    //     ];


    // }

}
