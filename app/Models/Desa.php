<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    // use HasFactory;

    protected $table = 'desa';

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];
}
