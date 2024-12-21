<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVoter extends Migration
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
            'userID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
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
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['Male', 'Female', 'Other'],
                'null' => false,
            ],
            'dob' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'address1' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'address2' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'zip' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'constituencyID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'aadharNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 12,
                'null' => false,
                'unique' => true,
            ],
            'voterIDCard' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
                'unique' => true,
            ],
            'isApproved' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('constituencyID', 'constituency', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('userID', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addUniqueKey('userID');
        $this->forge->createTable('voter', true);
    }
    public function down()
    {
        $this->forge->dropTable('voter');
    }
}