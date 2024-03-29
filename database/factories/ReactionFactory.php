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
            'mensaje' => TypeReaction::all()->random()->name,
            'reactionmorphable_id' => Note::all()->random()->id,
            'reactionmorphable_type' => 'App\Model\Note'
        ];
    }
}
