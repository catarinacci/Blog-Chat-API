<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\Category;
use App\Helpers\orem;
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
        $notes = Note::factory(100)->create();

        foreach($notes as $note){
            $note->tags()->attach([
                rand(1,3),
                rand(4,5)
            ]);
        }
    //   $notes = [
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '1',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '1',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '1',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '1',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '1',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '2',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '2',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '2',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '2',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '2',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '3',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '3',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '3',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '3',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '3',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '4',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '4',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '4',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '4',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //                 [
    //                     'category_id' => Category::all()->random()->id,
    //                     'user_id' => '4',
    //                     'title' => implode(" ", Lorem::words(3)) ,
    //                     'content' => implode(" ", Lorem::sentences(3)),
    //                     'image_note_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg'
    //                 ],
    //             ];

    //             foreach($notes as $note){
    //                 Note::create($note);
    //             }
    }
 }





