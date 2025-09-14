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
        Schema::create('ventas', function (Blueprint $table) {
            $table->integer('id_venta')->primary();
            $table->integer('valor');
            $table->integer('cantidad')->nullable();
            $table->integer('total')->nullable();
            $table->integer('id_serv')->index('fk_ventas_servicio');
            $table->integer('id_clie')->index('fk_ventas_cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
