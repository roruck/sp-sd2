<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create (or fetch) admin user
        $userId = DB::table('users')->where('email', 'admin@test.com')->value('id');

        if (!$userId) {
            $userId = DB::table('users')->insertGetId([
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
                'first_name' => 'Admin',
                'last_name' => 'User',
            ]);
        }

        // Find admin role id
        $roleId = DB::table('roles')->where('name', 'admin')->value('id');

        // Attach role if not attached
        $exists = DB::table('users_roles')
            ->where('user_id', $userId)
            ->where('role_id', $roleId)
            ->exists();

        if (!$exists) {
            DB::table('users_roles')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }
    }
}
