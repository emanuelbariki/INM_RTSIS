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
        Schema::create('balance_other_banks', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate');
            $table->string('accountNumber');
            $table->string('accountName');
            $table->string('bankName');
            $table->string('country');
            $table->string('relationshipType');
            $table->string('accountType');
            $table->string('subAccountType')->nullable();
            $table->string('currency');
            $table->double('orgAmount');
            $table->double('usdAmount');
            $table->double('tzsAmount');
            $table->string('transactionDate');
            $table->integer('pastDueDays');
            $table->double('allowanceProbableLoss');
            $table->double('botProvision');
            $table->string('assetsClassificationCategory');
            $table->string('contractDate')->nullable();
            $table->string('maturityDate')->nullable();
            $table->string('externalRatingCorrespondentBank')->nullable();
            $table->string('gradesUnratedBanks')->nullable();
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
        Schema::dropIfExists('balance_other_banks');
    }
};
