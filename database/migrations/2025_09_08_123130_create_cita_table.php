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
        Schema::create('cita', function (Blueprint $table) {
            $table->integer('id_cita')->primary();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('estado', 10)->nullable();
            $table->string('descripcion', 30)->nullable();
            $table->integer('id_clie')->index('fk_cita_cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita');
    }
};
