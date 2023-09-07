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
        Schema::create('share_capital', function (Blueprint $table) {
            $table->id();
            $table->text("reportingDate")->nullable();
            $table->text("capitalCategory")->nullable();
            $table->text("capitalSubCategory")->nullable();
            $table->text("transactionDate")->nullable();
            $table->text("transactionType")->nullable();
            $table->text("shareholderNames")->nullable();
            $table->text("clientType")->nullable();
            $table->text("shareholderCountry")->nullable();
            $table->text("numberOfShares")->nullable();
            $table->text("sharePriceBookValue")->nullable();
            $table->text("currency")->nullable();
            $table->text("orgAmount")->nullable();
            $table->text("tzsAmount")->nullable();
            $table->text("sectorSnaClassification")->nullable();
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
        Schema::dropIfExists('share_capitals');
    }
};
