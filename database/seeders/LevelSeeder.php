<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::factory(3)->create(['name' => 'Oro']);
        Level::factory(3)->create(['name' => 'Plata']);
        Level::factory(3)->create(['name' => 'Bronce']);
    }
}
