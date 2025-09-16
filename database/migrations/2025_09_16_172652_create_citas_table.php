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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            
            // Relación con cliente
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            
            // Relación con barbero
            $table->foreignId('barbero_id')->constrained('barberos')->onDelete('cascade');
            
            // Fecha y hora de la cita
            $table->dateTime('fecha_hora');
            
            // Estado de la cita: 1=pendiente, 2=confirmada, 3=completada, 4=cancelada
            $table->tinyInteger('estado')->default(1);
            
            // Observaciones o notas de la cita
            $table->text('observaciones')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
