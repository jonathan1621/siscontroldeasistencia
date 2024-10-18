<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'organizador'=>'Gendarmeria',
            'tematica'=>'Salvamentos',
            'fecha'=> '2024-10-10', // Formato de fecha
            //'fecha'=> '2024-10-10',
            'horario'=>'de 08 a 16',
            'estado' => '1'
        ];
    }
}
