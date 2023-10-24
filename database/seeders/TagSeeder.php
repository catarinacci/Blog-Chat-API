<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [

                'name' => 'php',
            ],
            [

                'name' => 'laravel',
            ],
            [

                'name' => 'symfony',

            ],
            [

                'name' => 'node',

            ],
            [

                'name' => 'javascript',

            ],
            [

                'name' => 'html',
            ],
            [

                'name' => 'css',
            ],
            [

                'name' => 'angular',
            ],
            [

                'name' => 'react',
            ],
            [

                'name' => 'vue',
            ],
            [

                'name' => 'photo shop',
            ],
            [

                'name' => 'ilustrator',
            ],
            [

                'name' => 'logos',
            ],
            [

                'name' => 'canva',
            ],
            [

                'name' => 'mysql',
            ],
            [

                'name' => 'pgsql',
            ],
            [

                'name' => 'sql',
            ],
            [

                'name' => 'mongo',
            ],
            [

                'name' => 'Selenium',
            ],
            [

                'name' => 'Gatling',
            ],
            [

                'name' => 'Testim',
            ],
            [

                'name' => 'HeadSpin',
            ],
            [

                'name' => 'pyton',
            ],
            [

                'name' => 'java',
            ],


        ];

        foreach($tags as $tag){
            Tag::create($tag);
        }
    }
}
