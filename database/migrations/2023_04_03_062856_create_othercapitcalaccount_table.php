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
        Schema::create('othercapitcalaccount', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate');
            $table->string('transactionDate');
            $table->string('transactionType');
            $table->string('reserveCategory');
            $table->string('reserveSubCategory');
            $table->string('currency');
            $table->integer('orgAmount');
            $table->integer('tzsAmount');
            $table->string('relatedId')->nullable();
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
        Schema::dropIfExists('othercapitcalaccount');
    }
};
