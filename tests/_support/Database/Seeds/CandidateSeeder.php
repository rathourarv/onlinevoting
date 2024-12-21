<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        $factories = [
            [
                'firstName' => "Govind",
                'lastName' => "Singh",
                'partyID' => 1,
                'constituencyID' => 1,
                'electionID' => 1,
            ],
            [
                'firstName' => "Simran",
                'lastName' => "Singh",
                'partyID' => 2,
                'constituencyID' => 1,
                'electionID' => 1,
            ],
            [
                'firstName' => "Rajat",
                'lastName' => "Singh",
                'partyID' => 2,
                'constituencyID' => 2,
                'electionID' => 1,
            ],
        ];

        $builder = $this->db->table('candidate');

        foreach ($factories as $factory) {
            $builder->insert($factory);
        }
    }
}
