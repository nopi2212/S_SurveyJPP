<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'IdUser' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'Username' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20'
            ],
            'Password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'Role' => [
                'type'              => 'ENUM',
                'constraint'        => array('admin', 'pimpinan'),
            ],
            'FullName' => [
                'type'           => 'VARCHAR',
                'constraint'     => '70'
            ],
            'LastLogin' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('IdUser', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
