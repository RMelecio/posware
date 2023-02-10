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
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('route')->nullable(true)->after('name');
            $table->string('label')->nullable(true)->after('route');
            $table->string('icon')->nullable(true)->after('label');
            $table->enum('type', ['header', 'option', 'action'])->after('guard_name');
            $table->unsignedBigInteger('parent_permission')->nullable(true)->after('guard_name');

            $table->foreign('parent_permission')->references('id')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign('parent_permission');

            $table->dropColumn(['route', 'label', 'type', 'parent_permission']);
        });
    }
};
