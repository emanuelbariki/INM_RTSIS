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
        Schema::create('digital_saving', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate');
            $table->string('customerIdentificationNumber');
            $table->string('customerName');
            $table->string('gender');
            $table->string('disabilityStatus');
            $table->string('bankName');
            $table->string('branchCode');
            $table->string('servicesFacilitator');
            $table->string('productName');
            $table->string('transactionType');
            $table->string('transactionDate');
            $table->string('currency');
            $table->integer('orgDepositAmount');
            $table->integer('usdDepositAmount');
            $table->integer('tzsDepositAmount');
            $table->integer('orgTransactionAmount');
            $table->integer('usdTransactionAmount');
            $table->integer('tzsTransactionAmount');
            $table->integer('orgDepositBalance');
            $table->integer('usdDepositBalance');
            $table->integer('tzsDepositBalance');
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
        Schema::dropIfExists('digital_saving');
    }
};
