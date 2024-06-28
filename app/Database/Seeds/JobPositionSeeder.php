<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JobPositionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'description' => 'CEO',
                'is_active' => true,
            ],
            [
                'description' => 'CTO',
                'is_active' => true,
            ],
            [
                'description' => 'COO',
                'is_active' => true,
            ],
            [
                'description' => 'CMO',
                'is_active' => true,
            ],
            [
                'description' => 'CFO',
                'is_active' => true,
            ],
            [
                'description' => 'Software Engineer',
                'is_active' => true,
            ],
            [
                'description' => 'Product Manager',
                'is_active' => true,
            ],
            [
                'description' => 'UX/UI Designer',
                'is_active' => true,
            ],
            [
                'description' => 'Sales Manager',
                'is_active' => true,
            ],
            [
                'description' => 'Customer Support Specialist',
                'is_active' => true,
            ],
        ];
        

        $this->db->table('job_positions')->insertBatch($data);
    }
}
