<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(MemberSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(UserRoleSeeder::class);
        // $this->call(PembayaranSeeder::class);
        $this->call(SupplierSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
