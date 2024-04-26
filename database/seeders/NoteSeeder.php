<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\Category;
use App\Helpers\orem;
use App\Models\Image;
use Illuminate\Support\Str;


class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::factory(100)->create()->each(function ($note) {

            $note->image()->save(Image::factory()->make());


            $note->tags()->attach($this->array(rand(1, 24)));
        });
    }


    public function array($max)
    {
        $values = [];
        for ($i=1; $i < $max  ; $i++) { 
          $values[] = $i; 
        }
        return $values;
    }
}
