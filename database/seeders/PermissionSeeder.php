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
                'name' => 'Create Disaggregations',
                'slug' => 'create-disaggregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Disaggregations',
                'slug' => 'view-any-disaggregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Disaggregations',
                'slug' => 'update-disaggregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Disaggregations',
                'slug' => 'delete-disaggregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Indicator Disaggregations',
                'slug' => 'create-indicator-disaggregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Indicator Disaggregations',
                'slug' => 'view-any-indicator-disaggregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Indicator Disaggregations',
                'slug' => 'update-indicator-disaggregations',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Indicator Disaggregations',
                'slug' => 'delete-indicator-disaggregations',
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
                'slug' => 'create-comments',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Comment',
                'slug' => 'view-any-comments',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Comment',
                'slug' => 'update-comments',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Comment',
                'slug' => 'delete-comments',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Activity Indicators',
                'slug' => 'create-activity-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Activity Indicators',
                'slug' => 'view-any-activity-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Activity Indicators',
                'slug' => 'update-activity-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Activity Indicators',
                'slug' => 'delete-activity-indicators',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Graphs',
                'slug' => 'create-graphs',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Graphs',
                'slug' => 'view-any-graphs',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Graphs',
                'slug' => 'update-graphs',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Graphs',
                'slug' => 'delete-graphs',
                'created_at' => date('Y-m-d H:i:s') 
              
              ], 
              [
                'name' => 'Create Countries',
                'slug' => 'create-countries',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Countries',
                'slug' => 'view-any-countries',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Countries',
                'slug' => 'update-countries',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Countries',
                'slug' => 'delete-countries',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Create Outcomes',
                'slug' => 'create-outcomes',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'View Any Outcomes',
                'slug' => 'view-any-outcomes',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Update Outcomes',
                'slug' => 'update-outcomes',
                'created_at' => date('Y-m-d H:i:s') 
              
              ],
              [
                'name' => 'Delete Outcomes',
                'slug' => 'delete-outcomes',
                'created_at' => date('Y-m-d H:i:s') 
              
              ]         
        ]
        );
    }
}
