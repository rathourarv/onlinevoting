<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSession extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'timestamp' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 10,
                'null' => false,
            ],
            'data' => [
                'type' => 'TEXT',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('timestamp');
        $this->forge->createTable('ci_sessions');
    }
    public function down()
    {
        $this->forge->dropTable('ci_sessions');
    }
}
