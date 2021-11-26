<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Casas;

class CasaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Casas::create([
            'name'=>'Casa del lago',
            'description'=>'Vivienda particular de construcción fija que generalmente no comparte pared, techo o piso con otra vivienda',
             'precio'=>'1200000'
        ]);

        Casas::create([
            'name'=>'Casa del lago',
            'description'=>'Vivienda particular cerca de lago',
             'precio'=>'2000000'
        ]);
        Casas::create([
            'name'=>'Casa de Campo',
            'description'=>'Vivienda particular de construcción fija, cerca de un campo',
             'precio'=>'25000000'
        ]);
        Casas::create([
            'name'=>'Casa del Lujo',
            'description'=>'Vivienda particular de construcción fija, moderna',
             'precio'=>'23000000'
        ]);

    }
}
