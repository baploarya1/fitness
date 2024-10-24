<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $suppliers = [
            [
                'kode_supplier' => 'S001',
                'nama_supplier' => 'Supplier A',
                'alamat' => 'Jl. Raya No. 1, Jakarta',
                'no_hp' => '081234567890',
                'nama_kontak' => 'Budi',
            ],
            [
                'kode_supplier' => 'S002',
                'nama_supplier' => 'Supplier B',
                'alamat' => 'Jl. Raya No. 2, Bandung',
                'no_hp' => '081234567891',
                'nama_kontak' => 'Andi',
            ],
            [
                'kode_supplier' => 'S003',
                'nama_supplier' => 'Supplier C',
                'alamat' => 'Jl. Raya No. 3, Surabaya',
                'no_hp' => '081234567892',
                'nama_kontak' => 'Siti',
            ],
            [
                'kode_supplier' => 'S004',
                'nama_supplier' => 'Supplier D',
                'alamat' => 'Jl. Raya No. 4, Yogyakarta',
                'no_hp' => '081234567893',
                'nama_kontak' => 'Rina',
            ],
            [
                'kode_supplier' => 'S005',
                'nama_supplier' => 'Supplier E',
                'alamat' => 'Jl. Raya No. 5, Medan',
                'no_hp' => '081234567894',
                'nama_kontak' => 'Joko',
            ],
        ];

        // Menyimpan data ke dalam tabel supplier
        DB::table('supplier')->insert($suppliers);
    }
}
