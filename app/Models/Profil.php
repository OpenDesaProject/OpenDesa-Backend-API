<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    // use HasFactory;
    protected $table = 'profil';

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function getLogoAttribute($value)
    {
        return $value != null ? env('APP_URL') . 'storage/' . $value : env('APP_URL') . 'image.png';
    }

    public function getBaganStrukturAttribute($value)
    {
        return $value != null ? env('APP_URL') . 'storage/' . $value : env('APP_URL') . 'image.png';
    }

    public function getPhotoCamatAttribute($value)
    {
        return $value != null ? env('APP_URL') . 'storage/' . $value : env('APP_URL') . 'user.png';
    }
}
