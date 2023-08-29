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
        //Schema::table('missing_tables', function (Blueprint $table) {
            //
            // Get all the table names in the database
        $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tableNames as $tableName) {
            // Check if the table doesn't have a "sentStatus" column
            if (!Schema::hasColumn($tableName, 'sentStatus')) {
                // Add the "sentStatus" column to the table
                Schema::table($tableName, function (Blueprint $table) {
                    $table->string('sentStatus')->default('no');
                });
            }
        }
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missing_tables', function (Blueprint $table) {
            //
        });
    }
};
