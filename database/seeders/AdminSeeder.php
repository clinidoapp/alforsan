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

        $categories = [
            ['name' => 'Admin Management', 'slug' => 'admin_management'],
            ['name' => 'Permission Management', 'slug' => 'permission_management'],
            ['name' => 'Role Management', 'slug' => 'role_management'],
            ['name' => 'Doctor Management', 'slug' => 'doctor_management'],
            ['name' => 'Settings Management', 'slug' => 'settings_management'],
            ['name' => 'Booking Requests Management', 'slug' => 'booking_requests'],
        ];
        foreach ($categories as $category) {

            DB::table('permission_categories')->updateOrInsert(
                ['slug' => $category['slug']],
                [
                    'name'       => $category['name'],
                    'slug'       => $category['slug'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

        }

        $categories = DB::table('permission_categories')
            ->pluck('id', 'slug');

        $permissions = [
            /*** Doctor Management ***/
            ['name' => 'Create Doctor', 'slug' => 'create_doctor', 'category_slug' => 'doctor_management'],
            ['name' => 'Read Doctor',   'slug' => 'read_doctor',   'category_slug' => 'doctor_management'],
            ['name' => 'Update Doctor', 'slug' => 'update_doctor', 'category_slug' => 'doctor_management'],
            ['name' => 'Delete Doctor', 'slug' => 'delete_doctor', 'category_slug' => 'doctor_management'],

            /*** Permission Management ***/
            ['name' => 'Create Permission', 'slug' => 'create_permission', 'category_slug' => 'permission_management'],
            ['name' => 'Read Permission',   'slug' => 'read_permission',   'category_slug' => 'permission_management'],
            ['name' => 'Update Permission', 'slug' => 'update_permission', 'category_slug' => 'permission_management'],
            ['name' => 'Delete Permission', 'slug' => 'delete_permission', 'category_slug' => 'permission_management'],

            /*** Role Management ***/
            ['name' => 'Create Role', 'slug' => 'create_role', 'category_slug' => 'role_management'],
            ['name' => 'Read Role',   'slug' => 'read_role',   'category_slug' => 'role_management'],
            ['name' => 'Update Role', 'slug' => 'update_role', 'category_slug' => 'role_management'],
            ['name' => 'Delete Role', 'slug' => 'delete_role', 'category_slug' => 'role_management'],

            /*** Admin Management ***/
            ['name' => 'Create Admin', 'slug' => 'create_admin', 'category_slug' => 'admin_management'],
            ['name' => 'Read Admin',   'slug' => 'read_admin',   'category_slug' => 'admin_management'],
            ['name' => 'Update Admin', 'slug' => 'update_admin', 'category_slug' => 'admin_management'],
            ['name' => 'Delete Admin', 'slug' => 'delete_admin', 'category_slug' => 'admin_management'],

            /*** Settings Management ***/
            ['name' => 'Read Settings',   'slug' => 'read_settings',   'category_slug' => 'settings_management'],
            ['name' => 'Update Settings', 'slug' => 'update_settings', 'category_slug' => 'settings_management'],

            /*** Booking Requests Management ***/
            ['name' => 'Read Booking Request',   'slug' => 'read_booking_request',   'category_slug' => 'booking_requests'],

        ];

        $permissionIds = [];
        foreach ($permissions as $permission) {

            DB::table('permissions')->updateOrInsert(
                ['slug' => $permission['slug']],
                [
                    'name'        => $permission['name'],
                    'slug'        => $permission['slug'],
                    'category_id' => $categories[$permission['category_slug']],
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
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
