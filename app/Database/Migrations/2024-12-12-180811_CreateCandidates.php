<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCandidate extends Migration
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
            'firstName' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'lastName' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'partyID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'constituencyID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'electionID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('partyID', 'party', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('constituencyID', 'constituency', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('electionID', 'election', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('candidate', true);
    }
    public function down()
    {
        $this->forge->dropTable('candidate');
    }
}