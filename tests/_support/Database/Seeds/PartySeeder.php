<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PartySeeder extends Seeder
{
    public function run(): void
    {
        $factories = [
            [
                'partyName' => 'BJP',
                'partySymbol' => 'Lotus',
                'leaderName' => 'JP Nadda',
                'foundedYear' => '1980',
            ],
            [
                'partyName' => 'INC',
                'partySymbol' => 'Hand',
                'leaderName' => 'Rahul Gandhi',
                'foundedYear' => '1980',
            ],
        ];

        $builder = $this->db->table('party');

        foreach ($factories as $factory) {
            $builder->insert($factory);
        }
    }
}
