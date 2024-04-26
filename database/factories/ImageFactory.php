<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Image::class;


    public function definition()
    {
        return [
            
            'url' => 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/photo-books-on-white.jpg',
        ];
    }
}
