<?php

namespace Database\Seeders;

use App\Models\ReactionMorph;
use Illuminate\Database\Seeder;

class ReactionMorphSeeder extends Seeder
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
