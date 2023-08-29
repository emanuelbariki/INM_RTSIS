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
        Schema::create('branch_information', function (Blueprint $table) {
            $table->id();
            $table->string('postalCode');
            $table->string('region', 2);
            $table->string('district', 2);
            $table->string('ward', 3);
            $table->string('street');
            $table->integer('houseNumber');
            $table->string('reportingDate', 12);
            $table->string('branchName');
            $table->string('taxIdentificationNumber');
            $table->string('businessLicense');
            $table->string('branchCode');
            $table->string('qrFsrCode');
            $table->string('gpsCoordinates');
            $table->string('bankingServices');
            $table->string('mobileMoneyServices');
            $table->string('registrationDate', 12);
            $table->boolean('branchStatus');
            $table->string('closureDate', 12)->nullable();
            $table->string('contactPerson');
            $table->string('telephoneNumber');
            $table->string('altTelephoneNumber')->nullable();
            $table->boolean('branchCategory');
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
        Schema::dropIfExists('branch_information');
    }
};
