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
        Schema::create('inward_bills', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("openingDate");
            $table->string("maturityDate");
            $table->string("holderName");
            $table->string("relationshipType" );
            $table->string("beneficiaryName");
            $table->string("beneficiaryCountry");
            $table->string("crRatingCounterDrawerBank");
            $table->string("gradesforUnratedDrawerBank");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("tzsAmount");
            $table->string("assetClassificationType");
            $table->string("snaClassification");
            $table->integer("pastDueDays");
            $table->string("provision");
            $table->string('status');
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
        Schema::dropIfExists('inward_bills');
    }
};
