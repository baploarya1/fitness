<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'paket';

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_paket', 'like', '%' . $search . '%')
                        ->orWhere('kode_paket', 'like', '%' . $search . '%')
                        ->orWhere('kategori', 'like', '%' . $search . '%');
        });

        
    }
    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'kode_kategori', 'kode_kategori');
    }
}
