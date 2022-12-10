<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    // use HasFactory;

    protected $table = 'data_umum';

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];
}
