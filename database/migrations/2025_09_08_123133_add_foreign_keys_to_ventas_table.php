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
        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign(['id_clie'], 'FK_ventas_cliente')->references(['id_clie'])->on('cliente')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_serv'], 'FK_ventas_servicio')->references(['id_serv'])->on('sevicio')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign('FK_ventas_cliente');
            $table->dropForeign('FK_ventas_servicio');
        });
    }
};
