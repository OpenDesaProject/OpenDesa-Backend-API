<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function get(Request $request)
    {
        $kecamatan = Kecamatan::all();
        if ($request->has('kabupaten_id')) {
            $kecamatan = Kecamatan::where('kabupaten_id', $request->kabupaten_id)->get();
        }

        return ResponseFormatter::success($kecamatan, 'Daftar Kecamatan', 200);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::with(['profil', 'dataUmum', 'desa'])->withCount('desa')->find($id);

        if ($kecamatan == null) {
            return ResponseFormatter::error(null, 'Resource Kecamatan Tidak Ditemukan', 404);
        }

        return ResponseFormatter::success($kecamatan, 'Detil Kecamatan', 200);
    }
}
