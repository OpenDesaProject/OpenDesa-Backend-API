<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function get(Request $request)
    {
        $kabupaten = Kabupaten::all();
        if ($request->has('provinsi_id')) {
            $kabupaten = Kabupaten::where('provinsi_id', $request->provinsi_id)->get();
        }

        return ResponseFormatter::success($kabupaten, 'Daftar Kabupaten', 200);
    }
}
