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
        Schema::create('inter_branch_float_item', function (Blueprint $table) {
            $table->id();
            $table->string("reportingDate");
            $table->string("branchCode");
            $table->string("transactionDate");
            $table->string("currency");
            $table->integer("orgAmountFloat");
            $table->integer("usdAmountFloat");
            $table->integer("tzsAmountFloat");
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
        Schema::dropIfExists('inter_branch_float_item');
    }
};
