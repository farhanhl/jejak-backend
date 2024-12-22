<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToko extends Model
{
    use HasFactory;

    protected $table = 'user_toko';

    protected $fillable = [
        'kode_toko',
        'kode_toko_detail',
        'nama_toko'
    ];
}