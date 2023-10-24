<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach($users as $user){
            $user->image()->create([
                'url' => $user->profile_photo_path,
                'imageable_id' =>$user->id
            ]);
        }

        $notes = Note::all();
        foreach($notes as $note){
            $note->image()->create([
                'url' => $note->image_note_path,
                'imageable_id' =>$note->id
            ]);
        }
    }
}
