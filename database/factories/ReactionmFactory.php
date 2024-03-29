<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\TypeReaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array=["App\Model\Note","App\Model\Comment"];
        return [
            'user_id' => User::all()->random(),
            'mensaje' => TypeReaction::all()->random()->name,
            'reactionmable_id' => Note::all()->random()->id,
            'reactionmable_type' => $array[ mt_rand(0,1)]
        ];
    }
}
