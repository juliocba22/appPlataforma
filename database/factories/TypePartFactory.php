<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class TypePartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$faker->randomElement(['DEMANDANTE',
            'DEMANDADO',
            'COADYUVANTE PARTE DEMANDADA',
            'COADYUVANTE PARTE DEMANDANTE',
            'LITISCONSORTE PARTE DEMANDADA',
            'LITISCONSORTE PARTE DEMANDANTE',
            'LLAMADO EN GARANTIA',
            'OTROS'])
        ];
    }
}
