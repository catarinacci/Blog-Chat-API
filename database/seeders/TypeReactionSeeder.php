<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeReaction;

class TypeReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typereaction = new TypeReaction();
        $typereaction->name = 'Me gusta';
        $typereaction->save();

        $typereaction = new TypeReaction();
        $typereaction->name = 'No me gusta';
        $typereaction->save();

        $typereaction = new TypeReaction();
        $typereaction->name = 'Me divierte';
        $typereaction->save();

        $typereaction = new TypeReaction();
        $typereaction->name = 'Me enoja';
        $typereaction->save();
    }
}
