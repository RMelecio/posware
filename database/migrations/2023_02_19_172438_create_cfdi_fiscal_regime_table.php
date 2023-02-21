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
        Schema::create('cfdi_fiscal_regimes', function (Blueprint $table) {
            $table->id();
            $table->string('regime_code', 3);
            $table->string('description');
            $table->string('natural', 2);
            $table->string('legal', 2);
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable('true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cfdi_fiscal_regimes');
    }
};
