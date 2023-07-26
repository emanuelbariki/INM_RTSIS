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
        Schema::create('outward_bills', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("openingDate");
            $table->string("maturityDate");
            $table->string("holderName");
            $table->string("relationshipType");
            $table->string("beneficiaryName");
            $table->string("beneficiaryCountry");
            $table->string("crRatingCounterBorrower");
            $table->string("gradesforUnratedBorrower");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("usdAmount");
            $table->integer("tzsAmount");
            $table->integer("pastDueDays");
            $table->string("assetClassificationType");
            $table->string("snaClassification");
            $table->integer("impairment");
            $table->integer("botProvision");
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
        Schema::dropIfExists('outward_bills');
    }
};
