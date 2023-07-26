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
        Schema::create('other_liabilities', function (Blueprint $table) {
            $table->id();

            $table->string("reportingDate");
            $table->string("liabilityCategory")->default("Accounts payable");
            $table->string("counterpartyName");
            $table->string("counterpartyCountry");
            $table->string("transactionDate");
            $table->string("valueDate");
            $table->string("maturityDate");
            $table->string("currency");
            $table->integer("orgAmountOpening");
            $table->integer("usdAmountOpening");
            $table->integer("tzsAmountOpening");
            $table->integer("orgAmountPayment");
            $table->integer("usdAmountPayment");
            $table->integer("tzsAmountPayment");
            $table->integer("orgAmountBalance");
            $table->integer("usdAmountBalance");
            $table->integer("tzsAmountBalance");
            $table->string("sectorSnaClassification");

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
        Schema::dropIfExists('other_liabilities');
    }
};
