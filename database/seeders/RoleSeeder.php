<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to truncate the table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the roles and related tables to reset the auto-increment ID
        DB::table('model_has_roles')->truncate();  // Clear pivot table
        DB::table('roles')->truncate();
        DB::table('users')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'client']);

        // Create a Admin user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@italianosforever.com',
            'password' => Hash::make('admin'), // Use Hash facade for password hashing
        ]);

        // Assign role 'admin' to the user
        $user->assignRole('admin');

        // Create a Client user
        $user = User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('cliente'), // Use Hash facade for password hashing
        ]);

        // Assign role 'cliente' to the user
        $user->assignRole('client');
    }
}
