<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'member';


    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_member', 'like', '%' . $search . '%')
                        ->orWhere('nomor_member', 'like', '%' . $search . '%')
                        ->orWhere('alamat', 'like', '%' . $search . '%');
        });

        
    }
}
