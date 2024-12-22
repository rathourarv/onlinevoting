<?php

namespace App\Controllers;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Controllers\Dashboard;
use Tests\Support\Database\Seeds\CandidateSeeder;
use Tests\Support\Database\Seeds\ConstituencySeeder;
use Tests\Support\Database\Seeds\ElectionSeeder;
use Tests\Support\Database\Seeds\PartySeeder;
use Tests\Support\Database\Seeds\VoterSeeder;

/**
 * @internal
 */
final class VoteControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    protected $electionSeed = ElectionSeeder::class;
    protected $partySeed = PartySeeder::class;
    protected $constituencySeed = ConstituencySeeder::class;
    protected $candidateSeed = CandidateSeeder::class;
    protected $voterSeed = VoterSeeder::class;
    protected $migrate = true;

    public function testIndex()
    {
        session()->set([
            'id' => 1,
            'isLoggedIn' => true,
            'username' => 'johndoe',
        ]);
        $result = $this->withURI('http://localhost:8080/')
            ->controller(VoteController::class)
            ->execute('index');

        $this->assertTrue(condition: $result->isOK());
        $result->assertRedirectTo('http://localhost:8080/');
    }
}