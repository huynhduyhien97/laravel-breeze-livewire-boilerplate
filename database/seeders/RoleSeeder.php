<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** Must have */
        $adminRole = Role::create(['name' => 'admin']);
        $adminPermission = Permission::create(['name' => 'all']);
        $adminRole->givePermissionTo($adminPermission);

        /** Optional */
        $customerRole = Role::create(['name' => 'customer']);
        $customerPermission = Permission::create(['name' => 'some']);
        $customerRole->givePermissionTo($customerPermission);
    }
}
