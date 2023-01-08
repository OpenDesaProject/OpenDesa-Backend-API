<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function get(Request $request)
    {
        $desa = Desa::all();

        if ($request->has('kecamatan_id')) {
            $desa = Desa::where('kecamatan_id', $request->kecamatan_id)->get();
        }

        return ResponseFormatter::success($desa, 'Daftar Desa', 200);
    }
}
