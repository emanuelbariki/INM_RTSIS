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
        
        
        Schema::create('balance_bot', function (Blueprint $table) {
            $table->id();
            $table->text('accountNumber')->nullable();
            $table->text('accountName')->nullable();
            $table->text('usdAmount')->nullable();
            $table->text('tzsAmount')->nullable();
            $table->text('orgAmount')->nullable();
            $table->text('reportingDate')->nullable();
            $table->text('maturityDate')->nullable();
            $table->text('transactionDate')->nullable();
            $table->text('currency')->nullable();
            $table->text('subAccountType')->nullable();
            $table->text('accountType')->nullable();
            $table->text('botProvision')->nullable();
            $table->text('allowanceProbableLoss')->nullable();
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
        Schema::dropIfExists('balance_bots');
    }
};
