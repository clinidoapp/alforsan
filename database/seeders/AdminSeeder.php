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
        //Dev Permissions Category
        $developerPermissionCategory = [
            ['name' => 'Developers Management', 'slug' => 'developers_management'],
        ];
        foreach ($developerPermissionCategory as $category) {
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

        //Dev Permissions
        $developerPermissions = [
            /*** developers Management ***/
            ['name' => 'View_Page', 'slug' => 'view_page', 'category_slug' => 'developers_management'],
            ['name' => 'Clear Cache', 'slug' => 'clear_cache', 'category_slug' => 'developers_management'],
            ['name' => 'Clear Config',   'slug' => 'clear_config',   'category_slug' => 'developers_management'],
            ['name' => 'Run Seeder', 'slug' => 'run_seeder', 'category_slug' => 'developers_management'],
            ['name' => 'Clear View', 'slug' => 'clear_view', 'category_slug' => 'developers_management'],
            ['name' => 'Clear Route', 'slug' => 'clear_route', 'category_slug' => 'developers_management'],
            ['name' => 'Clear Optimize', 'slug' => 'clear_optimize', 'category_slug' => 'developers_management'],

        ];
        $devCategories = DB::table('permission_categories')
            ->pluck('id', 'slug');

        //Dev Permissions IDs
        $dev_permissionIds = [];
        foreach ($developerPermissions as $permission) {

            DB::table('permissions')->updateOrInsert(
                ['slug' => $permission['slug']],
                [
                    'name'        => $permission['name'],
                    'slug'        => $permission['slug'],
                    'category_id' => $devCategories[$permission['category_slug']],
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );

            $dev_permissionIds[] = DB::table('permissions')
                ->where('slug', $permission['slug'])
                ->value('id');
        }
        //Dev Role
        DB::table('roles')->updateOrInsert(
            ['slug' => 'developer'],
            [
                'name'       => 'Developer',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
        $developerRoleId = DB::table('roles')
            ->where('slug', 'developer')
            ->value('id');

        // Dev Permission To the Role
        foreach ($dev_permissionIds as $permissionId) {
            DB::table('role_permissions')->updateOrInsert(
                [
                    'role_id'       => $developerRoleId,
                    'permission_id' => $permissionId,
                ],
                [
                    'created_at' => now(),
                ]
            );
        }
        // Dev User
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@clinido.com'],
            [
                'name'              => 'Clinido_Dev',
                'email_verified_at' => now(),
                'password'          => Hash::make('t&2zzcH8cli@'),
                'updated_at'        => now(),
                'created_at'        => now(),
            ]
        );
        $developerUserId = DB::table('users')
            ->where('email', 'admin@clinido.com')
            ->value('id');
        DB::table('user_role')->updateOrInsert(
            [
                'user_id' => $developerUserId,
                'role_id' => $developerRoleId,
            ],
            [
                'created_at' => now(),
            ]
        );






        //Admin Permissions Categories
        $categories = [
            ['name' => 'Booking Requests Management', 'slug' => 'booking_requests_management'],

            ['name' => 'Doctor Management', 'slug' => 'doctor_management'],

            ['name' => 'Doctor Media Management', 'slug' => 'doctor_media_management'],

            ['name' => 'Services Management', 'slug' => 'services_management'],

            ['name' => 'Booking Services Management', 'slug' => 'booking_services_management'],

            ['name' => 'Settings Management', 'slug' => 'settings_management'],

            ['name' => 'Admin Management', 'slug' => 'admin_management'],

            ['name' => 'Role Management', 'slug' => 'role_management'],

            //['name' => 'Permission Management', 'slug' => 'permission_management'],
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

        $categories = DB::table('permission_categories')->whereNot('slug', 'developers_management')->get()
            ->pluck('id', 'slug');


        //Admin Permissions

        $permissions = [

            /*** Booking Requests Management ***/
            ['name' => 'Read Booking Request',   'slug' => 'read_booking_request',   'category_slug' => 'booking_requests_management'],

            /*** Doctor Management ***/
            ['name' => 'Create Doctor', 'slug' => 'create_doctor', 'category_slug' => 'doctor_management'],
            ['name' => 'Read Doctor',   'slug' => 'read_doctor',   'category_slug' => 'doctor_management'],
            ['name' => 'Update Doctor', 'slug' => 'update_doctor', 'category_slug' => 'doctor_management'],
            ['name' => 'Delete Doctor', 'slug' => 'delete_doctor', 'category_slug' => 'doctor_management'],

            /*** Doctor Media Management ***/
            ['name' => 'Create Doctor Media', 'slug' => 'create_doctor_media', 'category_slug' => 'doctor_media_management'],
            ['name' => 'Read Doctor Media',   'slug' => 'read_doctor_media',   'category_slug' => 'doctor_media_management'],
            ['name' => 'Update Doctor Media', 'slug' => 'update_doctor_media', 'category_slug' => 'doctor_media_management'],
            ['name' => 'Delete Doctor Media', 'slug' => 'delete_doctor_media', 'category_slug' => 'doctor_media_management'],

            /*** Services Management ***/
            ['name' => 'Create Service', 'slug' => 'create_service', 'category_slug' => 'services_management'],
            ['name' => 'Read Service',   'slug' => 'read_service',   'category_slug' => 'services_management'],
            ['name' => 'Update Service', 'slug' => 'update_service', 'category_slug' => 'services_management'],
            ['name' => 'Delete Service', 'slug' => 'delete_service', 'category_slug' => 'services_management'],

            /*** Booking Services Management ***/
            ['name' => 'Create Booking Service', 'slug' => 'create_booking_service', 'category_slug' => 'booking_services_management'],
            ['name' => 'Read Booking Service',   'slug' => 'read_booking_service',   'category_slug' => 'booking_services_management'],
            ['name' => 'Update Booking Service', 'slug' => 'update_booking_service', 'category_slug' => 'booking_services_management'],
            ['name' => 'Delete Booking Service', 'slug' => 'delete_booking_service', 'category_slug' => 'booking_services_management'],

            /*** Settings Management ***/
            ['name' => 'Read Settings',   'slug' => 'read_settings',   'category_slug' => 'settings_management'],
            ['name' => 'Update Settings', 'slug' => 'update_settings', 'category_slug' => 'settings_management'],

            /*** Admin Management ***/
            ['name' => 'Create Admin', 'slug' => 'create_admin', 'category_slug' => 'admin_management'],
            ['name' => 'Read Admin',   'slug' => 'read_admin',   'category_slug' => 'admin_management'],
            ['name' => 'Update Admin', 'slug' => 'update_admin', 'category_slug' => 'admin_management'],
            ['name' => 'Delete Admin', 'slug' => 'delete_admin', 'category_slug' => 'admin_management'],

            /*** Role Management ***/
            ['name' => 'Create Role', 'slug' => 'create_role', 'category_slug' => 'role_management'],
            ['name' => 'Read Role',   'slug' => 'read_role',   'category_slug' => 'role_management'],
            ['name' => 'Update Role', 'slug' => 'update_role', 'category_slug' => 'role_management'],
            ['name' => 'Delete Role', 'slug' => 'delete_role', 'category_slug' => 'role_management'],


            /*** Permission Management ***/
            /*
            ['name' => 'Create Permission', 'slug' => 'create_permission', 'category_slug' => 'permission_management'],
            ['name' => 'Read Permission',   'slug' => 'read_permission',   'category_slug' => 'permission_management'],
            ['name' => 'Update Permission', 'slug' => 'update_permission', 'category_slug' => 'permission_management'],
            ['name' => 'Delete Permission', 'slug' => 'delete_permission', 'category_slug' => 'permission_management'],
            */
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

        /*DB::table('roles')->updateOrInsert(
            ['slug' => 'developer'],
            [
                'name'       => 'Developer',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        $developerRoleId = DB::table('roles')
            ->where('slug', 'developer')
            ->value('id');*/

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
            DB::table('role_permissions')->updateOrInsert(
                [
                    'role_id'       => $developerRoleId,
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
