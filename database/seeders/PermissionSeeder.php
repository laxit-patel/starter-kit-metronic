<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // User
        Permission::create(['name' => 'user-view']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-delete']);
        Permission::create(['name' => 'user-profile']);
        Permission::create(['name' => 'user-update']);

        // Permission
        Permission::create(['name' => 'permission-view']);

        // Role
        Permission::create(['name' => 'role-view']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-update']);
        Permission::create(['name' => 'role-delete']);

        // Student
        Permission::create(['name' => 'student-view']);
        Permission::create(['name' => 'student-create']);
        Permission::create(['name' => 'student-profile']);
        Permission::create(['name' => 'student-update']);
        Permission::create(['name' => 'student-delete']);
        Permission::create(['name' => 'student-update-name']);
        Permission::create(['name' => 'student-update-email']);

        // Course
        Permission::create(['name' => 'course-view']);
        Permission::create(['name' => 'course-create']);
        Permission::create(['name' => 'course-update']);
        Permission::create(['name' => 'course-delete']);
        
        // Batch
        Permission::create(['name' => 'batch-view']);
        Permission::create(['name' => 'batch-create']);
        Permission::create(['name' => 'batch-update']);
        Permission::create(['name' => 'batch-delete']);

        // Subject
        Permission::create(['name' => 'subject-view']);
        Permission::create(['name' => 'subject-create']);
        Permission::create(['name' => 'subject-update']);
        Permission::create(['name' => 'subject-delete']);

        // Lesson
        Permission::create(['name' => 'lesson-view']);
        Permission::create(['name' => 'lesson-create']);
        Permission::create(['name' => 'lesson-update']);
        Permission::create(['name' => 'lesson-delete']);

        // Question Types
        Permission::create(['name' => 'question-type-view']);
        Permission::create(['name' => 'question-type-create']);
        Permission::create(['name' => 'question-type-update']);
        Permission::create(['name' => 'question-type-delete']);

        // Question
        Permission::create(['name' => 'question-view']);
        Permission::create(['name' => 'question-create']);
        Permission::create(['name' => 'question-update']);
        Permission::create(['name' => 'question-delete']);
    }
}
