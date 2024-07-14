<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPertanyaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'IdPertanyaan' => [
                'type'              => 'VARCHAR',
                'constraint'        => 5,
            ],
            'NamaPertanyaan' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
        ]);
        $this->forge->addKey('IdPertanyaan', true);
        $this->forge->createTable('pertanyaans');
    }

    public function down()
    {
        $this->forge->dropTable('pertanyaans');
    }
}
