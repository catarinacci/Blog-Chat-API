<?php

namespace Database\Seeders;

use App\Models\Reactionm;
use Illuminate\Database\Seeder;

class ReactionmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reactionm::factory(50)->create();
    }
}
