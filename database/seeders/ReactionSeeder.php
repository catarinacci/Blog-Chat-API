<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reaction;
use App\Models\ReactionMorph;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReactionMorph::factory(20)->create();

    }
}
