<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';

    protected $fillable = ['faktur', 'kode_barang', 'nama_barang', 'satuan','qty_satuan_besar','qty_satuan_kecil','harga','sub_total','tanggal_penjualan','type','username','user_id',
    ];
    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('faktur', 'like', '%' . $search . '%')
                        ->orWhere('tanggal_penjualan', 'like', '%' . $search . '%');
        });

        
    }
}
