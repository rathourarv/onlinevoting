<?php

namespace App\Controllers;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Controllers\Results;
use Tests\Support\Database\Seeds\ElectionSeeder;

/**
 * @internal
 */
final class ResultsControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    protected $seed = ElectionSeeder::class;
    protected $migrate = true;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new Results();
    }
    public function testIndex()
    {
        $result = $this->withURI('http://localhost:8080/')
            ->controller(Results::class)
            ->execute('index');

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Completed Elections'));
        $this->assertTrue(condition: $result->see('UP-2020'));
    }

    public function testView()
    {
        $result = $this->withURI('http://localhost:8080/')
            ->controller(Results::class)
            ->execute('view',2);

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Election:'));
        $this->assertTrue(condition: $result->see('UP-2020'));
        $this->assertTrue(condition: $result->see('LOK_SABHA'));
    }
}