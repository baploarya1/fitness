<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pembayaran')->insert([
            'kode_pembayaran' => "PAY0001",
            'nama_pembayaran' => "QRIS",
            'type' => "a",
        ]);
        DB::table('pembayaran')->insert([
            'kode_pembayaran' => "PAY0002",
            'nama_pembayaran' => "CREDIT CARD",
            'type' => "a",
        ]);
        DB::table('pembayaran')->insert([
            'kode_pembayaran' => "PAY0003",
            'nama_pembayaran' => "DEBIT CARD",
            'type' => "a",
        ]);
        DB::table('pembayaran')->insert([
            'kode_pembayaran' => "PAY0004",
            'nama_pembayaran' => "CASH",
            'type' => "a",
        ]);
        
    }
}
