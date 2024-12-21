<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateParty extends Migration
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
            'partyName' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'            => false,
                'unique'          => true,
            ],
            'partySymbol' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'            => true,
            ],
            'leaderName' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'            => true,
            ],
            'foundedYear' => [
                'type'           => 'YEAR',
                'null'            => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('party', true);
    }

    public function down()
    {
        $this->forge->dropTable('party');
    }
}