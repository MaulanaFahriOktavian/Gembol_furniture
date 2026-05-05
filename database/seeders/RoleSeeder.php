<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $customerRole = Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'web']);

        $permissions = [
            'view products', 'create products', 'edit products', 'delete products',
            'view orders', 'manage orders', 'view users', 'manage users'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $adminRole->givePermissionTo(Permission::all());

        $admin = User::firstOrCreate(
            ['email' => 'admin@voktastyle.id'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );
        $admin->syncRoles(['admin']);

        $this->command->info('✅ Roles & admin user berhasil di-seed!');
    }
}