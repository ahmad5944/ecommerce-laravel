<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelHasRole;

class ModelHasRoleSeeder extends Seeder
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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
