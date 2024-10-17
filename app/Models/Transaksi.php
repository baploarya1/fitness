<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['nomor_member','kode_paket','nomor_transaksi','kode_pembayaran','tanggal_transaksi','keterangan','status','type','username','user_id','tanggal_mulai_berlaku','tanggal_habis_berlaku'];
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
        return $this->hasOne(Member::class, 'kode_member', 'kode_member');
    }
}
