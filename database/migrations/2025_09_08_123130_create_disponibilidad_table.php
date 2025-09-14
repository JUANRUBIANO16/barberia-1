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
        Schema::create('disponibilidad', function (Blueprint $table) {
            $table->integer('id_disp')->primary();
            $table->date('fecha')->nullable();
            $table->time('hora_de_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->integer('id_barbero')->index('fk_disponibilidad_barbero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilidad');
    }
};
