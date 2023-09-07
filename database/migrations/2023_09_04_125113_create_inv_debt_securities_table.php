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
        Schema::create('inv_debt_securities', function (Blueprint $table) {
            $table->id();
            $table->text("reportingDate")->nullable();
            $table->text("securityNumber")->nullable();
            $table->text("securityType")->nullable();
            $table->text("securityIssuerName")->nullable();
            $table->text("externalIssuerRating")->nullable();
            $table->text("gradesUnratedBanks")->nullable();
            $table->text("securityIssuerCountry")->nullable();
            $table->text("snaIssuerSector")->nullable();
            $table->text("currency")->nullable();
            $table->text("orgCostValueAmount")->nullable();
            $table->text("usdCostValueAmount")->nullable();
            $table->text("tzsCostValueAmount")->nullable();
            $table->text("orgFaceValueAmount")->nullable();
            $table->text("usdFaceValueAmount")->nullable();
            $table->text("tzsFaceValueAmount")->nullable();
            $table->text("orgFairValueAmount")->nullable();
            $table->text("usdFairValueAmount")->nullable();
            $table->text("tzsFairValueAmount")->nullable();
            $table->text("interestRate")->nullable();
            $table->text("purchaseDate")->nullable();
            $table->text("valueDate")->nullable();
            $table->text("maturityDate")->nullable();
            $table->text("tradingIntent")->nullable();
            $table->text("securityEncumbaranceStatus")->nullable();
            $table->text("pastDueDays")->nullable();
            $table->text("allowanceProbableLoss")->nullable();
            $table->text("botProvision")->nullable();
            $table->text("assetClassificationCategory")->nullable();
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
        Schema::dropIfExists('inv_debt_securities');
    }
};
