<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for($i = 0; $i < 12; $i++) {
            DB::table('data_desas')->insert([
                'kode_desa' => Str::random(8),
                'nama_desa' => Str::random(8),
                'website' => 'www.open_desa/'.Str::random(8).'.com',
                'luas_wilayah' => 1200.24,
            ]);
        }      
    }
}
