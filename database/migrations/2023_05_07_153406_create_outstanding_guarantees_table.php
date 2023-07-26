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
        Schema::create('outstanding_guarantees', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("openingDate");
            $table->string("maturityDate");
            $table->string("beneficiaryName");
            $table->string("relationshipType");
            $table->string("guaranteeTypes");
            $table->string("collateralTypes");
            $table->string("beneficiaryCountry");
            $table->string("crRatingCounterForeignBank");
            $table->string("gradesforUnratedForeignBank");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("tzsAmount");
            $table->integer("pastDueDays");
            $table->string("assetClassificationType");
            $table->string("sectorSnaClassification");
            $table->string("provision");
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
        Schema::dropIfExists('outstanding_guarantees');
    }
};
