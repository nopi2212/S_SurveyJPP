<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Username' => 'admin',
            'Password' => password_hash('admin123#', PASSWORD_BCRYPT),
            'Role' => 'admin',
            'LastLogin' => date("Y-m-d h:i:sa"),
            'FullName' => 'super admin',
        ];

        $this->db->table('users')->insert($data);
    }
}
