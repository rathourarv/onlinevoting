<?php

namespace App\Controllers;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Controllers\Feedback;

/**
 * @internal
 */
final class FeedbackControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    protected $migrate = true;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new Feedback();
    }
    public function testIndex()
    {
        $result = $this->withURI('http://localhost:8080/')
            ->controller(Feedback::class)
            ->execute('index');

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Feedback Form:'));
    }
    public function testStoreWithoutBody()
    {
        $result = $this->withURI('http://localhost:8080/feedback')
            ->controller(Feedback::class)
            ->execute('store');

        $this->assertTrue(condition: $result->isOK());
        $this->assertTrue(condition: $result->see('Feedback Form:'));
        $this->assertTrue(condition: $result->see('The name field is required.'));
        $this->assertTrue(condition: $result->see('The textbox field is required.'));
        $this->assertTrue(condition: $result->see('The fback field is required.'));
        $this->assertTrue(condition: $result->see('The email field is required.'));
    }
    public function testStore()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'fback' => 'Good',
            'textbox' => 'test feedback',
        ];
        $result = $this->withURI('http://localhost:8080/feedback')
            ->controller(Feedback::class)
            ->execute('store', $data);

        $this->assertTrue(condition: $result->isOK());
    }
}