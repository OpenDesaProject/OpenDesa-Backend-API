<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_desa',
        'nama_desa',
        'website',
        'luas_wilayah'
    ];
}
