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
        Schema::create('sevicio', function (Blueprint $table) {
            $table->integer('id_serv')->primary();
            $table->string('nombre', 20);
            $table->integer('precio');
            $table->string('descripcion', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sevicio');
    }
};
