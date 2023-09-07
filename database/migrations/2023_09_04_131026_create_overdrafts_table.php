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
        Schema::create('overdrafts', function (Blueprint $table) {
            $table->id();
            $table->text("reportingDate")->nullable();
            $table->text("accountNumber")->nullable();
            $table->text("customerIdentificationNumber")->nullable();
            $table->text("clientName")->nullable();
            $table->text("clientType")->nullable();
            $table->text("borrowerCountry")->nullable();
            $table->text("crRatingBorrower")->nullable();
            $table->text("gradesUnratedBanks")->nullable();
            $table->text("groupCode")->nullable();
            $table->text("relatedEntityName")->nullable();
            $table->text("relatedParty")->nullable();
            $table->text("relationshipCategory")->nullable();
            $table->text("loanProductType")->nullable();
            $table->text("overdraftEconomicActivity")->nullable();
            $table->text("loanPhase")->nullable();
            $table->text("transferStatus")->nullable();
            $table->text("purposeOtherLoans")->nullable();
            $table->text("contractDate")->nullable();
            $table->text("branchCode")->nullable();
            $table->text("loanOfficer")->nullable();
            $table->text("loanSupervisor")->nullable();
            $table->text("currency")->nullable();
            $table->text("orgSanctionedAmount")->nullable();
            $table->text("usdSanctionedAmount")->nullable();
            $table->text("tzsSanctionedAmount")->nullable();
            $table->text("orgUtilisedAmount")->nullable();
            $table->text("usdUtilisedAmount")->nullable();
            $table->text("tzsUtilisedAmount")->nullable();
            $table->text("orgCrUsageLast30DaysAmount")->nullable();
            $table->text("usdCrUsageLast30DaysAmount")->nullable();
            $table->text("tzsCrUsageLast30DaysAmount")->nullable();
            $table->text("disbursementDate")->nullable();
            $table->text("expiryDate")->nullable();
            $table->text("realEndDate")->nullable();
            $table->text("orgOutstandingAmount")->nullable();
            $table->text("usdOutstandingAmount")->nullable();
            $table->text("tzsOutstandingAmount")->nullable();
            $table->text("orgOutstandingPrincipalAmount")->nullable();
            $table->text("usdOutstandingPrincipalAmount")->nullable();
            $table->text("tzsOutstandingPrincipalAmount")->nullable();
            $table->text("latestCustomerCreditDate")->nullable();
            $table->text("latestCreditAmount")->nullable();
            $table->text("interestRate")->nullable();
            $table->text("collateralPledged")->nullable();
            $table->text("orgCollateralValue")->nullable();
            $table->text("usdCollateralValue")->nullable();
            $table->text("tzsCollateralValue")->nullable();
            $table->text("restructuredLoans")->nullable();
            $table->text("pastDueDays")->nullable();
            $table->text("pastDueAmount")->nullable();
            $table->text("orgAccruedInterestAmount")->nullable();
            $table->text("usdAccruedInterestAmount")->nullable();
            $table->text("tzsAccruedInterestAmount")->nullable();
            $table->text("orgPenaltyChargedAmount")->nullable();
            $table->text("usdPenaltyChargedAmount")->nullable();
            $table->text("tzsPenaltyChargedAmount")->nullable();
            $table->text("orgPenaltyPaidAmount")->nullable();
            $table->text("usdPenaltyPaidAmount")->nullable();
            $table->text("tzsPenaltyPaidAmount")->nullable();
            $table->text("orgLoanFeesChargedAmount")->nullable();
            $table->text("usdLoanFeesChargedAmount")->nullable();
            $table->text("tzsLoanFeesChargedAmount")->nullable();
            $table->text("orgLoanFeesPaidAmount")->nullable();
            $table->text("usdLoanFeesPaidAmount")->nullable();
            $table->text("tzsLoanFeesPaidAmount")->nullable();
            $table->text("orgTotMonthlyPaymentAmount")->nullable();
            $table->text("usdTotMonthlyPaymentAmount")->nullable();
            $table->text("tzsTotMonthlyPaymentAmount")->nullable();
            $table->text("orgInterestPaidTotal")->nullable();
            $table->text("usdInterestPaidTotal")->nullable();
            $table->text("tzsInterestPaidTotal")->nullable();
            $table->text("assetClassificationCategory")->nullable();
            $table->text("sectorSnaClassification")->nullable();
            $table->text("negStatusContract")->nullable();
            $table->text("customerRole")->nullable();
            $table->text("allowanceProbableLoss")->nullable();
            $table->text("botProvision")->nullable();
            $table->text("sentStatus")->default("no");
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
        Schema::dropIfExists('overdrafts');
    }
};
