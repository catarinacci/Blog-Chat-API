<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Note;
use App\Models\TypeReaction;

class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'note_id' => Note::all()->random()->id,
            'typereaction_id' => TypeReaction::all()->random()->id
        ];
    }
}
