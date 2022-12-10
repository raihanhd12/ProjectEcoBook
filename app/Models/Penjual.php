<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penjual extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nextregister()
    {
        return $this->hasMany(NextRegister::class);
    }
    
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function kurir()
    {
        return $this->hasMany(Kurir::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
