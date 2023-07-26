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
        Schema::create('outstanding_acceptances', function (Blueprint $table) {
            $table->id();

            $table->string("reportingDate");
            $table->string("acceptanceType");
            $table->string("beneficiaryName");
            $table->string("transactionDate");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("usdAmount");
            $table->integer("tzsAmount");
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
        Schema::dropIfExists('outstanding_acceptances');
    }
};
