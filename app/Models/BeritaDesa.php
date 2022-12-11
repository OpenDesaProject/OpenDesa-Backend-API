<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BeritaDesa extends Model
{
    use HasFactory;
    protected $table = 'das_data_desa';
    protected $fillable = ['desa_id', 'nama', 'luas_wilayah', 'website', 'path'];

    public function getWebsiteUrlFeedAttribute()
    {
        if (Str::endsWith($this->website, '/') == false) {
            $this->website .= '/';
        }

        $desa = [
            'desa_id' => $this->desa_id,
            'nama'    => ucwords($this->sebutan_desa . ' ' . $this->nama),
            'website' => $this->website . 'index.php/feed'
        ];
        return $desa;
    }

    public function scopeWebsiteUrl($query)
    {
        return $query->whereNotNull('website');
    }
}
