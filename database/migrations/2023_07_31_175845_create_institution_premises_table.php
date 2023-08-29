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
        
        Schema::create('institution_premises', function (Blueprint $table) {
            $table->id();
            $table->string('reportingDate')->nullable();
            $table->string('assetCategory')->nullable();
            $table->string('usageOfPremisesFurnitureAndEquipment')->nullable();
            $table->string('acquisitionDate')->nullable();
            $table->string('assetType')->nullable();
            $table->string('currency')->nullable();
            $table->string('orgAmount')->nullable();
            $table->string('usdAmount')->nullable();
            $table->string('tzsAmount')->nullable();
            $table->string('disposalDate')->nullable();
            $table->string('disposedAssetValue')->nullable();
            $table->string('orgDepreciation')->nullable();
            $table->string('usdDepreciation')->nullable();
            $table->string('tzsDepreciation')->nullable();
            $table->string('orgAccumDeprImpairment')->nullable();
            $table->string('usdAccumDeprImpairment')->nullable();
            $table->string('tzsAccumDeprImpairment')->nullable();
            $table->string('orgNetBookValue')->nullable();
            $table->string('usdNetBookValue')->nullable();
            $table->string('tzsNetBookValue')->nullable();
            $table->string('botProvision')->nullable();
            $table->string('allowanceProbableLoss')->nullable();
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
        Schema::dropIfExists('institution_premises');
    }
};
