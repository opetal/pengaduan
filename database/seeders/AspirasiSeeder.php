<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class AspirasiSeeder extends Seeder
{
    public function run(): void
    {
        $siswa1 = User::where('email', 'siswa1@example.com')->first();
        $siswa2 = User::where('email', 'siswa2@example.com')->first();

        $akademik = Kategori::where('nama_kategori', 'Akademik')->first();
        $fasilitas = Kategori::where('nama_kategori', 'Fasilitas')->first();

        if ($siswa1 && $akademik) {
            Aspirasi::create([
                'user_id' => $siswa1->id,
                'kategori_id' => $akademik->id,
                'judul' => 'Permintaan tambahan buku perpustakaan',
                'isi' => 'Kami meminta tambahan buku referensi untuk mata pelajaran Matematika.','status' => 'pending',
            ]);
        }

        if ($siswa2 && $fasilitas) {
            Aspirasi::create([
                'user_id' => $siswa2->id,
                'kategori_id' => $fasilitas->id,
                'judul' => 'Kondisi toilet tidak layak',
                'isi' => 'Toilet di lantai 2 sering macet dan tidak bersih.',
                'status' => 'diproses',
            ]);
        }
    }
}
