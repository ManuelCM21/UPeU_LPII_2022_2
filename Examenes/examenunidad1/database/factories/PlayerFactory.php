<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
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
            'lastname'=>$this->faker->lastName(),
            'birthdate'=>$this->faker->date(),
            'dni'=>$this->faker->unique()->ean8(),
            'type'=>$this->faker->randomElement(['Varon','Dama']),
            'number'=>$this->faker->unique()->tollFreePhoneNumber(),
            'observations'=>$this->faker->text(2000),
            'team_id'=>Team::all()->random()->id,
        ];
    }
}
