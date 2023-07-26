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
        Schema::create('transfers_payable', function (Blueprint $table) {
            $table->id();

            $table->string("reportingDate") ;
            $table->string("customerIdentificationNumber");
            $table->string("beneficiaryName");
            $table->string("beneficiaryCountry");
            $table->string("purposeTransfer");
            $table->string("beneficiaryAccNumber");
            $table->string("benReceivingInstitution");
            $table->string("benSectorSnaClassification");
            $table->string("transactionDate");
            $table->string("valueDate");
            $table->string("maturityDate");
            $table->string("senderName");
            $table->string("senderAccNumber");
            $table->string("senderCountry");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("tzsAmount");
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
        Schema::dropIfExists('transfers_payable');
    }
};
