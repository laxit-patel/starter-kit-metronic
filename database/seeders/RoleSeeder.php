<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info("Creating Roles");

        // By default admin will inherit all the permissions
        $superRole = Role::create(['name' => 'super-admin']);
        $superRole->givePermissionTo(Permission::all());
        $this->command->comment("Super Admin");

        // Create Admin Role Without Delete Permission
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'user-view',
        ]);
        $this->command->comment("Admin");
    }
}
