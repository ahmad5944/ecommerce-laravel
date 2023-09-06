<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
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
                'name' => 'user-list',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'user-create',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'user-edit',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'user-delete',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'user-show',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'dashboard-list',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'role-list',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'role-create',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'role-edit',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'role-delete',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'role-show',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'permission-list',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'permission-create',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'permission-edit',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'permission-delete',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'permission-show',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'product-list',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'product-create',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'product-edit',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'product-delete',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'product-show',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'order-list',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'order-create',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'order-edit',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'order-delete',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
            [
                'name' => 'order-show',
                'guard_name' => 'web',
                'created_at' => '2023-09-03 13:49:15',
            ],
        ];
        Permission::insert($data);
    }
}
