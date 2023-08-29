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
        //
        Schema::table('users', function (Blueprint $table) {
            // Rename the 'name' column to 'name' and drop other columns
            $table->renameColumn('firstname', 'name');
            $table->dropColumn(['middlename', 'lastname', 'email_verified_at', 'active', 'remember_token', 'sentStatus']);

            // Remove any indexes if necessary
            $table->dropIndex(['firstname']);
            $table->dropIndex(['middlename']);
            $table->dropIndex(['lastname']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        // This method will be called if you need to rollback the migration
        Schema::table('users', function (Blueprint $table) {
            // You can revert the changes here if necessary
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->string('sentStatus')->nullable();
        });
    }
};
