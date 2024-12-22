<?php

namespace App\Controllers;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Controllers\AboutUsController;
use Tests\Support\Database\Seeds\ElectionSeeder;

/**
 * @internal
 */
final class AboutUsControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->withURI('http://localhost:8080/')
            ->controller(AboutUsController::class)
            ->execute('index');

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Welcome to Online Election System'));
        $this->assertTrue(condition: $result->see('Arvind Singh'));
    }
}