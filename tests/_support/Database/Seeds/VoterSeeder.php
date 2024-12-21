<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VoterSeeder extends Seeder
{
    public function run(): void
    {
        $factories = [
            [
                'userID' => 1,
                'firstName' => 'test',
                'lastName' => 'test',
                'gender' => 'Male',
                'dob' => '1998-02-01',
                'address1' => 'test add 1',
                'address2' => 'test add 2',
                'city' => 'test',
                'state' => 'test',
                'zip' => 208020,
                'constituencyID' => 1,
                'aadharNumber' => "0987678908754",
                'voterIDCard' => "09876788909",
                'isApproved' => 1
            ],
            [
                'userID' => 2,
                'firstName' => 'test',
                'lastName' => 'test',
                'gender' => 'Male',
                'dob' => '1998-02-01',
                'address1' => 'test add 1',
                'address2' => 'test add 2',
                'city' => 'test',
                'state' => 'test',
                'zip' => 208020,
                'constituencyID' => 1,
                'aadharNumber' => "0987678908754",
                'voterIDCard' => "09876788909",
                'isApproved' => 0
            ],
        ];

        $builder = $this->db->table('voter');

        foreach ($factories as $factory) {
            $builder->insert($factory);
        }
    }
}
