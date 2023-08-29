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

        

        Schema::create('cash', function (Blueprint $table) {
            $table->id();
            $table->text('reportingDate')->nullable();
            $table->text('branchCode')->nullable();
            $table->text('cashCategory')->nullable();
            $table->text('subCategory')->nullable();
            $table->text('currency')->nullable();
            $table->text('cashDenomination')->nullable();
            $table->text('quantityOfCoinsNotes')->nullable();
            $table->text('orgAmount')->nullable();
            $table->text('usdAmount')->nullable();
            $table->text('tzsAmount')->nullable();
            $table->text('transactionDate')->nullable();
            $table->text('maturityDate')->nullable();
            $table->text('allowanceProbableLoss')->nullable();
            $table->text('botProvision')->nullable();
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
        Schema::dropIfExists('cashes');
    }
};
