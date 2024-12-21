<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateElection extends Migration
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
            'electionName' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'            => false,
            ],
            'electionType' => [
                'type'           => 'ENUM',
                'constraint'     => ['LOK_SABHA', 'VIDHAN_SABHA', 'MUNICIPAL'],
                'null'            => false,
            ],
            'startDate' => [
                'type'           => 'DATE',
                'null'            => false,
            ],
            'endDate' => [
                'type'           => 'DATE',
                'null'            => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('election', true);
    }

    public function down()
    {
        $this->forge->dropTable('election');
    }
}