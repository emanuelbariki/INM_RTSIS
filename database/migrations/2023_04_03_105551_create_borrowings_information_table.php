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
        Schema::create('borrowings_information', function (Blueprint $table) {
            $table->id();


            $table->string("reportingDate");
            $table->string("borrowingType")->default("Selling Debt Securities");
            $table->string("lenderName");
            $table->string("lenderCountry");
            $table->string("lenderRelationship")->default("Domestic bank related");
            $table->string("transactionUniqueRef");
            $table->string("debtRegistrationNumber");
            $table->string("borrowersAccountNumber");
            $table->string("accountNumber");
            $table->string("borrowersBankName");
            $table->string("sectorLenderSnaClassification");
            $table->string("dateLoanContract");
            $table->string("dateLoanReceipt");
            $table->string("dateLoanMaturity");
            $table->string("annualInterestRate");
            $table->string("interestRateType");
            $table->string("borrowingPurposes");
            $table->string("currency");
            $table->integer("orgAmountOpening");
            $table->integer("tzsAmountOpening");
            $table->integer("usdAmountOpening");
            $table->integer("orgAmountRepayment");
            $table->integer("tzsAmountRepayment");
            $table->integer("usdAmountRepayment");
            $table->integer("orgAmountClosing");
            $table->integer("tzsAmountClosing");
            $table->integer("usdAmountClosing");


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
        Schema::dropIfExists('borrowings_information');
    }
};
