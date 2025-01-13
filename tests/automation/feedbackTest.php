<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use PHPUnit\Framework\TestCase;

class FeedbackTest extends TestCase
{
    /** @var RemoteWebDriver */
    protected $driver;

    protected function setUp(): void
    {
        // $this->markTestSkipped('all tests in this file are invactive for this server configuration!');
        log_message('info', 'Setup called');
        $host = 'http://localhost:4444/wd/hub'; // Selenium Server URL

        $options = new ChromeOptions();
        // Add any Chrome options if needed (e.g., headless mode)
        $options->addArguments(['--disable-dev-shm-usage', '--remote-debugging-port=9222']);

        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);


        log_message('info', message: 'Setup called');
        $this->driver = RemoteWebDriver::create($host, $capabilities);
        log_message('info', 'Setup completed');
    }
    protected function tearDown(): void
    {
        if ($this->driver) {
            $this->driver->quit();
        }
    }
    public function testSuccessfulFeedbackSubmission(): void
    {

        $this->driver->get('http://localhost:8080/signin');

        log_message('info', 'Test Successful Signin');
        $emailInput = $this->driver->findElement(WebDriverBy::id('email'));
        $passwordInput = $this->driver->findElement(WebDriverBy::name('password'));
        $submitButton = $this->driver->findElement(WebDriverBy::id('submit-button'));

        $emailInput->sendKeys('testuser@example.com');
        $passwordInput->sendKeys('P@$$wOrd');

        $submitButton->click();

        $this->driver->get('http://localhost:8080/feedback');

        $feedbackButton = $this->driver->findElement(WebDriverBy::id('poor'));
        $textboxInput = $this->driver->findElement(WebDriverBy::id('textbox'));
        $submitButton = $this->driver->findElement(WebDriverBy::id('submit-button'));

        $feedbackButton->click();
        $textboxInput->sendKeys("This is a very cool website and I am really liking it.");
        $submitButton->click();
        // Wait for success message or redirect (adjust as needed)
        $this->driver->wait(10, 500)->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('success-message'))
        );

        $successMessage = $this->driver->findElement(WebDriverBy::id('success-message'))->getText();
        $this->assertStringContainsString('Feedback submitted successfully', $successMessage);
    }
}