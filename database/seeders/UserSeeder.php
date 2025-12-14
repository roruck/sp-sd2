<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $employeeRole = Role::where('slug', 'employee')->first();

        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => Hash::make('password'),
            ]
        );

        $employee = User::updateOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Employee User',
                'first_name' => 'Employee',
                'last_name' => 'User',
                'password' => Hash::make('password'),
            ]
        );

        if ($adminRole) {
            $admin->roles()->syncWithoutDetaching([$adminRole->id]);
        }

        if ($employeeRole) {
            $employee->roles()->syncWithoutDetaching([$employeeRole->id]);
        }
    }
}
