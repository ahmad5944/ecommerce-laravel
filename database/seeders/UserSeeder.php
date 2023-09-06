<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'no_telp' => '0812376',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'id' => 2,
            'email' => 'daffa@gmail.com',
            'role' => 'user',
            'no_telp' => '0812375',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole('user');
    }
}
