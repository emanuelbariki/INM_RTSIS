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
        Schema::create('complaint_fraud_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('reporting_date');
            $table->string('complaint_name');
            $table->string('complaint_mobile');
            $table->string('complaint_type');
            $table->string('occurance_date');
            $table->string('complaint_report_date');
            $table->string('closure_date');
            $table->string('agent_name');
            $table->string('till_number');
            $table->string('currency');
            $table->decimal('tzsamount', 8, 2);
            $table->string('employee_id');
            $table->string('referred_complaints');
            $table->string('complaint_status');
            $table->integer('status')->default(1)->comment('1: not sent, 2: sent, 3: uploaded');
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
        Schema::dropIfExists('complaint_fraud_statistics');
    }
};
