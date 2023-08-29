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
       
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("chequeNumber");
            $table->string("issuerName")->nullable();
            $table->string("issuerBanker")->nullable();
            $table->string("payeeName")->nullable();
            $table->string("payeeAccountNumber")->nullable();
            $table->string("chequeDate")->nullable();
            $table->string("transactionDate")->nullable();
            $table->string("settlementDate")->nullable();
            $table->string("allowanceProbableLoss")->nullable();
            $table->string("currency")->nullable();
            $table->string("orgAmountOpening")->nullable();
            $table->string("usdAmountOpening")->nullable();
            $table->string("tzsAmountOpening")->nullable();
            $table->string("orgAmountPayment")->nullable();
            $table->string("usdAmountPayment")->nullable();
            $table->string("tzsAmountPayment")->nullable();
            $table->string("orgAmountBalance")->nullable();
            $table->string("usdAmountBalance")->nullable();
            $table->string("tzsAmountBalance")->nullable();
            $table->string("botProvision")->nullable();
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
        Schema::dropIfExists('cheques');
    }
};
