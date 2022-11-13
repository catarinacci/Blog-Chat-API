<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Method;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            [
                'module_id' => '1',
                'name' => 'Register'
            ],
            [
                'module_id' => '1',
                'name' => 'Login'
            ],
            [
                'module_id' => '1',
                'name' => 'Verify_Email'
            ],
            [
                'module_id' => '1',
                'name' => 'Resending_Email_Verification'
            ],
            [
                'module_id' => '1',
                'name' => 'Forgot_Password'
            ],
            [
                'module_id' => '1',
                'name' => 'Logout'
            ],
            [
                'module_id' => '1',
                'name' => 'Profile'
            ],
            [
                'module_id' => '1',
                'name' => 'Update_User'
            ],
            [
                'module_id' => '1',
                'name' => 'Delete_User'
            ],
            [
                'module_id' => '2',
                'name' => 'All_Notes'
            ],
            [
                'module_id' => '2',
                'name' => 'Create_Note'
            ],
            [
                'module_id' => '2',
                'name' => 'Select_Note'
            ],
            [
                'module_id' => '2',
                'name' => 'Update_Note'
            ],
            [
                'module_id' => '2',
                'name' => 'Delete_Note'
            ],
            [
                'module_id' => '2',
                'name' => 'Search_Notes'
            ],
            [
                'module_id' => '2',
                'name' => 'My_Notes'
            ],
            [
                'module_id' => '3',
                'name' => 'Create_Comment'
            ],
            [
                'module_id' => '3',
                'name' => 'Delete_Comment'
            ],
            [
                'module_id' => '4',
                'name' => 'To_Note'
            ],
            [
                'module_id' => '4',
                'name' => 'To_Comment'
            ],
            [
                'module_id' => '4',
                'name' => 'Delete_Reaction'
            ],
            [
                'module_id' => '5',
                'name' => 'My_Notifications'
            ],
            [
                'module_id' => '5',
                'name' => 'Unread'
            ],
            [
                'module_id' => '5',
                'name' => 'Read'
            ],
        ];

        foreach($methods as $method){
            Method::create($method);
        }
    }
}
