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
        Schema::create('sharecapitcalaccount', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate');
            $table->string('capitalCategory');
            $table->string('capitalSubCategory');
            $table->string('transactionDate');
            $table->string('transactionType');
            $table->string('shareholderNames');
            $table->string('clientType');
            $table->string('shareholderCountry');
            $table->integer('numberOfShares');
            $table->integer('sharePriceBookValue');
            $table->string('currency');
            $table->integer('orgAmount');
            $table->integer('tzsAmount');
            $table->string('sectorSnaclassification');
            $table->integer('relatedIdentification')->nullable(); // extra
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
        Schema::dropIfExists('share_capitcal_account');
    }
};
