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
                'name' => 'Type_Categories'
            ],
            [
                'module_id' => '2',
                'name' => 'Search'
            ],
            [
                'module_id' => '3',
                'name' => 'Type_Tags'
            ],
            [
                'module_id' => '3',
                'name' => 'Add_Tag_Note'
            ],
            [
                'module_id' => '3',
                'name' => 'Search'
            ],

            [
                'module_id' => '4',
                'name' => 'All_Notes'
            ],
            [
                'module_id' => '4',
                'name' => 'Create_Note'
            ],
            [
                'module_id' => '4',
                'name' => 'Select_Note'
            ],
            [
                'module_id' => '4',
                'name' => 'Update_Note'
            ],
            [
                'module_id' => '4',
                'name' => 'Delete_Note'
            ],
            [
                'module_id' => '4',
                'name' => 'Search_Notes'
            ],
            [
                'module_id' => '4',
                'name' => 'My_Notes'
            ],
            [
                'module_id' => '5',
                'name' => 'Create_Comment'
            ],
            [
                'module_id' => '5',
                'name' => 'Delete_Comment'
            ],
            [
                'module_id' => '6',
                'name' => 'To_Note'
            ],
            [
                'module_id' => '6',
                'name' => 'To_Comment'
            ],
            [
                'module_id' => '6',
                'name' => 'Delete_Reaction'
            ],
            [
                'module_id' => '6',
                'name' => 'Type_Reaction'
            ],
            [
                'module_id' => '7',
                'name' => 'My_Notifications'
            ],
            [
                'module_id' => '7',
                'name' => 'Unread'
            ],
            [
                'module_id' => '7',
                'name' => 'Read'
            ],
            [
                'module_id' => '7',
                'name' => 'Mask_As_Read'
            ],
        ];

        foreach($methods as $method){
            Method::create($method);
        }
    }
}
