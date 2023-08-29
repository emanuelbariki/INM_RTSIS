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
        Schema::create('atm_transactions', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("atmCode");
            $table->string("tillNumber")->nullable();
            $table->string("transactionDate");
            $table->string("transactionId");
            $table->string("transactionType");
            $table->string("currency");
            $table->string("orgTransactionAmount")->nullable();
            $table->string("tzsTransactionAmount")->nullable();
            $table->string("atmChannel")->nullable();
            $table->string("atmServices")->nullable();
            $table->string("mobileMoneyServices")->nullable();
            $table->string("valueAddedTaxAmount")->nullable();
            $table->string("exciseDutyAmount")->nullable();
            $table->string("electronicLevyAmount")->nullable();
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
        Schema::dropIfExists('atm_transactions');
    }
};
