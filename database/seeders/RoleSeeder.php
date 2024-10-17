<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $admin =   Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        $operator =   Role::create([
            'name' => 'Operator',
            'guard_name' => 'web'
        ]);
        // Permission::create(['name' => 'lihat-ambil-fasilitas', 'menu' => 'Fasilitas']);
        // Permission::create(['name' => 'tambah-ambil-fasilitas', 'menu' => 'Fasilitas']);
        // Permission::create(['name' => 'edit-ambil-fasilitas', 'menu' => 'Fasilitas']);
        // Permission::create(['name' => 'hapus-ambil-fasilitas', 'menu' => 'Fasilitas']);

        // // Membuat Permission
        // $permission = Permission::create(['name' => 'edit articles']);
    }
}
