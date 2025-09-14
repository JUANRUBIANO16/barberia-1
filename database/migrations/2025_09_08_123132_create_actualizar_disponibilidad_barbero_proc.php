<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_disponibilidad_barbero`(IN `p_id_barbero` INT, IN `p_disponibilidad` VARCHAR(10))
BEGIN
    UPDATE barbero
    SET disponibilidad = p_disponibilidad
    WHERE id_barbero = p_id_barbero;
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS actualizar_disponibilidad_barbero");
    }
};
