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
        Schema::create('comprobante', function (Blueprint $table) {
            $table->integer('id_comprobante')->primary();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->integer('id_venta')->index('fk_comprobante_ventas');
            $table->integer('id_tipo_pago')->index('fk_comprobante_tipo_de_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante');
    }
};
