<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function getPathAttribute($value)
    {
        return $value != null ?  env('APP_URL') . "storage/" . $value : $value;
    }
}
