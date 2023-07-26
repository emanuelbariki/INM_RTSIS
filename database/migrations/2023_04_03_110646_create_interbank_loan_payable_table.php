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
        Schema::create('interbank_loan_payable', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("lenderName");
            $table->string("accountNumber");
            $table->string("lenderCountry");
            $table->string("borroweringType");
            $table->string("transactionDate");
            $table->string("disbursementDate");
            $table->string("maturityDate");
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
            $table->integer("tenureDays");
            $table->string("annualInterestRate");
            $table->string("interestRateType");
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
        Schema::dropIfExists('interbank_loan_payable');
    }
};
