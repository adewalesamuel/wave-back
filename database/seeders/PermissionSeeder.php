<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'Create Users',
                'slug' => 'create-users',
                'created_at' => date('Y-m-d H:i:s')
                ],
                [
                'name' => 'Update Users',
                'slug' => 'update-users',
                'created_at' => date('Y-m-d H:i:s')
                ],
                [
                'name' => 'Delete Users',
                'slug' => 'delete-users',
                'created_at' => date('Y-m-d H:i:s')
                ],
                [
                'name' => 'Create Roles',
                'slug' => 'create-role',
                'created_at' => date('Y-m-d H:i:s')
                ],
                [
                'name' => 'List Users',
                'slug' => 'list-users',
                'created_at' => date('Y-m-d H:i:s')
                ]
        ]
        );
    }
}
