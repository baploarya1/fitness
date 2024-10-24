<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded=[];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nomor_transaksi', 'like', '%' . $search . '%')
                        ->orWhere('tanggal_transaksi', 'like', '%' . $search . '%')
                        ->orWhere('no_kartu', 'like', '%' . $search . '%');
        });

        
    }
   
    public function member()
    {
        return $this->belongsTo(Member::class, 'nomor_member' );  
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'kode_paket', 'kode_paket');  
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');  
    }
}
