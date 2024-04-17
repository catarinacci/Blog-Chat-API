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
            TypeReactionSeeder::class,
            TagSeeder::class,
            UserSeeder::class,
            NoteSeeder::class,
            CommentSeeder::class,
            ReactionmSeeder::class,
            ModuleSeeder::class,
            //MethodSeeder::class,
            ImageSeeder::class,

        ]);
    }
}
