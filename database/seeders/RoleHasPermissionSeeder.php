<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleHasPermission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'permission_id' => 21,
                'role_id' => 1,
            ],
            [
                'permission_id' => 22,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 23,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 24,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 25,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 26,
                'role_id' => 1,
            ],         
            [
                'permission_id' => 26,
                'role_id' => 2,
            ],   
            [
                'permission_id' => 27,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 28,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 29,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 30,
                'role_id' => 1,
            ],            
            [
                'permission_id' => 31,
                'role_id' => 1,
            ],
            [
                'permission_id' => 32,
                'role_id' => 1,
            ],
            [
                'permission_id' => 33,
                'role_id' => 1,
            ],
            [
                'permission_id' => 34,
                'role_id' => 1,
            ],

            [
                'permission_id' => 35,
                'role_id' => 1,
            ],

            [
                'permission_id' => 36,
                'role_id' => 1,
            ],
            [
                'permission_id' => 37,
                'role_id' => 1,
            ],
            [
                'permission_id' => 38,
                'role_id' => 1,
            ],
            [
                'permission_id' => 39,
                'role_id' => 1,
            ],
            [
                'permission_id' => 40,
                'role_id' => 1,
            ],            [
                'permission_id' => 41,
                'role_id' => 1,
            ],

            [
                'permission_id' => 42,
                'role_id' => 1,
            ],
            [
                'permission_id' => 43,
                'role_id' => 1,
            ],
            [
                'permission_id' => 44,
                'role_id' => 1,
            ],
        ];
        RoleHasPermission::insert($data);
    }
}
