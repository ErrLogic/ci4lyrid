<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobPositionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => false,
                'default'    => true
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('job_positions');
    }

    public function down()
    {
        $this->forge->dropTable('job_positions');
    }
}
