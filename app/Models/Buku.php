<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function penjual()
    {
        return $this->belongsTo('App\Models\Penjual', 'id_penjual');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_category');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
}
