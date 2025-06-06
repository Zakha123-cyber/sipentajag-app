<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Ambil user admin (atau user pertama sebagai author)
        $admin = User::first();

        Article::insert([
            [
                'title' => 'Cara Efektif Mengendalikan Penyakit Karat pada Jagung',
                'content' => 'Penyakit karat disebabkan oleh jamur Puccinia sorghi. Pencegahan dapat dilakukan dengan menanam varietas tahan penyakit dan penggunaan fungisida sistemik seperti azoksistrobin.',
                'image_url' => 'https://example.com/images/artikel-karat.jpg',
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tips Meningkatkan Produksi Jagung di Musim Hujan',
                'content' => 'Musim hujan menjadi tantangan karena serangan hama dan jamur. Penggunaan drainase baik dan pemupukan seimbang sangat disarankan.',
                'image_url' => 'https://example.com/images/artikel-hujan.jpg',
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pupuk Terbaik untuk Meningkatkan Kualitas Tanaman Jagung',
                'content' => 'Penggunaan pupuk NPK seimbang serta tambahan pupuk organik sangat membantu pertumbuhan akar dan pembentukan tongkol yang baik.',
                'image_url' => 'https://example.com/images/artikel-pupuk.jpg',
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
