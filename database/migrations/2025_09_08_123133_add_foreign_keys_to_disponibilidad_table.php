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
        Schema::table('disponibilidad', function (Blueprint $table) {
            $table->foreign(['id_barbero'], 'FK_disponibilidad_barbero')->references(['id_barbero'])->on('barbero')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('disponibilidad', function (Blueprint $table) {
            $table->dropForeign('FK_disponibilidad_barbero');
        });
    }
};
