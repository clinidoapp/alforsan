<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            /*** Doctor Management ***/
            ['name' => 'Create Doctor', 'slug' => 'create_doctor', 'category' => 'Doctor Management'],
            ['name' => 'Read Doctor', 'slug' => 'read_doctor', 'category' => 'Doctor Management'],
            ['name' => 'Update Doctor', 'slug' => 'update_doctor', 'category' => 'Doctor Management'],
            ['name' => 'Delete Doctor', 'slug' => 'delete_doctor', 'category' => 'Doctor Management'],
            /*** Permission Management ***/
            ['name' => 'Create Permission', 'slug' => 'create_permission', 'category' => 'Permission Management'],
            ['name' => 'Read Permission', 'slug' => 'read_permission', 'category' => 'Permission Management'],
            ['name' => 'Update Permission', 'slug' => 'update_permission', 'category' => 'Permission Management'],
            ['name' => 'Delete Permission', 'slug' => 'delete_permission', 'category' => 'Permission Management'],

        ];
        $permissionIds = [];
        foreach ($permissions as $permission) {
            DB::table('permissions')->updateOrInsert(
                ['slug' => $permission['slug']],
                array_merge($permission, [
                    'updated_at' => now(),
                    'created_at' => now(),
                ])
            );

            $permissionIds[] = DB::table('permissions')
                ->where('slug', $permission['slug'])
                ->value('id');
        }


        DB::table('roles')->updateOrInsert(
            ['slug' => 'admin'],
            [
                'name'       => 'Admin',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        $roleId = DB::table('roles')
            ->where('slug', 'admin')
            ->value('id');

        foreach ($permissionIds as $permissionId) {
            DB::table('role_permissions')->updateOrInsert(
                [
                    'role_id'       => $roleId,
                    'permission_id' => $permissionId,
                ],
                [
                    'created_at' => now(),
                ]
            );
        }

        DB::table('users')->updateOrInsert(
            ['email' => 'admin@example.com'],
            [
                'name'              => 'Administrator',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'updated_at'        => now(),
                'created_at'        => now(),
            ]
        );

        $userId = DB::table('users')
            ->where('email', 'admin@example.com')
            ->value('id');

        DB::table('user_role')->updateOrInsert(
            [
                'user_id' => $userId,
                'role_id' => $roleId,
            ],
            [
                'created_at' => now(),
            ]
        );

    }
}
