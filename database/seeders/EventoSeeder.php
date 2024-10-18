<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {

        Evento::factory()->count(10)->create();

        Evento::create([
            'organizador'=>'Bomberos de la Ciudad',
            'tematica'=>'Salvamentos',
            'fecha'=> Carbon::createFromFormat('Y-m-d', '2024-10-10'), // Formato de fecha
            //'fecha'=> '2024-10-10',
            'horario'=>'de 08 a 16',
            'estado' => '1'
        ]);
        Evento::create([
            'organizador'=>'Ministerio',
            'tematica'=>'Incendio',
            //'fecha'=> '2024-10-10',
            'fecha'=> Carbon::createFromFormat('Y-m-d', '2024-10-10'), // Formato de fecha
            'horario'=>'de 08 a 19',
            'estado' => '1'
        ]);
        Evento::create([
            'organizador'=>'Gendarmeria',
            'tematica'=>'Prevencion',
            'fecha'=> Carbon::createFromFormat('Y-m-d', '2024-10-10'), // Formato de fecha
            //'fecha'=> '2024-10-10', // Formato de fecha
            'horario'=>'de 10 a 20',
            'estado' => '1'
        ]);
    }
}
