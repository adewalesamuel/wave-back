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
                'name' => 'Create Projects',
                'slug' => 'create-projects',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Projects',
                'slug' => 'view-any-projects',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Projects',
                'slug' => 'update-projects',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Projects',
                'slug' => 'delete-projects',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Users',
                'slug' => 'create-users',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Users',
                'slug' => 'view-any-users',
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
                'slug' => 'create-roles',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Roles',
                'slug' => 'view-any-roles',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Roles',
                'slug' => 'update-roles',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Roles',
                'slug' => 'delete-roles',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Activities',
                'slug' => 'create-activities',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Activities',
                'slug' => 'view-any-activities',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Activities',
                'slug' => 'update-activities',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Activities',
                'slug' => 'delete-activities',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Indicators',
                'slug' => 'create-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Indicators',
                'slug' => 'view-any-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Indicators',
                'slug' => 'update-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Indicators',
                'slug' => 'delete-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Disagregations',
                'slug' => 'create-disagregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Disagregations',
                'slug' => 'view-any-disagregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Disagregations',
                'slug' => 'update-disagregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Disagregations',
                'slug' => 'delete-disagregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Project Members',
                'slug' => 'create-project-members',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Project Members',
                'slug' => 'view-any-project-members',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Project Members',
                'slug' => 'update-project-members',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Project Members',
                'slug' => 'delete-project-members',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Collected Data',
                'slug' => 'create-collected-data',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Collected Data',
                'slug' => 'view-any-collected-data',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Collected Data',
                'slug' => 'update-collected-data',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Collected Data',
                'slug' => 'delete-collected-data',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Comment',
                'slug' => 'create-comment',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Comment',
                'slug' => 'view-any-comment',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Comment',
                'slug' => 'update-comment',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Comment',
                'slug' => 'delete-comment',
                'created_at' => date('Y-m-d H:i:s') 
              
              ]              
        ]
        );
    }
}
