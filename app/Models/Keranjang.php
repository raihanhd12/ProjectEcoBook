<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }

    public function penjual()
    {
        return $this->belongsTo('App\Models\Penjual', 'penjual_id');
    }

    public function buku()
    {
        return $this->belongsTo('App\Models\Buku', 'buku_id');
    }
}
