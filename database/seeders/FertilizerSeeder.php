<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fertilizer;
use App\Models\Disease;

class FertilizerSeeder extends Seeder
{
    public function run()
    {
        $fertilizers = [
            'Pupuk Daun Organik Cair' => [
                'description' => 'Pupuk organik cair kaya nutrisi untuk mempercepat pemulihan daun.',
                'usage_instruction' => 'Semprotkan pada daun setiap 7 hari sekali.',
                'image_url' => 'https://example.com/images/pupuk-organik.jpg',
                'purchase_link' => 'https://shopee.co.id/pupuk-organik-cair'
            ],
            'Pupuk NPK' => [
                'description' => 'Mengandung nitrogen, fosfor, dan kalium untuk memperkuat ketahanan tanaman.',
                'usage_instruction' => 'Taburkan di sekitar perakaran sesuai dosis.',
                'image_url' => 'https://example.com/images/pupuk-npk.jpg',
                'purchase_link' => 'https://tokopedia.com/pupuk-npk'
            ],
            'Pupuk KCl' => [
                'description' => 'Mengandung kalium tinggi untuk meningkatkan daya tahan terhadap penyakit jamur.',
                'usage_instruction' => 'Gunakan saat tanaman mulai berbunga.',
                'image_url' => 'https://example.com/images/pupuk-kcl.jpg',
                'purchase_link' => 'https://shopee.co.id/pupuk-kcl'
            ]
        ];

        $fertilizerIds = [];

        foreach ($fertilizers as $name => $data) {
            $fertilizer = Fertilizer::create([
                'name' => $name,
                'description' => $data['description'],
                'usage_instruction' => $data['usage_instruction'],
                'image_url' => $data['image_url'],
                'purchase_link' => $data['purchase_link']
            ]);
            $fertilizerIds[$name] = $fertilizer->id;
        }

        $diseases = Disease::all()->keyBy('name');

        // Hubungkan pupuk dengan penyakit
        $diseases['Bercak']->fertilizers()->attach([
            $fertilizerIds['Pupuk Daun Organik Cair'],
            $fertilizerIds['Pupuk KCl']
        ]);

        $diseases['Hawar']->fertilizers()->attach([
            $fertilizerIds['Pupuk NPK'],
            $fertilizerIds['Pupuk KCl']
        ]);

        $diseases['Karat']->fertilizers()->attach([
            $fertilizerIds['Pupuk Daun Organik Cair'],
            $fertilizerIds['Pupuk NPK']
        ]);
    }
}
