<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Documento;
use App\Models\Cliente;
use App\Models\barbero;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear documentos primero
        $documentos = [
            ['tipo_documento' => 'CC', 'numero_documento' => '12345678'],
            ['tipo_documento' => 'CC', 'numero_documento' => '87654321'],
            ['tipo_documento' => 'CC', 'numero_documento' => '11223344'],
            ['tipo_documento' => 'CC', 'numero_documento' => '44332211'],
            ['tipo_documento' => 'CC', 'numero_documento' => '55667788'],
            ['tipo_documento' => 'CC', 'numero_documento' => '88776655'],
            ['tipo_documento' => 'CC', 'numero_documento' => '99887766'],
            ['tipo_documento' => 'CC', 'numero_documento' => '66778899'],
        ];

        foreach ($documentos as $doc) {
            Documento::create($doc);
        }

        // Crear personas
        $personas = [
            [
                'razon_social' => 'Juan Pérez',
                'direccion' => 'Calle 123 #45-67',
                'tipo_persona' => 'Natural',
                'documento_id' => 1,
                'estado' => 1
            ],
            [
                'razon_social' => 'Carlos López',
                'direccion' => 'Carrera 45 #78-90',
                'tipo_persona' => 'Natural',
                'documento_id' => 2,
                'estado' => 1
            ],
            [
                'razon_social' => 'Miguel Torres',
                'direccion' => 'Avenida 67 #12-34',
                'tipo_persona' => 'Natural',
                'documento_id' => 3,
                'estado' => 1
            ],
            [
                'razon_social' => 'Ana García',
                'direccion' => 'Calle 89 #56-78',
                'tipo_persona' => 'Natural',
                'documento_id' => 4,
                'estado' => 1
            ],
            [
                'razon_social' => 'Roberto Silva',
                'direccion' => 'Carrera 12 #34-56',
                'tipo_persona' => 'Natural',
                'documento_id' => 5,
                'estado' => 1
            ],
            [
                'razon_social' => 'María Rodríguez',
                'direccion' => 'Avenida 34 #78-90',
                'tipo_persona' => 'Natural',
                'documento_id' => 6,
                'estado' => 1
            ],
            [
                'razon_social' => 'Pedro Martínez',
                'direccion' => 'Calle 56 #90-12',
                'tipo_persona' => 'Natural',
                'documento_id' => 7,
                'estado' => 1
            ],
            [
                'razon_social' => 'Laura Jiménez',
                'direccion' => 'Carrera 78 #12-34',
                'tipo_persona' => 'Natural',
                'documento_id' => 8,
                'estado' => 1
            ],
        ];

        foreach ($personas as $persona) {
            Persona::create($persona);
        }

        // Crear clientes (primeras 5 personas)
        for ($i = 1; $i <= 5; $i++) {
            Cliente::create([
                'personas_id' => $i
            ]);
        }

        // Crear barberos (últimas 3 personas)
        for ($i = 6; $i <= 8; $i++) {
            barbero::create([
                'persona_id' => $i
            ]);
        }
    }
}
