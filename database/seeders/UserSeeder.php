<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'lastname' => 'Adewale',
            'firstname' => 'Samuel',
            'email' => 'samuel.adewale@epistrophe.ci',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
