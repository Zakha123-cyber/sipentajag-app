<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disease;

class DiseaseSeeder extends Seeder
{
    public function run()
    {
        Disease::insert([
            [
                'name' => 'Bercak',
                'description' => 'Penyakit bercak disebabkan oleh jamur seperti Helminthosporium turcicum. Menyebabkan bercak-bercak pada daun dan menurunkan kemampuan fotosintesis.',
                'symptoms' => 'Muncul bercak lonjong berwarna cokelat keabu-abuan pada daun.',
                'treatment' => 'Gunakan fungisida berbahan aktif mancozeb atau chlorothalonil. Bersihkan sisa tanaman sakit.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hawar',
                'description' => 'Hawar daun sering disebabkan oleh bakteri Pantoea stewartii. Menyebabkan kematian jaringan secara cepat.',
                'symptoms' => 'Daun menguning dari ujung, menyebar ke seluruh daun hingga kering.',
                'treatment' => 'Gunakan benih tahan penyakit dan semprot bakterisida bila perlu. Lakukan rotasi tanaman.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Karat',
                'description' => 'Penyakit karat disebabkan oleh jamur Puccinia sorghi. Penyakit ini menurunkan produktivitas tanaman jagung.',
                'symptoms' => 'Muncul bintik jingga kecil seperti karat di permukaan daun.',
                'treatment' => 'Aplikasikan fungisida sistemik dan hindari kelembapan tinggi. Gunakan varietas tahan karat.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
