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
        Schema::create('atm_information', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("atmName");
            $table->string("branchCode");
            $table->string("atmCode");
            $table->string("qrFsrCode");
            $table->string("postalCode")->nullable();
            $table->string("region")->nullable();
            $table->string("district")->nullable();
            $table->string("ward")->nullable();
            $table->string("street")->nullable();
            $table->string("houseNumber")->nullable();
            $table->string("gpsCoordinates")->nullable();
            $table->string("linkedAccount");
            $table->string("openingDate");
            $table->string("atmStatus");
            $table->string("closureDate")->nullable();
            $table->string("atmCategory");
            $table->string("atmChannel");
            $table->string("relatedId");
            $table->string("sentStatus");
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
        Schema::dropIfExists('atm_information');
    }
};
