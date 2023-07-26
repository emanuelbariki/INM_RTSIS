<?php

namespace App\Http\Controllers\liabilities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LiabilitiesDataController extends Controller
{
    public function __construct() {
        $this->url = 'https://jsonplaceholder.typicode.com/posts';
        $this->bic = 'IMBLTZTZ';
    }

    /**
     * receives the endpoint and data and posts the information
     *
     * @param string $endpoint
     * @param array $data
     * @return object
     */
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

    /**
     * receives the endpoint gets the information
     *
     * @param string $endpoint
     * @return object
     */
    public function getEndPointResponse($endpoint, $informationId)
    {
        $response = Http::withHeaders([
            'Sender' => $this->bic,
            'informationId' => $informationId,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get($this->url.$endpoint);

        return $response;
    }

    public function digitalSaving(Request $request)
    {
        $informationId = null;
        $data = [
            'digitalSavingProduct' => [
                [
                    'reportingDate'=> 'string',
                    'customerIdentificationNumber'=> 'string',
                    'customerName'=> 'string',
                    'gender'=> 'Male',
                    'disabilityStatus'=> 'None',
                    'bankName'=> 'string',
                    'branchCode'=> 'string',
                    'servicesFacilitator'=> 'string',
                    'productName'=> 'string',
                    'transactionType'=> 'string',
                    'transactionDate'=> 'string',
                    'currency'=> 'string',
                    'orgDepositAmount'=> 0,
                    'usdDepositAmount'=> 0,
                    'tzsDepositAmount'=> 0,
                    'orgTransactionAmount'=> 0,
                    'usdTransactionAmount'=> 0,
                    'tzsTransactionAmount'=> 0,
                    'orgDepositBalance'=> 0,
                    'usdDepositBalance'=> 0,
                    'tzsDepositBalance'=> 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/digitalSaving/', $data, $request->informationId);
        return $response;
    }

    public function getDigitalSaving(Request $request)
    {
        # code...
        return  getEndPointResponse('/digitalSaving', $request->informationId);
    }


    public function interBranchFloatItem(Request $request)
    {
        $data = [
            'interBranchFloatItem' => [
                [
                    "reportingDate"=> "string",
                    "branchCode"=> "string",
                    "transactionDate"=> "string",
                    "currency"=> "string",
                    "orgAmountFloat"=> 0,
                    "usdAmountFloat"=> 0,
                    "tzsAmountFloat"=> 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/interBranchFloatItem/', $data, $request->informationId);
        return $response;
    }

    public function getInterBranchFloatItem(Request $request)
    {
        # code...
        return  getEndPointResponse('/interBranchFloatItem', $request->informationId);
    }

    public function bankersCheques(Request $request)
    {
        $data = [
            'bankersChequesDraftIssued' => [
                [
                    "reportingDate"=> "string",
                    "customerName"=> "string",
                    "customerIdentificationNumber"=> "string",
                    "beneficiaryName"=> "string",
                    "chequeNumber"=> "string",
                    "transactionDate"=> "string",
                    "valueDate"=> "string",
                    "maturityDate"=> "string",
                    "currency"=> "string",
                    "orgAmount"=> 0,
                    "usdAmount"=> 0,
                    "tzsAmount"=> 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/bankersCheques/', $data, $request->informationId);
        return $response;
    }

    public function getBankersCheques(Request $request)
    {
        # code...
        return  getEndPointResponse('/bankersCheques', $request->informationId);
    }

    public function transfersPayable(Request $request)
    {
        $data = [
            'transfersPayable' => [
                [
                    "reportingDate" => "string",
                    "customerIdentificationNumber"=> "string",
                    "beneficiaryName"=> "string",
                    "beneficiaryCountry"=> "string",
                    "purposeTransfer"=> "string",
                    "beneficiaryAccNumber"=> "string",
                    "benReceivingInstitution"=> "string",
                    "benSectorSnaClassification"=> "string",
                    "transactionDate"=> "string",
                    "valueDate"=> "string",
                    "maturityDate"=> "string",
                    "senderName"=> "string",
                    "senderAccNumber"=> "string",
                    "senderCountry"=> "string",
                    "currency"=> "string",
                    "orgAmount"=> 0,
                    "tzsAmount"=> 0,
                    "orgAmountRepayment"=> 0,
                    "tzsAmountRepayment"=> 0,
                    "orgAmountClosing"=> 0,
                    "tzsAmountClosing"=> 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/transfersPayable/', $data, $request->informationId);
        return $response;
    }

    public function getTransfersPayable(Request $request)
    {
        # code...
        return  getEndPointResponse('/transfersPayable', $request->informationId);
    }


    public function accruedTaxes(Request $request)
    {
        $data = [
            'accruedTaxes' => [
                [
                    "reportingDate" => "string",
                    "claimantName" => "string",
                    "payableCategory" => "Income tax payable",
                    "transactionDate" => "string",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "tzsAmount" => 0,
                    "maturityDate" => "string",
                    "sectorLenderSnaClassification" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/accruedTaxes/', $data, $request->informationId);
        return $response;
    }


    public function getAccruedTaxes(Request $request)
    {
        # code...
        return  getEndPointResponse('/getAccruedTaxes', $request->informationId);
    }

    public function subordinatedDebt(Request $request)
    {
        $data = [
            'subordinatedDebt' => [
                [
                    "reportingDate" => "string",
                    "lenderName" => "string",
                    "country" => "string",
                    "sectorSnaClassification" => "string",
                    "lenderRelationship" => "string",
                    "borrowingPurposes" => "string",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "tzsAmount" => 0,
                    "annualInterestRate" => "string",
                    "interestRateType" => "string",
                    "loanContractDate" => "string",
                    "loanValueDate" => "string",
                    "maturityDate" => "string",
                    "principalPaymentDate" => "string",
                    "orgAmountRepayment" => 0,
                    "tzsAmountRepayment" => 0,
                    "orgAmountClosing" => 0,
                    "tzsAmountClosing" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/subordinatedDebt', $data, $request->informationId);
        return $response;
    }

    
    public function getSubordinatedDebt(Request $request)
    {
        # code...
        return  getEndPointResponse('/subordinatedDebt', $request->informationId);
    }


    public function unearnedIncome(Request $request)
    {
        $data = [
            'unearnedIncome' => [
                [
                    "reportingDate"=> "string",
                    "unearnedIncomeType"=> "string",
                    "beneficiaryName"=> "string",
                    "transactionDate"=> "string",
                    "currency"=> "string",
                    "orgAmount"=> 0,
                    "usdAmount"=> 0,
                    "tzsAmount"=> 0,
                    "sectorLenderSnaClassification"=> "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/unearnedIncome', $data, $request->informationId);
        return $response;
    }

    public function getUnearnedIncome(Request $request)
    {
        # code...
        return  getEndPointResponse('/unearnedIncome', $request->informationId);
    }

    public function outstandingAcceptances(Request $request)
    {
        $data = [
            'outstandingAcceptances' => [
                [
                    "reportingDate" => "string",
                    "acceptanceType" => "string",
                    "beneficiaryName" => "string",
                    "transactionDate" => "string",
                    "currency" => "string",
                    "orgAmount" => 0,
                    "usdAmount" => 0,
                    "tzsAmount" => 0,
                    "sectorLenderSnaClassification" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/outstandingAcceptances', $data, $request->informationId);
    }
      
    public function getOutstandingAcceptances(Request $request)
    {
        # code...
        return  getEndPointResponse('/outstandingAcceptances', $request->informationId);
    }

    public function depositInformation(Request $request)
    {
        $data = [
            'depositData' => [
                [
                    "accountNumber" => "string",
                    "accountName" => "string",
                    "customerCategory" => "string",
                    "branchCode" => "string",
                    "districtName" => "string",
                    "region" => "string",
                    "accountProductName" => "string",
                    "accountType" => "Saving",
                    "depositCategory" => "Public",
                    "depositAccountStatus" => true,
                    "reportingDate" => "string",
                    "clientIdentificationNumber" => "string",
                    "customerCountry" => "string",
                    "clientType" => "string",
                    "relationshipType" => "string",
                    "transactionUniqueRef" => "string",
                    "timeStamp" => "string",
                    "serviceChannel" => "Mobile Banking",
                    "currency" => "string",
                    "orgAmountOpening" => 0,
                    "usdAmountOpening" => 0,
                    "tzsAmountOpening" => 0,
                    "orgAmountDeposit" => 0,
                    "usdAmountDeposit" => 0,
                    "tzsAmountDeposit" => 0,
                    "orgAmountWithdraw" => 0,
                    "usdAmountWithdraw" => 0,
                    "tzsAmountWithdraw" => 0,
                    "orgAmountClosing" => 0,
                    "usdAmountClosing" => 0,
                    "tzsAmountClosing" => 0,
                    "sectorSnaClassification" => "string",
                    "lienNumber" => "string",
                    "orgAmountLien" => 0,
                    "usdAmountLien" => 0,
                    "tzsAmountLien" => 0,
                    "contractDate" => "string",
                    "maturityDate" => "string",
                    "annualInterestRate" => 0,
                    "interestRateType" => "string",
                    "orgInterestAmount" => 0,
                    "usdInterestAmount" => 0,
                    "tzsInterestAmount" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/depositInformation', $data, $request->informationId);
        return $response;
    }
         
    public function getDepositInformation(Request $request)
    {
        # code...
        return  getEndPointResponse('/depositInformation', $request->informationId);
    }

    public function borrowingsInformation(Request $request)
    {
        $data = [
            'borrowingsData' => [
                [
                    "reportingDate" => "string",
                    "borrowingType" => "Selling Debt Securities",
                    "lenderName" => "string",
                    "lenderCountry" => "string",
                    "lenderRelationship" => "Domestic bank related",
                    "transactionUniqueRef" => "string",
                    "debtRegistrationNumber" => "string",
                    "borrowersAccountNumber" => "string",
                    "accountNumber" => "string",
                    "borrowersBankName" => "string",
                    "sectorLenderSnaClassification" => "string",
                    "dateLoanContract" => "string",
                    "dateLoanReceipt" => "string",
                    "dateLoanMaturity" => "string",
                    "annualInterestRate" => "string",
                    "interestRateType" => "string",
                    "borrowingPurposes" => "string",
                    "currency" => "string",
                    "orgAmountOpening" => 0,
                    "tzsAmountOpening" => 0,
                    "usdAmountOpening" => 0,
                    "orgAmountRepayment" => 0,
                    "tzsAmountRepayment" => 0,
                    "usdAmountRepayment" => 0,
                    "orgAmountClosing" => 0,
                    "tzsAmountClosing" => 0,
                    "usdAmountClosing" => 0
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/borrowingsInformation', $data, $request->informationId);
        return $response;
    }

    public function getBorrowingsInformation(Request $request)
    {
        # code...
        return  getEndPointResponse('/borrowingsInformation', $request->informationId);
    }

    public function interbankLoanPayable(Request $request)
    {
        $data = [
            'interbankLoanPayable' => [
                [
                    "reportingDate" => "string",
                    "lenderName" => "string",
                    "accountNumber" => "string",
                    "lenderCountry" => "string",
                    "borroweringType" => "string",
                    "transactionDate" => "string",
                    "disbursementDate" => "string",
                    "maturityDate" => "string",
                    "currency" => "string",
                    "orgAmountOpening" => 0,
                    "tzsAmountOpening" => 0,
                    "usdAmountOpening" => 0,
                    "orgAmountRepayment" => 0,
                    "tzsAmountRepayment" => 0,
                    "usdAmountRepayment" => 0,
                    "orgAmountClosing" => 0,
                    "tzsAmountClosing" => 0,
                    "usdAmountClosing" => 0,
                    "tenureDays" => 0,
                    "annualInterestRate" => "string",
                    "interestRateType" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/interbankLoanPayable', $data, $request->informationId);
        return $response;
    }

                       
    public function getInterbankLoanPayable(Request $request)
    {
        # code...
        return  getEndPointResponse('/interbankLoanPayable', $request->informationId);
    }

    public function otherLiabilities(Request $request)
    {
        $data = [
            'otherLiabilities' => [
                [
                    "reportingDate" => "string",
                    "liabilityCategory" => "Accounts payable",
                    "counterpartyName" => "string",
                    "counterpartyCountry" => "string",
                    "transactionDate" => "string",
                    "valueDate" => "string",
                    "maturityDate" => "string",
                    "currency" => "string",
                    "orgAmountOpening" => 0,
                    "usdAmountOpening" => 0,
                    "tzsAmountOpening" => 0,
                    "orgAmountPayment" => 0,
                    "usdAmountPayment" => 0,
                    "tzsAmountPayment" => 0,
                    "orgAmountBalance" => 0,
                    "usdAmountBalance" => 0,
                    "tzsAmountBalance" => 0,
                    "sectorSnaClassification" => "string"
                ]
            ]
        ];

        $response = $this->postEndPointResponse('/otherLiabilities', $data, $request->informationId);
        return $response;
    }

    public function getOtherLiabilities(Request $request)
    {
        # code...
        return  getEndPointResponse('/otherLiabilities', $request->informationId);
    }
}
