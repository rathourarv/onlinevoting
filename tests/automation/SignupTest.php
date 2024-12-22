<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use PHPUnit\Framework\TestCase;

class SignupTest extends TestCase
{
    /** @var RemoteWebDriver */
    protected $driver;

    protected function setUp(): void
    {
        log_message('info', 'Setup called');
        $host = 'http://localhost:4444/wd/hub'; // Selenium Server URL

        $options = new ChromeOptions();
        // Add any Chrome options if needed (e.g., headless mode)
        $options->addArguments(['--disable-dev-shm-usage', '--no-sandbox']);

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
    public function testSuccessfulSignup(): void
    {
        $this->driver->get('http://localhost:8080/signup');

        log_message('info', 'Test Successful Signup');
        $firstNameInput = $this->driver->findElement(WebDriverBy::id('firstName'));
        $lastNameInput = $this->driver->findElement(WebDriverBy::name('lastName'));
        $emailInput = $this->driver->findElement(WebDriverBy::id('email'));
        $passwordInput = $this->driver->findElement(WebDriverBy::id('password'));
        $submitButton = $this->driver->findElement(WebDriverBy::id('submitButton'));

        log_message('info', 'found ids');
        $firstNameInput->sendKeys('Test');
        $lastNameInput->sendKeys('User');
        $emailInput->sendKeys('testuser' . time() . '@example.com');
        $passwordInput->sendKeys('P@$$wOrd');
        $submitButton->click();

        // Wait for success message or redirect (adjust as needed)
        $this->driver->wait(10, 500)->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('successMessage'))
        );

        $successMessage = $this->driver->findElement(WebDriverBy::id('successMessage'))->getText();
        $this->assertStringContainsString('Signup successful', $successMessage);
    }
    public function testInvalidEmailFormat(): void
    {
        $this->driver->get('YOUR_SIGNUP_PAGE_URL');

        $emailInput = $this->driver->findElement(WebDriverBy::id('email'));
        $submitButton = $this->driver->findElement(WebDriverBy::id('submitButton'));

        $emailInput->sendKeys('invalid-email');
        $submitButton->click();

        // Wait for the error message
        $this->driver->wait(10, 500)->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('emailError'))
        );
        $errorMessage = $this->driver->findElement(WebDriverBy::id('emailError'))->getText();
        $this->assertStringContainsString('Invalid email format', $errorMessage);
    }
    public function testEmptyFields(): void
    {
        $this->driver->get('YOUR_SIGNUP_PAGE_URL');
        $submitButton = $this->driver->findElement(WebDriverBy::id('submitButton'));
        $submitButton->click();

        // Check for error messages near each field or a general error
        $this->driver->wait(10, 500)->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('firstNameError')) //Example error
        );
        $firstNameError = $this->driver->findElement(WebDriverBy::id('firstNameError'))->getText();
        $this->assertStringContainsString('First name is required', $firstNameError);

    }
}