<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFeedback extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'fback' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'textbox' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('feedback', true);
    }
    public function down()
    {
        $this->forge->dropTable('feedback');
    }
}