<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ConstituencySeeder extends Seeder
{
    public function run(): void
    {
        $factories = [
            [
                'constituencyName' => "Govind Nagar",
                'state' => "Goa",
                'type' => "General"
            ],
            [
                'constituencyName' => "Kidwai Nagar",
                'state' => "Goa",
                'type' => "ST"
            ],
        ];

        $builder = $this->db->table('constituency');

        foreach ($factories as $factory) {
            $builder->insert($factory);
        }
    }
}
