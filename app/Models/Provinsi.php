<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    // use HasFactory;

    protected $table = 'provinsi';

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];
}
