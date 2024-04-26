<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Note;
use App\Models\User;

use Faker\Provider\Lorem;

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
        return[


                
                'user_id' => User::all()->random()->id,
                'title' => implode(" ", Lorem::words(3)) ,
                'content' => implode(" ", Lorem::sentences(3)),
                //'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'

        ];

    }
}
