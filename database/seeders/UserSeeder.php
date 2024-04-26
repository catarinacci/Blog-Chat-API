<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Location;
use App\Models\Profile;
use App\Models\TypeReaction;
use App\Models\Reaction;
use App\Models\Tag;
use BladeUI\Icons\Factory;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'level_id' => 1,
                'name' => 'Gabriel',
                'surname' => 'Catarinacci',
                'nickname'=>'Gabi',
                'email'=> 'catarinacci@gmail.com',
                'password'=> bcrypt(12345678),
                //'profile_photo_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.png',
                'email_verified_at' => now()
            ],
            [
                'level_id' => 2,
                'name' => 'Rodrigo',
                'surname' => 'Alvera',
                'nickname'=>'Rodri',
                'email'=> 'systemredsys@gmail.com',
                'password'=> bcrypt(12345678),
                //'profile_photo_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.png',
                'email_verified_at' => now()
            ],
            [
                'level_id' => 3,
                'name' => 'ignacio daniel',
                'surname' => 'carrillo',
                'nickname'=>'nacho',
                'email'=> 'carrillo@gmail.com',
                'password'=> bcrypt(12345678),
                //'profile_photo_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.png',
                'email_verified_at' => now()
            ],
            [
                'level_id' => 3,
                'name' => 'alberto',
                'surname' => 'diaz alvarez',
                'nickname'=>'toto',
                'email'=> 'alvarez@gmail.com',
                'password'=> bcrypt(12345678),
                //'profile_photo_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.png',
                'email_verified_at' => now()
            ],
            [
                'level_id' => 3,
                'name' => 'kevin',
                'surname' => 'romero',
                'nickname'=>'keven',
                'email'=> 'keven@gmail.com',
                'password'=> bcrypt(12345678),
                //'profile_photo_path'=> 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.png',
                'email_verified_at' => now()
            ],
        ];

        foreach($users as $user){
            $users_object = User::create($user);
        }

        $users_object->each(function($user){
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());
            //$user->tags()->attach(Tag::all()->random()->id);
            $user->image()->save(Image::factory()->make([
                'url' => 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/blank-profile-picture.jpg'
            ]));
        });
        // User::factory()
        // ->count(10)
        // ->hasNotes(2)
        // ->create();

        // User::factory(8)->create()->each(function(User $user){
        //     Note::factory(8)->create([
        //         'user_id' => $user->id
        //     ]);
        // });



        // User::factory(1)->create()->each(function(User $user){
        //     $notes = Note::all();
        //     $note_id = $notes->random(1);
        //     $json = json_decode($note_id, true);

        //     foreach($notes as $note){
        //         Comment::factory(2)->create([
        //             'user_id' => $user->id,
        //             'note_id' => $json[0]['id']
        //         ]);
        //     }
        // });

        // User::factory(3)->create()->each(function(User $user){
        //     $notes = Note::all();
        //     $typereactions = TypeReaction::all();
        //     foreach ($notes as $note) {
        //         $typereaction_id = $typereactions->random(1);
        //         $json = json_decode($typereaction_id, true);
        //         Reaction::factory(1)->create([
        //             'user_id'=> $user->id,
        //             'note_id' => $note->id,
        //             'typereaction_id' => $json[0]['id']
        //         ]);
        //     }
        // });



    }
}
