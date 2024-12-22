<?php

namespace App\Controllers;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Controllers\Signin;

/**
 * @internal
 */
final class SigninControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->withURI('http://localhost:8080/')
            ->controller(Signin::class)
            ->execute('index');

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Welcome to Online Election System'));
        $this->assertTrue(condition: $result->see('Email ID'));
        $this->assertTrue(condition: $result->see('Password'));
        $this->assertTrue(condition: $result->see('Submit'));
        $this->assertTrue(condition: $result->see('Forgot Password?'));
        $this->assertTrue(condition: $result->see('No Account? Sign Up'));
    }
    public function testLogout()
    {
        $result = $this->withURI('http://localhost:8080/logout')
            ->controller(Signin::class)
            ->execute('logout');

        $this->assertTrue(condition: $result->isOK());
        $result->assertRedirectTo('http://example.com/dashboard');
    }
}