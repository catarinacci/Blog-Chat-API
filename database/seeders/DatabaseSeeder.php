<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LevelSeeder::class,
            ImageSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            NoteSeeder::class,
            CommentSeeder::class,
            ResponseSeeder::class,
            TypeReactionSeeder::class,
            ReactionmSeeder::class,
            //ModuleSeeder::class,
            //MethodSeeder::class,
            

        ]);
    }
}
