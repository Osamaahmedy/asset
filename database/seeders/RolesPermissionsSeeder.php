<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Roles
        $roles = [
            'admin',
            'admin2',
            'normal',
            'user',
            'normal uswe',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }

        // Permissions
        $permissions = [
            'عرض الأصول','إنشاء الأصول','تعديل الأصول','حذف الأصول',
            'عرض الإشعارات','تعديل الإشعارات',
            'عرض المستخدمين','إنشاء مستخدم','تعديل المستخدمين','حذف المستخدمين',
            'عرض الأدوار','إنشاء دور','تعديل الأدوار','حذف الأدوار',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => 'web'
            ]);
        }

        // Attach permissions to admin role (مثال زي dump حقك)
        $admin = Role::where('name', 'admin')->first();
        $admin->syncPermissions(Permission::all());

        // Users
        $users = [
            [
                'name' => 'admin',
                'email' => 'asaam4292@gmail.com',
                'password' => 'password',
                'role' => 'admin'
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => 'password',
                'role' => 'user'
            ]
        ];

        foreach ($users as $u) {
            $user = User::firstOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make($u['password']),
                ]
            );

            $user->assignRole($u['role']);
        }
    }
}
