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
        Schema::create('interbank_loans_receivables', function (Blueprint $table) {
            $table->id();
            $table->text("reportingDate")->nullable();
            $table->text("borrowersInstitutionCode")->nullable();
            $table->text("borrowersCountry")->nullable();
            $table->text("relationshipType")->nullable();
            $table->text("externalRatingCorrespondentBorrower")->nullable();
            $table->text("gradesUnratedBorrower")->nullable();
            $table->text("loanType")->nullable();
            $table->text("issueDate")->nullable();
            $table->text("loanMaturityDate")->nullable();
            $table->text("currency")->nullable();
            $table->text("orgLoanAmount")->nullable();
            $table->text("usdLoanAmount")->nullable();
            $table->text("tzsLoanAmount")->nullable();
            $table->text("interestRate")->nullable();
            $table->text("pastDueDays")->nullable();
            $table->text("allowanceProbableLoss")->nullable();
            $table->text("botProvision")->nullable();
            $table->text("assetClassification")->nullable();
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
        Schema::dropIfExists('interbank_loans_receivables');
    }
};
