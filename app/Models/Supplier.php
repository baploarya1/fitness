<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'supplier';
 
    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_supplier', 'like', '%' . $search . '%')
                        ->orWhere('kode_supplier', 'like', '%' . $search . '%')
                        ->orWhere('alamat', 'like', '%' . $search . '%');
        });

        
    }
}
