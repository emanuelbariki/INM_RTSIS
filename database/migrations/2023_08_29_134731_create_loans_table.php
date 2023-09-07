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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->text("reportingDate")->nullable();
            $table->text("customerIdentificationNumber")->nullable();
            $table->text("accountNumber")->nullable();
            $table->text("clientName")->nullable();
            $table->text("borrowerCountry")->nullable();
            $table->text("crRatingBorrower")->nullable();
            $table->text("gradesUnratedBanks")->nullable();
            $table->text("borrowerCategory")->nullable();
            $table->text("gender")->nullable();
            $table->text("disability")->nullable();
            $table->text("clientType")->nullable();
            $table->text("groupName")->nullable();
            $table->text("groupCode")->nullable();
            $table->text("relatedParty")->nullable();
            $table->text("relationshipCategory")->nullable();
            $table->text("loanNumber")->nullable();
            $table->text("loanType")->nullable();
            $table->text("loanEconomicActivity")->nullable();
            $table->text("loanPhase")->nullable();
            $table->text("transferStatus")->nullable();
            $table->text("purposeMortgage")->nullable();
            $table->text("purposeOtherLoans")->nullable();
            $table->text("sourceFundMortgage")->nullable();
            $table->text("amortizationType")->nullable();
            $table->text("branchCode")->nullable();
            $table->text("districtName")->nullable();
            $table->text("region")->nullable();
            $table->text("loanOfficer")->nullable();
            $table->text("loanSupervisor")->nullable();
            $table->text("groupVillageNumber")->nullable();
            $table->text("cycleNumber")->nullable();
            $table->text("loanInstallment")->nullable();
            $table->text("repaymentFrequency")->nullable();
            $table->text("currency")->nullable();
            $table->text("contractDate")->nullable();
            $table->text("orgSanctionAmount")->nullable();
            $table->text("usdSanctionAmount")->nullable();
            $table->text("tzsSanctionAmount")->nullable();
            $table->text("orgDisbursedAmount")->nullable();
            $table->text("usdDisbursedAmount")->nullable();
            $table->text("tzsDisbursedAmount")->nullable();
            $table->text("disbursementDate")->nullable();
            $table->text("maturityDate")->nullable();
            $table->text("realEndDate")->nullable();
            $table->text("restructuringDate")->nullable();
            $table->text("orgOutstandingPrincipalAmount")->nullable();
            $table->text("usdOutstandingPrincipalAmount")->nullable();
            $table->text("tzsOutstandingPrincipalAmount")->nullable();
            $table->text("orgInstallmentAmount")->nullable();
            $table->text("usdInstallmentAmount")->nullable();
            $table->text("tzsInstallmentAmount")->nullable();
            $table->text("loanInstallmentPaid")->nullable();
            $table->text("gracePeriodPaymentPrincipal")->nullable();
            $table->text("annualInterestRate")->nullable();
            $table->text("firstInstallmentPaymentDate")->nullable();
            $table->text("lastPaymentDate")->nullable();
            $table->text("collateralPledged")->nullable();
            $table->text("orgCollateralValue")->nullable();
            $table->text("usdCollateralValue")->nullable();
            $table->text("tzsCollateralValue")->nullable();
            $table->text("loanFlagType")->nullable();
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
            $table->text("sectorSnaClassification")->nullable();
            $table->text("assetClassificationCategory")->nullable();
            $table->text("negStatusContract")->nullable();
            $table->text("customerRole")->nullable();
            $table->text("allowanceProbableLoss")->nullable();
            $table->text("botProvision")->nullable();
            $table->text("tradingIntent")->nullable();
            $table->text("orgSuspendedInterest")->nullable();
            $table->text("usdSuspendedInterest")->nullable();
            $table->text("tzsSuspendedInterest")->nullable();
            $table->text("sentStatus")->nullable();
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
        Schema::dropIfExists('loans');
    }
};
