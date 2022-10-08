<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->word(20),
            'extract'=>$this->faker->text(250),
            'body'=>$this->faker->text(1000),
            'status'=>$this->faker->randomElement([1,2]),
            'category_id'=>Category::all()->random()->id,
            'user_id'=>User::all()->random()->id,
        ];
    }
}
