<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // role
            'index-role',
            'view-role',
            'create-role',
            'edit-role',
            'delete-role',
            // student
            'index-student',
            'view-student',
            'create-student',
            'edit-student',
            'delete-student',
            'export-student',
            // trainer
            'index-trainer',
            'view-trainer',
            'create-trainer',
            'edit-trainer',
            'delete-trainer',
            'export-trainer',
            // cohort & cohort category
            'index-cohort',
            'view-cohort',
            'create-cohort',
            'edit-cohort',
            'delete-cohort',
            'export-cohort',
            // skills
            'index-skill',
            'view-skill',
            'create-skill',
            'edit-skill',
            'delete-skill',
            'export-skill',
            // brief
            'index-brief',
            'view-brief',
            'create-brief',
            'edit-brief',
            'delete-brief',
            'export-brief',
            // tags
            'index-tag',
            'view-tag',
            'create-tag',
            'edit-tag',
            'delete-tag',
            'export-tag',
            // competency
            'index-competency',
            'view-competency',
            'create-competency',
            'edit-competency',
            'delete-competency',
            'export-competency',
            // assessment
            'index-assessment',
            'view-assessment',
            'create-assessment',
            'edit-assessment',
            'delete-assessment',
            'export-assessment',
            // user_assessment_details
            'index-user_assessment_details',
            'view-user_assessment_details',
            'create-user_assessment_details',
            'edit-user_assessment_details',
            'delete-user_assessment_details',
            'export-user_assessment_details',
         ];

          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'api']);
          }

          $rolesWithPermissions = [
            'admin' => $permissions, // Admin gets all permissions

            'trainer' => [
                // Student
                'index-student', 'view-student', 'create-student', 'edit-student', 'delete-student', 'export-student',

                // Cohort
                'index-cohort', 'view-cohort', 'create-cohort', 'edit-cohort', 'delete-cohort', 'export-cohort',

                // Skills
                'index-skill', 'view-skill', 'create-skill', 'edit-skill', 'delete-skill', 'export-skill',

                // Brief
                'index-brief', 'view-brief', 'create-brief', 'edit-brief', 'delete-brief', 'export-brief',

                // Tags
                'index-tag', 'view-tag', 'create-tag', 'edit-tag', 'delete-tag', 'export-tag',

                // Competency
                'index-competency', 'view-competency', 'create-competency', 'edit-competency', 'delete-competency', 'export-competency',

                // Assessment
                'index-assessment', 'view-assessment', 'create-assessment', 'edit-assessment', 'delete-assessment', 'export-assessment',

                 // user_assessment_details
                'index-user-assessment-details', 'view-user-assessment-details', 'create-user-assessment-details', 'edit-user-assessment-details', 'delete-user-assessment-details', 'export-user-assessment-details',
            ],

            'student' => [
                // Assessment
                'index-assessment', 'view-assessment',
                // user_assessment_details
                'view-user-assessment-details', 'create-user-assessment-details', 'edit-user-assessment-details',
                // Brief
                'index-brief', 'view-brief',
            ],
        ];


        foreach ($rolesWithPermissions as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            foreach ($permissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
                $role->givePermissionTo($permission);
            }
        }

        $this->command->info('Roles and permissions seeded successfully.');
    }
}
