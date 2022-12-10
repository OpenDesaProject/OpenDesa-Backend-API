<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function get()
    {
        $provisi = Provinsi::all();

        return ResponseFormatter::success($provisi, 'Daftar Provinsi', 200);
    }
}
