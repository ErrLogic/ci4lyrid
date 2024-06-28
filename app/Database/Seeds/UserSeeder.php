<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'full_name' => 'Admin 1',
                'username'  => 'admin1',
                'password'  => password_hash('password123', PASSWORD_BCRYPT),
                'is_active'    => true,
            ],
            [
                'full_name' => 'Admin2',
                'username'  => 'admin2',
                'password'  => password_hash('password123', PASSWORD_BCRYPT),
                'is_active'    => true,
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
