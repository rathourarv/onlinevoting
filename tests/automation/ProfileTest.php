<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase
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
    public function testSuccessfulProfileUpdate(): void
    {

        $this->driver->get('http://localhost:8080/signin');

        log_message('info', 'Test Successful Signin');
        $emailInput = $this->driver->findElement(WebDriverBy::id('email'));
        $passwordInput = $this->driver->findElement(WebDriverBy::name('password'));
        $submitButton = $this->driver->findElement(WebDriverBy::id('submit-button'));

        $emailInput->sendKeys('testuser@example.com');
        $passwordInput->sendKeys('P@$$wOrd');

        $submitButton->click();

        $this->driver->get('http://localhost:8080/profile');

        $firstNameInput = $this->driver->findElement(WebDriverBy::id('first_name'));
        $lastNameInput = $this->driver->findElement(WebDriverBy::id('last_name'));
        $usernameInput = $this->driver->findElement(WebDriverBy::id('username'));
        $mobileInput = $this->driver->findElement(WebDriverBy::id('mobile'));
        $submitButton = $this->driver->findElement(WebDriverBy::className('update-profile-button'));

        $firstNameInput->clear();
        $firstNameInput->sendKeys("updated first Name");
        $lastNameInput->clear();
        $lastNameInput->sendKeys("updated last Name");
        $usernameInput->clear();
        $usernameInput->sendKeys("updated username");
        $mobileInput->clear();
        $mobileInput->sendKeys(9876567890);

        $submitButton->click();
        // Wait for success message or redirect (adjust as needed)
        $this->driver->wait(10, 500)->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('success-message'))
        );

        $successMessage = $this->driver->findElement(WebDriverBy::id('success-message'))->getText();
        $this->assertStringContainsString('Profile updated successfully', $successMessage);
    }
}