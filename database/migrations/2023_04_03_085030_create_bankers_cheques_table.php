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
        Schema::create('bankers_cheques', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("customerName");
            $table->string("customerIdentificationNumber");
            $table->string("beneficiaryName");
            $table->string("chequeNumber");
            $table->string("transactionDate");
            $table->string("valueDate");
            $table->string("maturityDate");
            $table->string("currency");
            $table->integer("orgAmount");
            $table->integer("usdAmount");
            $table->integer("tzsAmount");
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
        Schema::dropIfExists('bankers_cheques');
    }
};
