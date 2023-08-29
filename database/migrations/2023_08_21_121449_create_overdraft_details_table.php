<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('overdraft_details', function (Blueprint $table) {
            $table->id();
            $table->text('reportingDate', 50)->nullable();
            $table->text('accountNumber', 50)->nullable();
            $table->text('customerIdentificationNumber', 50)->nullable();
            $table->text('clientName', 50)->nullable();
            $table->text('clientType', 50)->nullable();
            $table->text('borrowerCountry', 50)->nullable();
            $table->text('crRatingBorrower', 50)->nullable();
            $table->text('gradesUnratedBanks', 50)->nullable();
            $table->text('groupCode', 50)->nullable();
            $table->text('relatedEntityName', 50)->nullable();
            $table->text('relatedParty', 50)->nullable();
            $table->text('relationshipCategory', 50)->nullable();
            $table->text('loanProductType', 50)->nullable();
            $table->text('overdraftEconomicActivity', 50)->nullable();
            $table->text('loanPhase', 50)->nullable();
            $table->text('transferStatus', 50)->nullable();
            $table->text('purposeOtherLoans', 50)->nullable();
            $table->text('contractDate', 50)->nullable();
            $table->text('branchCode', 50)->nullable();
            $table->text('loanOfficer', 50)->nullable();
            $table->text('loanSupervisor', 50)->nullable();
            $table->text('currency', 50)->nullable();
            $table->text('orgSanctionedAmount', 50)->nullable();
            $table->text('usdSanctionedAmount', 50)->nullable();
            $table->text('tzsSanctionedAmount', 50)->nullable();
            $table->text('orgUtilisedAmount', 50)->nullable();
            $table->text('usdUtilisedAmount', 50)->nullable();
            $table->text('tzsUtilisedAmount', 50)->nullable();
            $table->text('orgCrUsageLast30DaysAmount', 50)->nullable();
            $table->text('usdCrUsageLast30DaysAmount', 50)->nullable();
            $table->text('tzsCrUsageLast30DaysAmount', 50)->nullable();
            $table->text('disbursementDate', 50)->nullable();
            $table->text('expiryDate', 50)->nullable();
            $table->text('realEndDate', 50)->nullable();
            $table->text('orgOutstandingAmount', 50)->nullable();
            $table->text('usdOutstandingAmount', 50)->nullable();
            $table->text('tzsOutstandingAmount', 50)->nullable();
            $table->text('orgOutstandingPrincipalAmount', 50)->nullable();
            $table->text('usdOutstandingPrincipalAmount', 50)->nullable();
            $table->text('tzsOutstandingPrincipalAmount', 50)->nullable();
            $table->text('latestCustomerCreditDate', 50)->nullable();
            $table->text('latestCreditAmount', 50)->nullable();
            $table->text('interestRate', 50)->nullable();
            $table->text('collateralPledged', 50)->nullable();
            $table->text('orgCollateralValue', 50)->nullable();
            $table->text('usdCollateralValue', 50)->nullable();
            $table->text('tzsCollateralValue', 50)->nullable();
            $table->text('restructuredLoans', 50)->nullable();
            $table->text('pastDueDays', 50)->nullable();
            $table->text('pastDueAmount', 50)->nullable();
            $table->text('orgAccruedInterestAmount', 50)->nullable();
            $table->text('usdAccruedInterestAmount', 50)->nullable();
            $table->text('tzsAccruedInterestAmount', 50)->nullable();
            $table->text('orgPenaltyPaidAmount', 50)->nullable();
            $table->text('usdPenaltyPaidAmount', 50)->nullable();
            $table->text('tzsPenaltyPaidAmount', 50)->nullable();
            $table->text('orgLoanFeesChargedAmount', 50)->nullable();
            $table->text('usdLoanFeesChargedAmount', 50)->nullable();
            $table->text('tzsLoanFeesChargedAmount', 50)->nullable();
            $table->text('orgLoanFeesPaidAmount', 50)->nullable();
            $table->text('usdLoanFeesPaidAmount', 50)->nullable();
            $table->text('tzsLoanFeesPaidAmount', 50)->nullable();
            $table->text('orgtotmonthlypaymentamount', 50)->nullable();
            $table->text('usdtotmonthlypaymentamount', 50)->nullable();
            $table->text('tzstotmonthlypaymentamount', 50)->nullable();
            $table->text('orgInterestPaidTotal', 50)->nullable();
            $table->text('usdInterestPaidTotal', 50)->nullable();
            $table->text('tzsInterestPaidTotal', 50)->nullable();
            $table->text('assetClassificationCategory', 50)->nullable();
            $table->text('sectorSnaClassification', 50)->nullable();
            $table->text('negStatusContract', 50)->nullable();
            $table->text('customerRole', 50)->nullable();
            $table->text('botProvision', 50)->nullable();
            $table->text('sentStatus', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overdraft_details');
    }
};
