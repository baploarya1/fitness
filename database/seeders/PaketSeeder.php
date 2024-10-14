<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('paket')->insert([
            'kode_paket' => "CO0001",
            'nama_paket' => "COMPANY 3 MONTHS",
            'kategori' => "COMPANY",
            'type' => "a",
            'harga_paket' => 5000000.00,
            'type' => "a",
        ]);
        DB::table('paket')->insert([
            'kode_paket' => "CO0002",
            'nama_paket' => "COMPANY 6 MONTHS",
            'harga_paket' => 6000000.00,
            'type' => "a",
        ]);
        DB::table('paket')->insert([
            'kode_paket' => "CO0003",
            'nama_paket' => "COMPANY 12 MONTHS",
            'harga_paket' => 7000000.00,
            'type' => "a",
        ]);
        DB::table('paket')->insert([
            'kode_paket' => "FA0001",
            'nama_paket' => "FAMILY 1 MONTHS",
            'harga_paket' => 7000000.00,
            'type' => "a",
        ]);
        DB::table('paket')->insert([
            'kode_paket' => "CHI0001",
            'nama_paket' => "CHILDREN 1 MONTHS",
            'harga_paket' => 200000.00,
            'type' => "a",
        ]);
        DB::table('paket')->insert([
            'kode_paket' => "CHI0002",
            'nama_paket' => "CHILDREN 3 MONTHS",
            'harga_paket' => 400000.00,
            'type' => "a",
        ]);
        DB::table('paket')->insert([
            'kode_paket' => "CHI0003",
            'nama_paket' => "CHILDREN 6 MONTHS",
            'harga_paket' => 800000.00,
            'type' => "a",
        ]);
        DB::table('paket')->insert([
            'kode_paket' => "CHI0004",
            'nama_paket' => "CHILDREN 12 MONTHS",
            'harga_paket' => 1200000.00,
            'type' => "a",
        ]);
    }
}
