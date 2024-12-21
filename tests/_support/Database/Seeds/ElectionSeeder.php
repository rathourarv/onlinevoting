<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ElectionSeeder extends Seeder
{
    public function run(): void
    {
        $factories = [
            [
                'electionName' => 'UP-2025',
                'electionType' => 'LOK_SABHA',
                'startDate' => '2025-01-01',
                'endDate' => '2025-01-05',
            ],
            [
                'electionName' => 'UP-2020',
                'electionType' => 'LOK_SABHA',
                'startDate' => '2020-01-01',
                'endDate' => '2020-01-05',
            ],
            [
                'electionName' => 'MH-2024',
                'electionType' => 'LOK_SABHA',
                'startDate' => '2024-12-20',
                'endDate' => '2025-01-01',
            ],
        ];

        $builder = $this->db->table('election');

        foreach ($factories as $factory) {
            $builder->insert($factory);
        }
    }
}
