<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('alias');
            $table->string('name');
            $table->string('trade_name');
            $table->unsignedBigInteger('fiscal_regime_id');
            $table->unsignedBigInteger('country_id');
            $table->string('state');
            $table->string('municipality');
            $table->string('location');
            $table->string('settlement');
            $table->string('postal_code');
            $table->string('address');
            $table->string('mobil');
            $table->string('email');
            $table->timestamps();

            $table->foreign('fiscal_regime_id')->references('id')->on('cfdi_fiscal_regimes');
            $table->foreign('country_id')->references('id')->on('cfdi_countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
