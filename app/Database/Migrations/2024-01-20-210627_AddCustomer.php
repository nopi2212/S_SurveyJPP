<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCustomer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'IdCustomer' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'NamaCustomer' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'NamaPerusahaan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'NoHpCustomer' => [
                'type'           => 'VARCHAR',
                'constraint'     => '14'
            ],
            'LastTransaction' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'KategoriTransaction' => [
                'type'              => 'ENUM',
                'constraint'        => array('jasa', 'produk'),
            ],
            'Saran' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('IdCustomer', true);
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
