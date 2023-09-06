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
        $data = [
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 1,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 2,
            ],
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 10,
            ],
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 12,
            ],
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 14,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 7,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 8,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 9,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 10,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 11,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 12,
            ],
        ];
        ModelHasRole::insert($data);
    }
}
