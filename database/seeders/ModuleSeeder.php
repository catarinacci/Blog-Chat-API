<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name' => 'User',
                'icon' => '<i class="bi bi-person-fill"></i>'
            ],
            [
                'name' => 'Note',
                'icon' => '<i class="bi bi-file-earmark-post-fill"></i>'
            ],
            [
                'name' => 'Comment',
                'icon' => '<i class="bi bi-chat-left-dots-fill"></i>'
            ],
            [
                'name' => 'Reaction',
                'icon' => '<i class="bi bi-hand-thumbs-up-fill"></i>'
            ],
            [
                'name' => 'Notification',
                'icon' => '<i class="bi bi-bell-fill"></i>'
            ],

        ];

        foreach($modules as $module){
            Module::create($module);
        }
    }
}
