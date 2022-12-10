<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextRegister extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penjual()
    {
        return $this->belongsTo('App\Models\Penjual', 'penjual_id');
    }
}
