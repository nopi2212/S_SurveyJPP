<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HasilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['customer_IdCustomer' => '1', 'pertanyaan_IdPertanyaan' => 'KDP1', 'Kepentingan' => '3', 'Kepuasan' => '5',],
            ['customer_IdCustomer' => '1', 'pertanyaan_IdPertanyaan' => 'KDP2', 'Kepentingan' => '4', 'Kepuasan' => '4',],
            ['customer_IdCustomer' => '1', 'pertanyaan_IdPertanyaan' => 'KDP3', 'Kepentingan' => '5', 'Kepuasan' => '3',],
            ['customer_IdCustomer' => '1', 'pertanyaan_IdPertanyaan' => 'KDP4', 'Kepentingan' => '5', 'Kepuasan' => '4',],
            ['customer_IdCustomer' => '1', 'pertanyaan_IdPertanyaan' => 'KDP5', 'Kepentingan' => '4', 'Kepuasan' => '5',],
            ['customer_IdCustomer' => '1', 'pertanyaan_IdPertanyaan' => 'KDP6', 'Kepentingan' => '3', 'Kepuasan' => '4',],
            ['customer_IdCustomer' => '1', 'pertanyaan_IdPertanyaan' => 'KDP7', 'Kepentingan' => '4', 'Kepuasan' => '3',],
        ];

        $this->db->table('hasilkuisioners')->insertBatch($data);
    }
}
