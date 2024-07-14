<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HomePageSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Head' => 'SBU Jasa <br /> Pelayanan Pabrik',
            'SubHead' => '<p class="text-gray-600"><strong>SBU Jasa Pelayanan Pabrik</strong> merupakan Unit Pelayanan Pabrik yang melayani kebutuhan baik Internal maupun External <strong>PT. Pupuk Kalimantan Timur</strong>.</p>',
            'ImageHead' => '',
            'About' => '<p><span style="font-weight: 700;">SBU Jasa Pelayanan Pabrik&nbsp;</span>atau yang lebih dikenal dengan nama Strategic Business Unit 
            Jasa Pelayanan Pabrik merupakan Unit Pelayanan Pabrik yang melayani 
            kebutuhan baik Internal maupun External <strong>PT.Pupuk Kalimantan Timur</strong>.</p><p><br></p><p>
            </p><p>Fungsi bisnis dari SBU JPP sendiri antara lain:</p><p></p><ul><li>Manufacturing 
            Spare Part dengan fasilitas lengkap pada Unit Engineering, Unit 
            Laboraturium Pengukuran dan Pengujian Logam, Unit Fabrikasi, Unit Suku 
            Cadang (CNC &amp; Konvensional), serta Unit Pengecoran Logam.</li><li>Jasa 
            Perbaikan dan Perawatan Pabrik berupa Overhaul &amp; Technical Services,
             Jasa Keahlian, serta Jasa Training Operasional &amp; Commisioning 
            Pabrik.</li></ul><p><br></p><p></p>',
            'AboutImage' => '',
            'Email' => 'marketingjpp@pupukkaltim.com',
            'Instagram' => 'sbujpp_pkt',
            'Katalog' => '',
        ];

        $this->db->table('homepage')->insert($data);
    }
}
