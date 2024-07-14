<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHasilKuisioner extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'IdKuesionerHasil' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'customer_IdCustomer' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'pertanyaan_IdPertanyaan' => [
                'type'              => 'VARCHAR',
                'constraint'        => 5,
            ],
            'Kepentingan' => [
                'type'              => 'INT',
                'constraint'        => 11
            ],
            'Kepuasan' => [
                'type'              => 'INT',
                'constraint'        => 11
            ],
        ]);
        $this->forge->addKey('IdKuesionerHasil', true);
        $this->forge->addForeignKey('customer_IdCustomer', 'customers', 'IdCustomer');
        $this->forge->addForeignKey('pertanyaan_IdPertanyaan', 'pertanyaans', 'IdPertanyaan');
        $this->forge->createTable('hasilkuisioners');
    }

    public function down()
    {
        $this->forge->dropTable('hasilkuisioners');
    }
}
