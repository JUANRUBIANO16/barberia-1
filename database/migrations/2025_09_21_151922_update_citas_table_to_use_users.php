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
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar las foreign keys existentes
            $table->dropForeign(['cliente_id']);
            $table->dropForeign(['barbero_id']);
            
            // Eliminar las columnas existentes
            $table->dropColumn(['cliente_id', 'barbero_id']);
            
            // Agregar nuevas columnas que referencien a users
            $table->foreignId('cliente_user_id')->constrained('users')->onDelete('cascade')->comment('Usuario con rol cliente');
            $table->foreignId('barbero_user_id')->constrained('users')->onDelete('cascade')->comment('Usuario con rol barbero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar las nuevas foreign keys
            $table->dropForeign(['cliente_user_id']);
            $table->dropForeign(['barbero_user_id']);
            
            // Eliminar las nuevas columnas
            $table->dropColumn(['cliente_user_id', 'barbero_user_id']);
            
            // Restaurar las columnas originales
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('barbero_id')->constrained('barberos')->onDelete('cascade');
        });
    }
};
