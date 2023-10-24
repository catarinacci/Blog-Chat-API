<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'BackEnd',

            ],
            [
                'name' => 'FrontEnd',
            ],
            [
                'name' => 'Desing web',

            ],
            [
                'name' => 'Database',

            ],
            [
                'name' => 'Testing',

            ],

        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
