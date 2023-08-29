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
        Schema::create('other_asset_data', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate')->nullable();
            $table->string('assetType')->nullable();
            $table->string('assetTypeSubCategory')->nullable();
            $table->string('transactionDate')->nullable();
            $table->string('maturityDate')->nullable();
            $table->string('debtorName')->nullable();
            $table->string('debtorCountry')->nullable();
            $table->string('currency')->nullable();
            $table->string('orgAmount')->nullable();
            $table->string('usdAmount')->nullable();
            $table->string('tzsAmount')->nullable();
            $table->string('sectorSnaClassification')->nullable();
            $table->string('pastDueDays')->nullable();
            $table->string('assetClassificationCategory')->nullable();
            $table->string('botProvision')->nullable();
            $table->string('allowanceProbableLoss')->nullable();

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
        Schema::dropIfExists('other_asset_data');
    }
};
