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
        Schema::table('comprobante', function (Blueprint $table) {
            $table->foreign(['id_tipo_pago'], 'FK_comprobante_tipo_de_pago')->references(['id_tipo_pago'])->on('tipo_de_pago')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_venta'], 'FK_comprobante_ventas')->references(['id_venta'])->on('ventas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comprobante', function (Blueprint $table) {
            $table->dropForeign('FK_comprobante_tipo_de_pago');
            $table->dropForeign('FK_comprobante_ventas');
        });
    }
};
