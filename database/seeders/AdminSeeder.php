<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin
        $superId = Str::uuid()->toString(); // Re-use for role assignment
        DB::table('users')->insert([
            'id' => $superId,
            'name' => 'super admin',
            'email' => 'superadmin@mail.com',
            'is_admin' => '1',
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Assign super-admin Role
        $superAdmin = User::where('id',$superId)->first();
        $superAdmin->assignRole('super-admin');

        //create sub admin
        $id = Str::uuid()->toString(); // Re-use for role assignment
        DB::table('users')->insert([
            'id' => $id,
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'is_admin' => '1',
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Assign super-admin Role
        $admin = User::where('id',$id)->first();
        $admin->assignRole('admin');

    }
}
