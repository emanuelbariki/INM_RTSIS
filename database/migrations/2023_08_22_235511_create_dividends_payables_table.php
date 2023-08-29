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
        
        Schema::create('dividends_payable', function (Blueprint $table) {
            $table->id();
            $table->text('reportingDate')->nullable();
            $table->text('transactionDate')->nullable();
            $table->text('dividendType')->nullable();
            $table->text('currency')->nullable();
            $table->text('orgAmount')->nullable();
            $table->text('tzsAmount')->nullable();
            $table->text('sentStatus')->nullable()->default('no');
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
        Schema::dropIfExists('dividends_payables');
    }
};
