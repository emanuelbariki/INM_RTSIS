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
        Schema::create('premises_furniture_equipment', function (Blueprint $table) {
            $table->id();
            $table->text("reportingDate")->nullable();
            $table->text("assetCategory")->nullable();
            $table->text("usagePremisesFurnitureEquipment")->nullable();
            $table->text("acquisitionDate")->nullable();
            $table->text("assetType")->nullable();
            $table->text("currency")->nullable();
            $table->text("orgAmount")->nullable();
            $table->text("usdAmount")->nullable();
            $table->text("tzsAmount")->nullable();
            $table->text("disposalDate")->nullable();
            $table->text("orgAssetDisposedValue")->nullable();
            $table->text("usdAssetDisposedValue")->nullable();
            $table->text("tzsAssetDisposedValue")->nullable();
            $table->text("orgCurDepr")->nullable();
            $table->text("usdCurDepr")->nullable();
            $table->text("tzsCurDepr")->nullable();
            $table->text("orgCurAccumDeprImpairment")->nullable();
            $table->text("usdCurAccumDeprImpairment")->nullable();
            $table->text("tzsCurAccumDeprImpairment")->nullable();
            $table->text("orgCurNetBookValue")->nullable();
            $table->text("usdCurNetBookValue")->nullable();
            $table->text("tzsCurNetBookValue")->nullable();
            $table->text("sentStatus")->nullable();
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
        Schema::dropIfExists('premises_furniture_equipment');
    }
};
