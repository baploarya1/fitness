<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['nomor_member','kode_paket','nomor_transaksi','kode_pembayaran','tanggal_transaksi','keterangan','status','type','username','user_id'];
    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nomor_transaksi', 'like', '%' . $search . '%')
                        ->orWhere('tanggal_transaksi', 'like', '%' . $search . '%')
                        ->orWhere('no_kartu', 'like', '%' . $search . '%');
        });

        
    }
}
