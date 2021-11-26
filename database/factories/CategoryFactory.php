<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryFactory extends Factory
{


    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Casa independiente', 'Chalet adosado', 'Chalet pareado',
            'Apartamento', 'Estudio', 'Piso', 'Duplex', 'Atico']),
            'description' => $this->faker->sentence(),
             'terreno_size' => $this->faker->randomElement(['10X24 mts', '10X12mts', '10X15mts'])
        ];

    }
}



