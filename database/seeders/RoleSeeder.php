<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrateur',
            'slug' => 'admin',
            'permissions' => json_encode(["update-projects","create-users","delete-projects","view-any-projects", "view-any-permissions","delete-users", "view-any-users","update-users","delete-comments","create-projects","update-comments","view-any-comments","create-comments","delete-collected-data","update-collected-data","create-collected-data","view-any-collected-data","delete-project-members","update-project-members","view-any-project-members","create-roles","view-any-roles","update-roles","delete-roles","create-activities","view-any-activities","update-activities","delete-activities","create-indicators","view-any-indicators","create-project-members","update-indicators","delete-disaggregations","update-disaggregations","view-any-disaggregations","delete-indicators","create-disaggregations", "delete-indicator-disaggregations","update-indicator-disaggregations","view-any-indicator-disaggregations","create-indicator-disaggregations"])
        ]);
    }
}
