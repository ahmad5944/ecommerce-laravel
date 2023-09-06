<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     [
        //         'id' => 1,
        //         'name' => 'admin',
        //         'guard_name' => 'web',
        //         'created_at' => '2023-09-03 13:49:24',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'user',
        //         'guard_name' => 'web',
        //         'created_at' => '2023-09-03 13:49:24',
        //     ],
        // ];
        // Role::insert($data);

        $admin = Role::create([
            'id' => 1,
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => '2023-09-03 13:49:24',
        ]);

        $admin->syncPermissions(
            ["1","2","3","4","5","6","7","8","9","10","11",
            "12","13","14","15","16","17","18","19","20","21",
            "22","23","24","25","26"]
        );

        $user = Role::create([
            'id' => 2,
            'name' => 'user',
            'guard_name' => 'web',
            'created_at' => '2023-09-03 13:49:24',
        ]);
        
        $user->syncPermissions(['26']);

    }
}
