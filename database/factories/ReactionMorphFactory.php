<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\TypeReaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionMorphFactory extends Factory
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
            'mensaje' => TypeReaction::all()->random()->name,
            'reactionmorphable_id' => Note::all()->random()->id,
            'reactionmorphable_type' => $array[ mt_rand(0,1)]
        ];
    }
}
