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
        Schema::create('outstanding_letters_credits', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate');
            $table->string('lettersCreditType');
            $table->string('collateralType');
            $table->string('openingDate');
            $table->string('maturityDate');
            $table->string('holderName');
            $table->string('relationshipType');
            $table->string('beneficiaryName');
            $table->string('beneficiaryCountry');
            $table->string('crRatingCounterImporter');
            $table->string('gradesforUnratedImporter');
            $table->string('currency');
            $table->integer('orgAmount');
            $table->integer('tzsAmount');
            $table->integer('orgOutstandingDepositsAmount');
            $table->integer('tzsOutstandingDepositsAmount');
            $table->integer('pastDueDays');
            $table->string('assetClassificationType');
            $table->string('sectorSnaClassification');
            $table->string('provision');
            $table->integer('status');
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
        Schema::dropIfExists('outstanding_letters_credits');
    }
};
