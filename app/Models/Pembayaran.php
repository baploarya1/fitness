<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['kode_pembayaran','nama_pembayaran','keterangan','type','username','user_id'];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_pembayaran', 'like', '%' . $search . '%')
                        ->orWhere('kode_pembayaran', 'like', '%' . $search . '%')
                        ->orWhere('keterangan', 'like', '%' . $search . '%');
        });

        
    }
}
