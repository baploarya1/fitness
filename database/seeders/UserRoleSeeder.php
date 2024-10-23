<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('name', 'ADMIN')->firstOrFail();;
        $user->assignRole('Admin');
        $user2 = User::where('name', 'ARYA')->firstOrFail();;
        $user2->assignRole('Operator');

    }
}
