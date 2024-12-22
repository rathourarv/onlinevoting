<?php

namespace App\Controllers;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Controllers\Dashboard;
use Tests\Support\Database\Seeds\ElectionSeeder;

/**
 * @internal
 */
final class DashboardControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    protected $seed = ElectionSeeder::class;
    protected $migrate = true;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new Dashboard();
    }
    public function testIndex()
    {
        $result = $this->withURI('http://localhost:8080/')
            ->controller(Dashboard::class)
            ->execute('index');

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Welcome to Online Election System'));
    }
}