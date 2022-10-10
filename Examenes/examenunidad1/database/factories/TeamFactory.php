<?php

namespace Database\Factories;

use App\Models\Cycle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(2000),
            'type'=>$this->faker->randomElement(['Masculino','Femenino']),
            'color'=>$this->faker->safeColorName(),
            'status'=>$this->faker->randomElement(['Activo','Inactivo']),
            'cycle_id'=>Cycle::all()->random()->id,
        ];
    }
}
