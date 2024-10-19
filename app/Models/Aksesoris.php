<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksesoris extends Model
{
    use HasFactory;
    protected $table = 'aksesoris';
    protected $fillable = ['kode_aksesoris','nama_aksesoris','stok_awal','stok_akhir','satuan','barang_masuk','harga','type','username','user_id'];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_aksesoris', 'like', '%' . $search . '%')
                        ->orWhere('kode_aksesoris', 'like', '%' . $search . '%')
                        ->orWhere('harga', 'like', '%' . $search . '%');
        });

        
    }
}
