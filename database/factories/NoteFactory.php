<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Note;
use App\Models\User;

class NoteFactory extends Factory
{
    protected $model = Note::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$content = $this->faker->sentence(20);
        return [
            'content' => $this->faker->text(),
            //'image' => $this->faker->image('public/storage/notas'),
            'user_id' => User::all()->random()->id
        ];
    }
}
