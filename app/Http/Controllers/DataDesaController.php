<?php

namespace App\Http\Controllers;

use App\Models\DataDesa;
use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    public function getAllDataDesa() {
        return response()->json(DataDesa::all(), 200);
    }

    public function getOneDataDesa($id) {
        $data_desa = DataDesa::find($id);
        return response()->json($data_desa, 200);
    }
}
