<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $table = 'mutasi';

    protected $fillable = [
        'kode_aksesoris',
        'nomor_transaksi',
        'keterangan',
        'harga',
        'satuan',
        'jenis',
        'qty_satuan_kecil',
        'tanggal_transaksi',
        'type',
        'username',
        'user_id',
    ];
}
