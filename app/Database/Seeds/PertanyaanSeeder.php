<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['IdPertanyaan' => 'KDP1', 'NamaPertanyaan' => 'Mutu Atau Kualitas Produk / Jasa SBU JPP'],
            ['IdPertanyaan' => 'KDP2', 'NamaPertanyaan' => 'Jadwal Penyelesaian Produk / Jasa Sbu Jpp'],
            ['IdPertanyaan' => 'KDP3', 'NamaPertanyaan' => 'Kecepatan Menanggapi Keluhan'],
            ['IdPertanyaan' => 'KDP4', 'NamaPertanyaan' => 'Komunikasi Dengan Staf SBU JPP'],
            ['IdPertanyaan' => 'KDP5', 'NamaPertanyaan' => 'Perhatian Akan Keselamatan Kerja & Lingkungan'],
            ['IdPertanyaan' => 'KDP6', 'NamaPertanyaan' => 'Waktu Penerbitan Penawaran'],
            ['IdPertanyaan' => 'KDP7', 'NamaPertanyaan' => 'Harga Bersaing'],
        ];

        $this->db->table('pertanyaans')->insertBatch($data);
    }
}
