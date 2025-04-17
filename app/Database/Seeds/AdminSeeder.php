<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nip' => '112233',
            'password'    => '12345',
            'role' => 'admin'
        ];

        // Using Query Builder
        $this->db->table('tb_users')->insert($data);
    }
}
