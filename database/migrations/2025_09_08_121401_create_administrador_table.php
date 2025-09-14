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
        Schema::create('administrador', function (Blueprint $table) {
          $table->id('id_admin'); // id autoincremental con nombre personalizado
        $table->string('nombre', 100);
        $table->string('apellido', 100);
        $table->string('telefono', 20)->nullable();
        $table->string('correo', 150)->unique();
        $table->timestamps(); // created_at y updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrador');
    }
};
