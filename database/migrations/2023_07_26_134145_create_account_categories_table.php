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
        
        Schema::create('account_categories', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate');
            $table->string('accountCode');
            $table->string('accountDescription');
            $table->string('accountType');
            $table->string('accountCreationDate');
            $table->string('accountClosureDate');
            $table->string('accountStatus');
            $table->string('sentStatus');
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
        Schema::dropIfExists('account_categories');
    }
};
