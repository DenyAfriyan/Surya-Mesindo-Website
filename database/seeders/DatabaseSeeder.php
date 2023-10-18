<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            SliderSeeder::class,
            AboutSeeder::class,
            CounterSeeder::class,
            MachineSeeder::class,
            SparepartSeeder::class
        ]);
    }
}
