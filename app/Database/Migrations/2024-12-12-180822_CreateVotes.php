<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVote extends Migration
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
            'electionID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'voterID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'candidateID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'voteTime DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('electionID', 'election', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('voterID', 'voter', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('candidateID', 'candidate', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey(['electionID', 'voterID']);
        $this->forge->createTable('vote', true);
    }
    public function down()
    {
        $this->forge->dropTable('vote');
    }
}