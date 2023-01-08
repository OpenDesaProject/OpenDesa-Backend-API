<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    // use HasFactory;

    protected $table = 'kecamatan';

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function profil()
    {
        return $this->hasOne(Profil::class, 'kecamatan_id');
    }

    public function dataUmum()
    {
        return $this->hasOne(DataUmum::class, 'kecamatan_id');
    }

    public function desa()
    {
        return $this->hasMany(Desa::class, 'kecamatan_id');
    }
}
