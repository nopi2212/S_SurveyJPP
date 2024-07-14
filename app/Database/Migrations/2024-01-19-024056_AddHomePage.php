<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHomePage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'IdHomePage' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'Head' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'SubHead' => [
                'type'           => 'TEXT'
            ],
            'ImageHead' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'About' => [
                'type'           => 'TEXT'
            ],
            'AboutImage' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'Email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '70'
            ],
            'Instagram' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'Katalog' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
        ]);
        $this->forge->addKey('IdHomePage', true);
        $this->forge->createTable('homepage');
    }

    public function down()
    {
        $this->forge->dropTable('homepage');
    }
}
