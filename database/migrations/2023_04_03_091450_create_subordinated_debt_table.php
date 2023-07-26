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
        Schema::create('subordinated_debt', function (Blueprint $table) {
            $table->id();

            $table->string("reportingDate");
            $table->string("lenderName");
            $table->string("country");
            $table->string("sectorSnaClassification");
            $table->string("lenderRelationship");
            $table->string("borrowingPurposes");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("tzsAmount");
            $table->string("annualInterestRate");
            $table->string("interestRateType");
            $table->string("loanContractDate");
            $table->string("loanValueDate");
            $table->string("maturityDate");
            $table->string("principalPaymentDate");
            $table->integer("orgAmountRepayment");
            $table->integer("tzsAmountRepayment");
            $table->integer("orgAmountClosing");
            $table->integer("tzsAmountClosing");

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
        Schema::dropIfExists('subordinated_debt');
    }
};
