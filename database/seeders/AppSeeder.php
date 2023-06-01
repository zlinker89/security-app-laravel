<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\User;
use Database\Factories\AppFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tenant\Tenant::all()->runForEach(function () {
            // App::factory(10)->create();
            // User::factory(10)->create();
            $role = Role::create([
                'guard_name' => 'api',
                'name' => 'Admin'
            ]);
            $permission = Permission::create([
                'guard_name' => 'api',
                'name' => 'edit users',
                'tenant_id' => 'foo',
                'module_id' => 1,
                'app_id' => 1
            ]);
            $role->givePermissionTo($permission);
            $permission->assignRole($role);
        });
    }
}
