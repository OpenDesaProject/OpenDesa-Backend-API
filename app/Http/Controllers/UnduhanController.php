<?php

namespace App\Http\Controllers;

use App\Models\Unduhan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UnduhanController extends Controller
{
    function store(Request $request)
    {
        $fields = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'file' => 'required'
        ]);

        $destination_path = 'public/file/unduhan';
        $file = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $file_name = $fields['kategori'] . '/' . Str::slug($fields['nama']) . "." . $extension;
        $path = $request->file('file')->storeAs($destination_path, $file_name);

        $data = Unduhan::create([
            'nama' => $fields['nama'],
            'slug' => Str::slug($fields['nama']) . "-" . Str::random(5),
            'deskripsi' => $fields['deskripsi'],
            'kategori' => $fields['kategori'],
            'file' => $file_name
        ]);

        return $this->successfulResponse($data, "Berhasil membuat file unduhan");
    }

    function download(Request $request)
    {
        if (Storage::disk('public')->exists("file/unduhan/" . $request->file))
        {
            $path = Storage::disk('public')->path("file/unduhan/" . $request->file);
            $content = file_get_contents($path);
            return response($content, 200, [
                'Content-Type' => mime_content_type($path)
            ]);
        }

        return $this->notFoundResponse("File tidak ditemukan");
    }

    function getByCategory($kategori)
    {
        $data = Unduhan::where("kategori", $kategori)->get();

        return $this->successfulResponse($data, "Berhasil mendapatkan semua file dengan kategori ". $kategori);
    }

    function getByCategoryName($kategori, $slug)
    {
        $data = Unduhan::where([
            'kategori' => $kategori,
            'slug' => $slug,
            ])->first();

        if ($data) {
            return $this->successfulResponse($data, "Berhasil mendapatkan ". $data['nama']);
        }
    }

    public function search()
    {
        $nama = $_GET['query'];
        $data = Unduhan::where('nama', 'like', '%' . $nama . '%')
        ->orWhere('deskripsi', 'like', '%' . $nama . '%')
        ->orWhere('kategori', 'like', '%' . $nama . '%')->get();

        return $this->successfulResponse($data, "Ini hasil pencarian");
    }
}
