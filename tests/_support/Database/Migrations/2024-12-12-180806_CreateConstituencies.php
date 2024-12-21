<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConstituenciesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'        => true,
                'auto_increment' => true,
            ],
            'constituencyName' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'            => false,
                'unique'          => true,
            ],
            'state' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'            => false,
            ],
            'type' => [
                'type'           => 'ENUM',
                'constraint'     => ['GENERAL', 'SC', 'ST'],
                'null'            => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('constituency', true);
    }

    public function down()
    {
        $this->forge->dropTable('constituency');
    }
}