<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instagram' => $this->faker->userName(),
            'facebook' => $this->faker->userName(),
            'youtube' => $this->faker->url(),
            // 'user_id' => User::all()->random()->id,
            //'user_id' => $this->faker->rand(1,5),
        ];
    }
}
