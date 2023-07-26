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
        Schema::create('deposit_information', function (Blueprint $table) {
            $table->id();

            $table->string("accountNumber");
            $table->string("accountName");
            $table->string("customerCategory");
            $table->string("branchCode");
            $table->string("districtName");
            $table->string("region");
            $table->string("accountProductName");
            $table->string("accountType")->default("Saving");
            $table->string("depositCategory")->default("Public");
            $table->boolean("depositAccountStatus")->default(true);
            $table->string("reportingDate");
            $table->string("clientIdentificationNumber");
            $table->string("customerCountry");
            $table->string("clientType");
            $table->string("relationshipType");
            $table->string("transactionUniqueRef");
            $table->string("timeStamp");
            $table->string("serviceChannel")->default("Mobile Banking");
            $table->string("currency");
            $table->integer("orgAmountOpening");
            $table->integer("usdAmountOpening");
            $table->integer("tzsAmountOpening");
            $table->integer("orgAmountDeposit");
            $table->integer("usdAmountDeposit");
            $table->integer("tzsAmountDeposit");
            $table->integer("orgAmountWithdraw");
            $table->integer("usdAmountWithdraw");
            $table->integer("tzsAmountWithdraw");
            $table->integer("orgAmountClosing");
            $table->integer("usdAmountClosing");
            $table->integer("tzsAmountClosing");
            $table->string("sectorSnaClassification");
            $table->string("lienNumber");
            $table->integer("orgAmountLien");
            $table->integer("usdAmountLien");
            $table->integer("tzsAmountLien");
            $table->string("contractDate");
            $table->string("maturityDate");
            $table->integer("annualInterestRate");
            $table->string("interestRateType");
            $table->integer("orgInterestAmount");
            $table->integer("usdInterestAmount");
            $table->integer("tzsInterestAmount");

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
        Schema::dropIfExists('deposit_information');
    }
};
