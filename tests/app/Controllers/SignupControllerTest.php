<?php

namespace App\Controllers;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

/**
 * @internal
 */
final class SignupControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->withURI('http://localhost:8080/')
            ->controller(Signup::class)
            ->execute('index');

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Welcome to Online Election System'));
        $this->assertTrue(condition: $result->see('First Name'));
        $this->assertTrue(condition: $result->see('Last Name'));
        $this->assertTrue(condition: $result->see('Email'));
        $this->assertTrue(condition: $result->see('Mobile'));
        $this->assertTrue(condition: $result->see('Username'));
        $this->assertTrue(condition: $result->see('Password'));
        $this->assertTrue(condition: $result->see('Confirm Password'));
    }
}