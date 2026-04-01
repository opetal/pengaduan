<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategories = ['Akademik', 'Fasilitas', 'Kurikulum', 'Ekstrakurikuler'];

        foreach ($kategories as $nama) {
            Kategori::create(['nama_kategori' => $nama]);
        }
    }
}
