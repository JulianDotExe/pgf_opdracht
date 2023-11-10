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
        $permission1 = Permission::create([
            'name' => 'Gebruikers beheren',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $permission2 = Permission::create([
            'name' => 'Collectie beheren',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $permission3 = Permission::create([
            'name' => 'Klantportaal beheren',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign all permissions to the 'admin' role
        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->givePermissionTo([$permission1, $permission2, $permission3]);

        // Assign 'Collectie beheren' permission to the 'user' role
        $userRole = Role::where('name', 'user')->first();
        $userRole->givePermissionTo($permission2);
    }
}
