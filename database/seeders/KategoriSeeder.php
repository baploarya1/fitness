<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kategori')->insert([
            'kode_kategori' => "CO0001",
            'nama_kategori' => "COMPANY",
             'type' => "a",
            
        ]);
        DB::table('kategori')->insert([
            'kode_kategori' => "CO0002",
            'nama_kategori' => "CHILDREN",
            'type' => "a",
            
        ]);
        DB::table('kategori')->insert([
            'kode_kategori' => "CO0003",
            'nama_kategori' => "INDIVIDUAL",
            'type' => "a",
            
        ]);
        DB::table('kategori')->insert([
            'kode_kategori' => "CO0004",
            'nama_kategori' => "FAMILY",
            'type' => "a",
            
        ]);
        
    }
}
