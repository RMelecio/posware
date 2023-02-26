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
        Schema::create('cfdi_postal_codes', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code', 5);
            $table->string('state', 5);
            $table->string('municipality', 5)->nullable(true);
            $table->string('location', 5)->nullable(true);
            $table->string('border_strip_incentive');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable(true);
            $table->string('description_time_zone');
            $table->string('summer_schedule_start_month')->nullable(true);
            $table->string('summer_schedule_start_day')->nullable(true);
            $table->string('summer_schedule_start_day_2')->nullable(true);
            $table->integer('summer_time_difference')->nullable(true);
            $table->string('winter_schedule_start_month')->nullable(true);
            $table->string('winter_schedule_start_day')->nullable(true);
            $table->string('winter_schedule_start_day_2')->nullable(true);
            $table->integer('winter_time_difference')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cfdi_postal_codes');
    }
};
