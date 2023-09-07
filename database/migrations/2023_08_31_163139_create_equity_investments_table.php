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
        
        Schema::create('equity_investment', function (Blueprint $table) {
            $table->id();
            $table->text("reportingDate")->nullable();
            $table->text("nvesteeName")->nullable();
            $table->text("investeeCountry")->nullable();
            $table->text("obligorExternalCreditRating")->nullable();
            $table->text("gradesUnratedBanks")->nullable();
            $table->text("sectorSnaClassification")->nullable();
            $table->text("relationship")->nullable();
            $table->text("snaClassification")->nullable();
            $table->text("numberSharesPurchased")->nullable();
            $table->text("equityInvestmentCategory")->nullable();
            $table->text("currency")->nullable();
            $table->text("orgPurchasePrice")->nullable();
            $table->text("usdPurchasePrice")->nullable();
            $table->text("tzsPurchasePrice")->nullable();
            $table->text("orgPurchasedBookValueShares")->nullable();
            $table->text("usdPurchasedBookValueShares")->nullable();
            $table->text("tzsPurchasedBookValueShares")->nullable();
            $table->text("orgPurchasedMarketValueShares")->nullable();
            $table->text("usdPurchasedMarketValueShares")->nullable();
            $table->text("tzsPurchasedMarketValueShares")->nullable();
            $table->text("numberPaidUpEquityShares")->nullable();
            $table->text("orgValuePaidUpEquityShares")->nullable();
            $table->text("usdValuePaidUpEquityShares")->nullable();
            $table->text("tzsValuePaidUpEquityShares")->nullable();
            $table->text("tradingIntent")->nullable();
            $table->text("allowanceProbableLoss")->nullable();
            $table->text("botProvision")->nullable();
            $table->text("assetClassificationCategory")->nullable();
            $table->text("sentStatus")->default('no');
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
        Schema::dropIfExists('equity_investments');
    }
};
