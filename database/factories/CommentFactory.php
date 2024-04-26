<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Note;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Comment::class;

    public function definition()
    {
        return [
            'content' => $this->faker->text(),
            'user_id' => User::all()->random()->id,
            'note_id' => Note::all()->random()->id
        ];
    }
}
