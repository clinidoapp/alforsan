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
            // Doctor Management
            ['name' => 'Create Doctor', 'slug' => 'create_doctor', 'category' => 'Doctor Management'],
            ['name' => 'Read Doctor', 'slug' => 'read_doctor', 'category' => 'Doctor Management'],
            ['name' => 'Update Doctor', 'slug' => 'update_doctor', 'category' => 'Doctor Management'],
            ['name' => 'Delete Doctor', 'slug' => 'delete_doctor', 'category' => 'Doctor Management'],
        ];
        $permissionIds = [];
        foreach ($permissions as $permission) {
            $permissionIds[] = DB::table('permissions')->updateOrInsert(
                ['slug' => $permission['slug']],
                $permission
            );
        }


        $roleId = DB::table('roles')->insertGetId(
            ['slug' => 'admin',
            'name' => 'Admin']
        );

        foreach ($permissionIds as $permissionId) {
            DB::table('role_permission')->updateOrInsert([
                'role_id' => $roleId,
                'permission_id' => $permissionId,
            ]);
        }

        $userId = DB::table('users')->insertGetId(
            [
                'email' => 'admin@example.com',
                'name' => 'Administrator',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
       );

        DB::table('user_role')->updateOrInsert([
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);

    }
}
