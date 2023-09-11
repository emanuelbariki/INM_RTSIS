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
        Schema::create('accrued_taxes', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("claimantName");
            $table->string("payableCategory")->comment("Income tax payable"); // removing the comment
            $table->string("transactionDate");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("tzsAmount");
            $table->string("maturityDate");
            $table->string("sectorLenderSnaClassification");

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
        Schema::dropIfExists('accrued_taxes');
    }
};
