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
            'id' => '1',
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        // $admin->assignRole('admin');

        $user = User::create([
            'id' => '2',
            'username' => 'ahmad daffa',
            'email' => 'daffa@gmail.com',
            'password' => bcrypt('123456')
        ]);

        // $user->assignRole('user');
    }
}
