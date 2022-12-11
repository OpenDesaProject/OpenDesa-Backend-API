<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Potensi::all();

        return $this->successfulResponse($data, "Berhasil Mendapatkan Semua Data Potensi");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'file' => 'required'
        ]);

        $destination_path = 'public/file/potensi';
        $file = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $file_name = $fields['kategori'] . '/' . Str::slug($fields['nama']) . "." . $extension;
        $path = $request->file('file')->storeAs($destination_path, $file_name);

        $data = Potensi::create([
            'nama' => $fields['nama'],
            'slug' => Str::slug($fields['nama']),
            'deskripsi' => $fields['deskripsi'],
            'kategori' => $fields['kategori'],
            'file' => $file_name
        ]);

        return $this->successfulResponse($data, "Berhasil Membuat Potensi");
    }

    public function getByCategory($kategori)
    {
        $data = Potensi::where("kategori", $kategori)->get();

        return $this->successfulResponse($data, "Berhasil Mendapatkan Semua Data Potensi Dengan Kategori ". $kategori);
    }

    public function getByCategoryName($kategori, $slug)
    {
        $data = Potensi::where([
            'kategori' => $kategori,
            'slug' => $slug,
            ])->first();

        if ($data) {
            return $this->successfulResponse($data, "Berhasil Mendapatkan ". $data['nama']);
        }
    }
}
