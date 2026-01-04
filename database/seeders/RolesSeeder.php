<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  \App\Role::updateOrCreate(['name' => 'client']);
\App\Role::updateOrCreate(['name' => 'employee']);
\App\Role::updateOrCreate(['name' => 'admin']);

    }
}
