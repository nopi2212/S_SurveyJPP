<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'IdCustomer' => '1',
            'NamaCustomer' => 'Test Customer',
            'NamaPerusahaan' => 'PT. Test Perusahaan',
            'NoHpCustomer' => '081234567890',
            'LastTransaction' => date("Y-m-d h:i:sa"),
            'KategoriTransaction' => 'jasa',
        ];

        $this->db->table('customers')->insert($data);
    }
}
