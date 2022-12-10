<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinsi')->insert([
            ['nama' => 'provinsi 1'],
            ['nama' => 'provinsi 2'],
            ['nama' => 'provinsi 3'],
            ['nama' => 'provinsi 4'],
            ['nama' => 'provinsi 5'],
        ]);

        DB::table('kabupaten')->insert([
            ['provinsi_id' => 1, 'nama' => 'Kabupaten 1'],
            ['provinsi_id' => 1, 'nama' => 'Kabupaten 2'],
            ['provinsi_id' => 2, 'nama' => 'Kabupaten 3'],
            ['provinsi_id' => 2, 'nama' => 'Kabupaten 4'],
            ['provinsi_id' => 2, 'nama' => 'Kabupaten 5'],
            ['provinsi_id' => 3, 'nama' => 'Kabupaten 6'],
            ['provinsi_id' => 3, 'nama' => 'Kabupaten 7'],
            ['provinsi_id' => 4, 'nama' => 'Kabupaten 8'],
            ['provinsi_id' => 5, 'nama' => 'Kabupaten 9'],
            ['provinsi_id' => 5, 'nama' => 'Kabupaten 10'],
        ]);

        DB::table('kecamatan')->insert([
            ['kabupaten_id' => 1, 'nama' => 'Kecamatan 1'],
            ['kabupaten_id' => 1, 'nama' => 'Kecamatan 2'],
            ['kabupaten_id' => 3, 'nama' => 'Kecamatan 3'],
            ['kabupaten_id' => 5, 'nama' => 'Kecamatan 4'],
            ['kabupaten_id' => 5, 'nama' => 'Kecamatan 5'],
            ['kabupaten_id' => 1, 'nama' => 'Kecamatan 6'],
            ['kabupaten_id' => 2, 'nama' => 'Kecamatan 7'],
            ['kabupaten_id' => 9, 'nama' => 'Kecamatan 8'],
        ]);

        DB::table('profil')->insert([
            [
                'kecamatan_id' => 1,
                'visi' => '<h1>Visi</h1><p><b>Lorem ipsum</b> dolor sit amet consectetur adipisicing elit. Ipsum, ex nihil eos voluptate officiis debitis maiores omnis earum quam ratione ea. <i>Illo nam facilis quae</i> asperiores provident odio ducimus amet sapiente iure nihil <b>officiis</b>, minima labore hic atque nostrum cumque enim deserunt? Veniam, culpa odit! Pariatur laudantium quod eveniet quas?</p>',
                'misi' => '<h1>Misi</h1><p><b>Lorem ipsum</b> dolor sit amet consectetur adipisicing elit. Ipsum, ex nihil eos voluptate officiis debitis maiores omnis earum quam ratione ea. <i>Illo nam facilis quae</i> asperiores provident odio ducimus amet sapiente iure nihil <b>officiis</b>, minima labore hic atque nostrum cumque enim deserunt? Veniam, culpa odit! Pariatur laudantium quod eveniet quas?</p>',
                'camat' => 'Nama Camat',
                'sambutan_camat' => '<p><b>Assalamualaikum Wr. Wb.</b> <br>dolor sit amet consectetur adipisicing elit. Ipsum, ex nihil eos voluptate officiis debitis maiores omnis earum quam ratione ea. <i>Illo nam facilis quae</i> asperiores provident odio ducimus amet sapiente iure nihil <b>officiis</b>, minima labore hic atque nostrum cumque enim deserunt? Veniam, culpa odit! Pariatur laudantium quod eveniet quas?</p>'
            ],
            [
                'kecamatan_id' => 2,
                'visi' => '<h1>Visi</h1><p><b>Lorem ipsum</b> dolor sit amet consectetur adipisicing elit. Ipsum, ex nihil eos voluptate officiis debitis maiores omnis earum quam ratione ea. <i>Illo nam facilis quae</i> asperiores provident odio ducimus amet sapiente iure nihil <b>officiis</b>, minima labore hic atque nostrum cumque enim deserunt? Veniam, culpa odit! Pariatur laudantium quod eveniet quas?</p>',
                'misi' => '<h1>Misi</h1><p><b>Lorem ipsum</b> dolor sit amet consectetur adipisicing elit. Ipsum, ex nihil eos voluptate officiis debitis maiores omnis earum quam ratione ea. <i>Illo nam facilis quae</i> asperiores provident odio ducimus amet sapiente iure nihil <b>officiis</b>, minima labore hic atque nostrum cumque enim deserunt? Veniam, culpa odit! Pariatur laudantium quod eveniet quas?</p>',
                'camat' => 'Nama Camat',
                'sambutan_camat' => '<p><b>Assalamualaikum Wr. Wb.</b> <br>dolor sit amet consectetur adipisicing elit. Ipsum, ex nihil eos voluptate officiis debitis maiores omnis earum quam ratione ea. <i>Illo nam facilis quae</i> asperiores provident odio ducimus amet sapiente iure nihil <b>officiis</b>, minima labore hic atque nostrum cumque enim deserunt? Veniam, culpa odit! Pariatur laudantium quod eveniet quas?</p>'
            ],
        ]);

        DB::table('data_umum')->insert([
            [
                'kecamatan_id' => 1,
                'luas_wilayah' => 22,
                'batas_utara' => 12,
                'batas_timur' => 12,
                'batas_selatan' => 12,
                'batas_barat' => 12,
            ],
            [
                'kecamatan_id' => 2,
                'luas_wilayah' => 23,
                'batas_utara' => 13,
                'batas_timur' => 13,
                'batas_selatan' => 13,
                'batas_barat' => 13,
            ],
            [
                'kecamatan_id' => 3,
                'luas_wilayah' => 26,
                'batas_utara' => 16,
                'batas_timur' => 16,
                'batas_selatan' => 16,
                'batas_barat' => 16,
            ],
        ]);

        DB::table('desa')->insert([
            ['kecamatan_id' => 1, 'nama' => 'desa 1'],
            ['kecamatan_id' => 1, 'nama' => 'desa 2'],
            ['kecamatan_id' => 1, 'nama' => 'desa 3'],
            ['kecamatan_id' => 1, 'nama' => 'desa 4'],
            ['kecamatan_id' => 2, 'nama' => 'desa 5'],
            ['kecamatan_id' => 2, 'nama' => 'desa 6'],
            ['kecamatan_id' => 2, 'nama' => 'desa 7'],
            ['kecamatan_id' => 2, 'nama' => 'desa 8'],
            ['kecamatan_id' => 3, 'nama' => 'desa 9'],
            ['kecamatan_id' => 4, 'nama' => 'desa 10'],
            ['kecamatan_id' => 4, 'nama' => 'desa 12'],
            ['kecamatan_id' => 5, 'nama' => 'desa 13'],
        ]);
    }
}
