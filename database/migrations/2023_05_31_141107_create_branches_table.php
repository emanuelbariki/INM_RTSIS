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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->integer('postal_code');
            $table->string('region');
            $table->string('district');
            $table->string('ward');
            $table->string('street');
            $table->integer('house_number');
            $table->string('reporting_date');
            $table->string('branch_name');
            $table->string('tax_identification_number');
            $table->string('business_license');
            $table->string('branch_code');
            $table->string('qefsr_code');
            $table->string('gps_coordinates');
            $table->string('banking_services');
            $table->string('mobile_money_services');
            $table->string('registration_date');
            $table->string('branch_status');
            $table->string('closure_date');
            $table->string('contact_person');
            $table->string('telephone_number');
            $table->string('alt_telephone_number');
            $table->string('branch_category');
            $table->integer('status')->default(1)->comment('1: Not sent, 2: Sent, 3: Updated');
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
        Schema::dropIfExists('branches');
    }
};
