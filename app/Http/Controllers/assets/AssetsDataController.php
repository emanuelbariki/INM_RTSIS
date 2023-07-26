<?php

namespace App\Http\Controllers\assets;

use App\Http\Controllers\baseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use stdClass;

class AssetsDataController extends Controller
{

    public function postEndPointResponse($endpoint, $data, $informationId)
    {
        $headers = array(
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Sender' => $this->bic
        );

        if ($informationId) {
            $headers['informationId'] = $informationId;
        }

        $response = Http::withHeaders($headers)->post($this->url.$endpoint, $data);

        if ($response->status() === 201) {
            return $data = $response->json();
        } else {
            $statusCode = $response->status();
            $errorMessage = $response['error']['message'];

            return $error = [$statusCode, $errorMessage];
        }
    }


    public function assetOwned (Request $request)
    {
        $data = [
            'assetOwnedData' => [
                [
                    "reportingDate" => "string",
                    "assetCategory" => "Movable",
                    "assetType" => "Bank/company premises",
                    "acquisitionDate" => "string",
                    "currency" => "string",
                    "orgCostValue" => 0,
                    "usdCostValue" => 0,
                    "tzsCostValue" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('\assetOwned ', $data);

        return $response;
    }


    public function equityInvestment(Request $request)
    {
        $data = [
            'equityInvestmentData' => [
                [
                    "reportingDate" => "string",
                    "nameofInvestee" => "string",
                    "countryOfInvestee" => "string",
                    "obligorExternalCreditRating" => "string",
                    "gradesUnratedBanks" => "string",
                    "sectorSnaClassification" => "string",
                    "relationship" => "Holding company or its subsidiary",
                    "snaClassification" => "string",
                    "numberSharesPurchased" => 0,
                    "equityInvestmentCategory" => "Ordinary share capital",
                    "currency" => "string",
                    "orgPurchasePrice" => 0,
                    "tzsPurchasePrice" => 0,
                    "usdPurchasePrice" => 0,
                    "orgPurchasedBookValueShares" => 0,
                    "tzsPurchasedBookValueShares" => 0,
                    "usdPurchasedBookValueShares" => 0,
                    "orgPurchasedMarketValueShares" => 0,
                    "tzsPurchasedMarketValueShares" => 0,
                    "usdPurchasedMarketValueShares" => 0,
                    "numberPaidUpEquityShares" => "string",
                    "orgValuePaidUpEquityShares" => "string",
                    "tzsValuePaidUpEquityShares" => "string",
                    "usdValuePaidUpEquityShares" => "string",
                    "tradingIntent" => "Available for Sale",
                    "provision" => "string",
                    "assetClassificationCategory" => "Current"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/equityInvestment ', $data);

        return $response;
    }


    public function invDebtSecurities (Request $request)
    {
        $data = [
            'invDebtSecuritiesData' => [
                [
                    "reportingDate" => "string",
                    "securityNumber" => "string",
                    "securityType" => "Corporate bonds",
                    "securityIssuerName" => "string",
                    "externalIssuerRatting" => "Highly rated Multilateral Development Banks",
                    "gradesUnratedBanks" => "string",
                    "securityIssuerCountry" => "string",
                    "snaIssuerSector" => "string",
                    "currency" => "string",
                    "orgCostValueAmount" => 0,
                    "tzsCostValueAmount" => 0,
                    "usdCostValueAmount" => 0,
                    "orgFaceValueAmount" => 0,
                    "tzsgFaceValueAmount" => 0,
                    "usdgFaceValueAmount" => 0,
                    "orgFairValueAmount" => 0,
                    "tzsgFairValueAmount" => 0,
                    "usdgFairValueAmount" => 0,
                    "interestRate" => 0,
                    "purchaseDate" => "string",
                    "valueDate" => "string",
                    "maturityDate" => "string",
                    "tradingIntent" => "Available for Sale",
                    "securityEncumbaranceStatus" => "Encumbered",
                    "pastDueDays" => "string",
                    "allowanceProbableLoss" => "string",
                    "assetClassificationCategory" => "Current"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/invDebtSecurities ', $data);

        return $response;
    }


    public function otherAsset(Request $request)
    {
        $data = [
            'otherAssetData' =>[
                [
                    "reportingDate" => "string",
                    "assetType" => "Bank/company premises",
                    "assetTypeSubCategory" => "string",
                    "transactionDate" => "string",
                    "maturityDate" => "string",
                    "debtorName" => "string",
                    "debtorCountry" => "string",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "usdAmount" => 0,
                    "tzsAmount" => 0,
                    "sectorSnaClassification" => "string",
                    "pastDueDays" => 0,
                    "assetClassificationCategory" => "string",
                    "provision" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/otherAsset/', $data);

        return $response;
    }


    public function cashInformation(Request $request)
    {
        $data = [
            'cashData' =>[
                [
                    "reportingDate" => "string",
                    "branchCode" => "stringstringstrin",
                    "cashCategory" => "Petty cash - Coins - Notes",
                    "subCategory" => "string",
                    "currency" => "string",
                    "cashCondition" => "string",
                    "cashDenomination" => "string",
                    "quantityOfCoinsNotes" => "string",
                    "orgAmount" => 0,
                    "usdAmount" => 0,
                    "tzsAmount" => 0,
                    "transactionDate" => "string",
                    "maturityDate" => "string",
                    "allowanceProbableLoss" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/cashInformation/', $data);

        return $response;
    }


    public function balanceBot(Request $request)
    {
        $inside_content = new stdClass();
        $inside_content->accountNumber = "888999";
        $inside_content->accountName = "TESTINGGGGGGG";
        $inside_content->usdAmount = "1000";
        $inside_content->tzsAmount = "1000";
        $inside_content->orgAmount = "1000";
        $inside_content->reportingDate = "010120221900";
        $inside_content->maturityDate = "010120221900";
        $inside_content->transactionDate = '010120221900';
        $inside_content->currency = '1';
        $inside_content->subAccountType = 'SAVING';
        $inside_content->accountType = '1';

        $list_objects = array();
        array_push($list_objects, $inside_content);
// ---
        $endpoint = $this->url . "accountCategory";
        $informationId = baseController::quickRandom(10);
        // dd($endpoint);
        $data = [
            [
                "reportingDate" => "110720231107",
                "accountCode" => "SBL09",
                "accountDescription" => "SB-GENERAL I&M RICHES",
                "accountType" => "1",
                "accountCreationDate" => "101120171211",
                "accountClosureDate" => "110720231107",
                "accountStatus" => "active"
            ]
        ];


        $response = baseController::postEndPointResponse($endpoint, $data, $informationId);
        return $response;
    }


    public function balanceOtherBanks(Request $request)
    {
        $data = [
            'balanceOtherBank' => [
                [
                    "reportingDate" => "string",
                    "accountNumber" => "string",
                    "accountName" => "string",
                    "bankName" => "string",
                    "country" => "string",
                    "relationshipType" => "Domestic bank related",
                    "accountType" => "string",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "usdAmount" => 0,
                    "tzsAmount" => 0,
                    "transactionDate" => "string",
                    "pastDueDays" => 0,
                    "allowanceProbableLoss" => "string",
                    "assetsClassificationCategory" => "Current",
                    "contractDate" => "string",
                    "maturityDate" => "string",
                    "externalRatingCorrespondentBank" => "string",
                    "gradesUnratedBanks" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/balanceOtherBanks/', $data);

        return $response;
    }


    public function balanceMno(Request $request)
    {
        $data = [
            'balanceMno' =>[
                [
                    "reportingDate" => "string",
                    "floatBalanceDate" => "string",
                    "mnoName" => "string",
                    "tillNumber" => 0,
                    "currency" => "string",
                    "orgFloatAmount" => 0,
                    "usdFloatAmount" => 0,
                    "tzsFloatAmount" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/balanceMno/', $data);

        return $response;
    }


    public function interbankLoansReceivable(Request $request)
    {
        $data = [
            'interbankLoansReceivable' => [
                [
                    "reportingDate" => "string",
                    "borrowersName" => "string",
                    "borrowersCountry" => "string",
                    "relationshipType" => "string",
                    "externalRatingCorrespondentBorrower" => "string",
                    "gradesUnratedBorrower" => "string",
                    "loanType" => "Interbank call loans in Tanzania",
                    "issueDate" => "string",
                    "loanMaturityDate" => "string",
                    "currency" => "string",
                    "orgLoanAmount" => 0,
                    "tzsLoanAmount" => 0,
                    "usdLoanAmount" => 0,
                    "interestRate" => "string",
                    "pastDueDays" => "string",
                    "orgAccruedInterestAmount" => 0,
                    "tzsAccruedInterestAmount" => 0,
                    "allowanceProbableLoss" => "string",
                    "assetClassification" => "Current"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/balanceMno/', $data);

        return $response;
    }


    public function loan(Request $request)
    {
        $data = [
            'loanInformation' => [
                [
                    "reportingDate" => "string",
                    "customerIdentificationNumber" => "string",
                    "accountNumber" => "string",
                    "clientName" => "string",
                    "countryOfBorrower" => "string",
                    "crRatingBorrower" => "string",
                    "gradesUnratedBanks" => "string",
                    "categoryBorrower" => "string",
                    "gender" => "Male",
                    "disability" => "string",
                    "clientType" => "string",
                    "groupName" => "string",
                    "groupCode" => "string",
                    "relatedParty" => "string",
                    "relationshipCategory" => "string",
                    "loanNumber" => "string",
                    "loanType" => "string",
                    "loanEconomicActivity" => "Agriculture",
                    "loanPhase" => "string",
                    "transferStatus" => "string",
                    "purposeMortgage" => "string",
                    "purposeOtherLoans" => "string",
                    "sourceFundMortgage" => "string",
                    "amortizationType" => "string",
                    "branchName" => "string",
                    "branchCode" => "string",
                    "districtName" => "string",
                    "region" => "string",
                    "loanOfficer" => "string",
                    "loanSupervisor" => "string",
                    "groupVillageNumber" => "string",
                    "cycleNumber" => 0,
                    "loanInstallment" => 0,
                    "frequencyOfRepayment" => "string",
                    "currency" => "string",
                    "contactDate" => "string",
                    "orgSanctionAmount" => 0,
                    "usdSanctionAmount" => 0,
                    "tzsSanctionAmount" => 0,
                    "orgDisbursedAmount" => 0,
                    "usdDisbursedAmount" => 0,
                    "tzsDisbursedAmount" => 0,
                    "disbursementDate" => "string",
                    "maturityDate" => "string",
                    "realEndDate" => "string",
                    "restructuringDate" => "string",
                    "orgOutstandingPrincipalAmount" => 0,
                    "usdOutstandingPrincipalAmount" => 0,
                    "tzsOutstandingPrincipalAmount" => 0,
                    "orgInstallmentAmount" => 0,
                    "usdInstallmentAmount" => 0,
                    "tzsInstallmentAmount" => 0,
                    "loanInstallmentPaid" => 0,
                    "gracePeriodPaymentPrincipal" => "string",
                    "annualInterestRate" => 0,
                    "firstInstallmentPaymentDate" => "string",
                    "lastPaymentDate" => "string",
                    "collateralPledged" => "string",
                    "collateralValue" => "string",
                    "loanFlagType" => "Restructured",
                    "pastDueDays" => 0,
                    "pastDueAmount" => 0,
                    "orgAccruedInterestAmount" => 0,
                    "usdAccruedInterestAmount" => 0,
                    "tzsAccruedInterestAmount" => 0,
                    "orgPenaltyChargedAmount" => 0,
                    "usdPenaltyChargedAmount" => 0,
                    "tzsPenaltyChargedAmount" => 0,
                    "orgPenaltyPaidAmount" => 0,
                    "usdPenaltyPaidAmount" => 0,
                    "tzsPenaltyPaidAmount" => 0,
                    "orgLoanFeesChargedAmount" => 0,
                    "usdLoanFeesChargedAmount" => 0,
                    "tzsLoanFeesChargedAmount" => 0,
                    "orgTotMonthlyPaymentAmount" => 0,
                    "usdTotMonthlyPaymentAmount" => 0,
                    "tzsTotMonthlyPaymentAmount" => 0,
                    "sectorSnaClassification" => "string",
                    "assetClassificationCategory" => "string",
                    "negStatusContract" => "string",
                    "customerRole" => "string",
                    "provision" => "string",
                    "tradingIntent" => "string",
                    "suspendedInterest" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/loan/', $data);

        return $response;
    }


    public function interBranchFloatItem(Request $request)
    {
        $data = [
            'interBranchFloatItem' => [
                [
                    "reportingDate" => "string",
                    "branchName" => "string",
                    "branchCode" => "string",
                    "currency" => "string",
                    "orgAmountFloat" => 0,
                    "tzsAmountFloat" => 0,
                    "usdAmountFloat" => 0,
                    "pastDueDays" => 0,
                    "allowanceProbableLoss" => "string",
                    "classification" => "Current"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/interBranchFloatItem/', $data);

        return $response;
    }


    public function overdraft(Request $request)
    {
        $data = [
            'overdraftDetails' => [
                [
                    "reportingDate" => "string",
                    "accountNumber" => "string",
                    "customerIdentificationNumber" => "string",
                    "clientName" => "string",
                    "clientType" => "Staff",
                    "borrowerCountry" => "string",
                    "crRatingBorrower" => "string",
                    "gradesUnratedBanks" => "string",
                    "groupCode" => "string",
                    "relatedEntityName" => "string",
                    "relatedParty" => "Holding company or its subsidiary",
                    "relationshipCategory" => "Direct",
                    "loanProductType" => "string",
                    "overdraftEconomicActivity" => "string",
                    "loanPhase" => "string",
                    "transferStatus" => "string",
                    "purposeOtherLoans" => "string",
                    "contactDate" => "string",
                    "branchName" => "string",
                    "branchCode" => "string",
                    "loanOfficer" => "string",
                    "loanSupervisor" => "string",
                    "currency" => "string",
                    "orgSanctionedAmount" => 0,
                    "tzsSanctionedAmount" => 0,
                    "orgUtilisedAmount" => 0,
                    "tzsUtilisedAmount" => 0,
                    "orgCrUsageLast30DaysAmount" => 0,
                    "tzsCrUsageLast30DaysAmount" => 0,
                    "disbursementDate" => "string",
                    "expiryDate" => "string",
                    "realEndDate" => "string",
                    "orgOutstandingAmount" => 0,
                    "tzsOutstandingAmount" => 0,
                    "orgOutstandingPrincipalAmount" => 0,
                    "latestCustomerCreditDate" => "string",
                    "latestCreditAmount" => "string",
                    "interestRate" => 0,
                    "collateralPledged" => "Gold",
                    "collateralValue" => "string",
                    "restructuredLoans" => true,
                    "pastDueDays" => 0,
                    "pastDueAmount" => 0,
                    "orgAccruedInterestAmount" => 0,
                    "tzsAccruedInterestAmount" => 0,
                    "orgPenaltyChargedAmount" => 0,
                    "tzsPenaltyChargedAmount" => 0,
                    "orgPenaltyPaidAmount" => 0,
                    "tzsPenaltyPaidAmount" => 0,
                    "orgLoanFeesChargedAmount" => 0,
                    "tzsLoanFeesChargedAmount" => 0,
                    "orgTotMonthlyPaymentAmount" => 0,
                    "tzsTotMonthlyPaymentAmount" => 0,
                    "interestPaidTotal" => 0,
                    "assetClassificationCategory" => "Current",
                    "sectorSnaClassification" => "string",
                    "negStatusContract" => "string",
                    "customerRole" => "string",
                    "provision" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/overdraft/', $data);

        return $response;
    }


    public function claimTreasury(Request $request)
    {
        $data = [
            'claimTreasury' => [
                [
                    "reportingDate" => "string",
                    "transactionDate" => "string",
                    "govInstitutionName" => "string",
                    "currency" => "string",
                    "orgAmountClaimed" => 0,
                    "tzsAmountClaimed" => 0,
                    "usdAmountClaimed" => 0,
                    "valueDate" => "string",
                    "maturityDate" => "string",
                    "pastDueDays" => 0,
                    "provision" => "string",
                    "assetClassificationCategory" => "Current",
                    "sectorSnaClassification" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/claimTreasury/', $data);

        return $response;
    }


    public function institutionPremises(Request $request)
    {
        $data = [
            'institutionPremises' => [
                [
                    "reportingDate" => "string",
                    "assetCategory" => "Movable",
                    "usageOfPremisesFurniturAndEquipment" => "Banking facilities",
                    "acquisitionDate" => "string",
                    "assetType" => "string",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "usdAmount" => 0,
                    "tzsAmount" => 0,
                    "disposalDate" => "string",
                    "disposedAssetValue" => "string",
                    "orgDepreciation" => 0,
                    "usdDepreciation" => 0,
                    "tzsDepreciation" => 0,
                    "orgAccumDeprImpairment" => 0,
                    "usdAccumDeprImpairment" => 0,
                    "tzsAccumDeprImpairment" => 0,
                    "orgNetBookValue" => 0,
                    "usdNetBookValue" => 0,
                    "tzsNetBookValue" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/institutionPremises/', $data);

        return $response;
    }


    public function customerLiabilities(Request $request)
    {
        $data = [
            'customerLiabilities' => [
                [
                    "reportingDate" => "string",
                    "draftHolder" => "string",
                    "transactionDate" => "string",
                    "valueDate" => "string",
                    "maturityDate" => "string",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "tzsAmount" => 0,
                    "usdAmount" => 0,
                    "collateralPledged" => 0,
                    "pastDueDays" => 0,
                    "provision" => "string",
                    "assetClassificationCategory" => "Current",
                    "sectorSnaClassification" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/customerLiabilities/', $data);

        return $response;
    }


    public function cheques(Request $request)
    {
        $data = [
            'chequesClearing' => [
                [
                    "reportingDate" => "string",
                    "chequeNumber" => "string",
                    "issuerName" => "string",
                    "issuerBanker" => "string",
                    "payeeName" => "string",
                    "payeeAccountNumber" => "string",
                    "chequeDate" => "string",
                    "transactionDate" => "string",
                    "settlementDate" => "string",
                    "allowanceProbableLoss" => "string",
                    "currency" => "string",
                    "orgAmountOpening" => 0,
                    "tzsAmountOpening" => 0,
                    "orgAmountPayment" => 0,
                    "tzsAmountPayment" => 0,
                    "orgAmountBalance" => 0,
                    "tzsAmountBalance" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/cheques/', $data);

        return $response;
    }


    public function commercialOtherBillsPurchased(Request $request)
    {
        $data = [
            'billsCommercialOther' => [
                [
                    "reportingDate" => "string",
                    "securityNumber" => "string",
                    "billHolder" => "string",
                    "crRatingBorrower" => "string",
                    "gradesUnratedBanks" => "string",
                    "billType" => "Export bills",
                    "billTypeSubcategory" => "Export bills",
                    "transactionDate" => "string",
                    "valueDate" => "string",
                    "maturityDate" => "string",
                    "orgAmount" => 0,
                    "tzsAmount" => 0,
                    "usdAmount" => 0,
                    "billBearer" => "string",
                    "issuerCreditRating" => "Highly rated Multilateral Development Banks",
                    "issuerCountry" => "string",
                    "collateralPledged" => "Gold",
                    "pastDueDays" => 0,
                    "provision" => "string",
                    "assetClassificationCategory" => "Current",
                    "sectorSnaClassification" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/commercialOtherBillsPurchased/', $data);

        return $response;
    }


    public function underwritingAccounts(Request $request)
    {
        $data = [
            'accountsUnderwriting' => [
                [
                    "reportingDate" => "string",
                    "underwritingType" => "Underwriting Securities Purchased",
                    "collateralType" => "Gold",
                    "customerName" => "string",
                    "transactionDate" => "string",
                    "totalValueShare" => "string",
                    "totalValueShareUnderwritten" => "string",
                    "dateUnderwritten" => "string",
                    "pastDueDays" => 0,
                    "provision" => "string",
                    "assetClassificationCategory" => "Current",
                    "sectorSnaClassification" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/underwritingAccounts/', $data);

        return $response;
    }


    public function digitalCredit(Request $request)
    {
        $data = [
            'digitalCredit' => [
                [
                    "reportingDate" => "string",
                    "customerName" => "string",
                    "gender" => "Male",
                    "disabilityStatus" => "string",
                    "customerIdentificationNumber" => "string",
                    "institutionName" => "string",
                    "branchName" => "string",
                    "servicesFacilitator" => "string",
                    "productName" => "string",
                    "tzsLoanDisbursedAmount" => 0,
                    "loanDisbursementDate" => "string",
                    "tzsLoanBalance" => 0,
                    "maturityDate" => "string",
                    "loanId" => "string",
                    "lastDepositDate" => "string",
                    "lastDepositAmount" => 0,
                    "paymentsInstallment" => 0,
                    "repaymentsFrequency" => 0,
                    "loanAmotizationType" => "string",
                    "cycleNumber" => 0,
                    "loanAmountPaid" => 0,
                    "deliquenceDate" => "string",
                    "restructuringDate" => "string",
                    "interestRate" => 0,
                    "pastDueDays" => 0,
                    "pastDueAmount" => 0,
                    "currency" => "string",
                    "orgAccruedInterest" => 0,
                    "tzsAccruedInterest" => 0,
                    "usdAccruedInterest" => 0,
                    "classification" => "string",
                    "provision" => "string",
                    "interestSuspended" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/underwritingAccounts/', $data);

        return $response;
    }


    public function microfinanceSegmentLoans(Request $request)
    {
        $data = [
            'microfinanceSegmentLoans' => [
                [
                    "reportingDate" => "string",
                    "customerIdentificationNumber" => "string",
                    "accountNumber" => "string",
                    "clientName" => "string",
                    "clientCategory" => "Individual",
                    "gender" => "Male",
                    "age" => 0,
                    "disabilityStatus" => "None",
                    "loanNumber" => "string",
                    "loanIndustryClassification" => "Manufacturing",
                    "loanSubIndustry" => "Manufacturing",
                    "microfinanceLoansType" => "Business Group Loans",
                    "amortizationType" => "Fixed Installment",
                    "branchName" => "string",
                    "branchCode" => "string",
                    "loanOfficer" => "string",
                    "loanSupervisor" => "string",
                    "groupVillageNumber" => 0,
                    "cycleNumber" => 0,
                    "currency" => "string",
                    "orgSanctionAmount" => 0,
                    "tzsSanctionAmount" => 0,
                    "usdSanctionAmount" => 0,
                    "tzsDisbursedAmount" => 0,
                    "orgDisbursedAmount" => 0,
                    "usdDisbursedAmount" => 0,
                    "disbursementDate" => "string",
                    "maturityDate" => "string",
                    "restructuringDate" => "string",
                    "writeOffDate" => "string",
                    "amountWrittenOff" => 0,
                    "agreedLoanInstallments" => "string",
                    "repaymentFrequency" => "Bullet",
                    "orgOutstandingPrincipalAmount" => 0,
                    "tzsOutstandingPrincipalAmount" => 0,
                    "usdOutstandingPrincipalAmount" => 0,
                    "loanInstallmentPaid" => 0,
                    "gracePeriodPaymentPrincipal" => 0,
                    "annualInterestRate" => 0,
                    "firstInstallmentPaymentDate" => "string",
                    "loanCollateral" => "House",
                    "collateralValue" => 0,
                    "loanFlagType" => "Restructured",
                    "pastDueDays" => 0,
                    "pastDueAmount" => 0,
                    "orgAccruedInterestAmount" => 0,
                    "tzsAccruedInterestAmount" => 0,
                    "usdAccruedInterestAmount" => 0,
                    "assetClassificationCategory" => "Current",
                    "provision" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/microfinanceSegmentLoans/', $data);

        return $response;
    }


    public function premisesFurnitureEquipment(Request $request)
    {
        $data = [
            'premisesFurnitureEquipment' => [
                [
                    "reportingDate" => "string",
                    "assetCategory" => "Movable",
                    "usagePremisesFurnitureEquipment" => "string",
                    "acquisitionDate" => "string",
                    "assetType" => "Bank/company premises",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "tzsAmount" => 0,
                    "usdAmount" => 0,
                    "disposalDate" => "string",
                    "assetDisposedValue" => 0,
                    "orgCurDepr" => 0,
                    "tzsCurDepr" => 0,
                    "usdCurDepr" => 0,
                    "orgCurAccumDeprImpairment" => 0,
                    "tzsCurAccumDeprImpairment" => 0,
                    "usdCurAccumDeprImpairment" => 0,
                    "orgCurNetBookValue" => 0,
                    "tzsCurNetBookValue" => 0,
                    "usdCurNetBookValue" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/premisesFurnitureEquipment/', $data);

        return $response;
    }

}
