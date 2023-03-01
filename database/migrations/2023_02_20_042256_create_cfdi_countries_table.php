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
        Schema::create('cfdi_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country', 3);
            $table->string('description');
            $table->string('postal_code_form')->nullable(true);
            $table->string('tax_identity_registration_form')->nullable(true);
            $table->string('validation_tax_identity_registration')->nullable(true);
            $table->string('grouping')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cfdi_countries');
    }
};
