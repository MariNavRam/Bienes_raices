<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clasification;

class ClasificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clasification::create([
            'name'=>'Multifamiliares',
            'description'=>'cuando se trate de dos o más viviendas en una sola edificación y donde el terreno es de propiedad común.',
             'material'=>'concreto'

        ]);
        Clasification::create([
            'name'=>'Unifamiliares',
            'description'=>' Cuando se trate de una vivienda sobre un lote',
             'material'=>'adobe'

        ]);
        Clasification::create([
            'name'=>'Residencial',
            'description'=>'Cuando se trate de dos o más viviendas en varias edificaciones independientes y donde el terreno es de propiedad común.',
             'material'=>'bloque y concreto'

        ]);
        Clasification::create([
            'name'=>'Quinta',
            'description'=>'cuando se trate de dos o más viviendas sobre lotes propios que comparten un acceso común.',
             'material'=>'concreto'

        ]);
    }
}
