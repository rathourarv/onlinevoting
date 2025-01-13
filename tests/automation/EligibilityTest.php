<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class EligibilityTest extends TestCase
{
    private $driver;

    protected function setUp(): void
    {
        $host = 'http://localhost:4444/wd/hub';
        $options = new ChromeOptions();
        // Add any Chrome options if needed (e.g., headless mode)
        $options->addArguments(['--disable-dev-shm-usage', '--remote-debugging-port=9222']);
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }
    protected function tearDown(): void
    {
        $this->driver->quit();
    }
    public function testUpdateEligibilityForm()
    {
        $this->driver->get('http://localhost:8080/signin');

        log_message('info', 'Test Successful Signin');
        $emailInput = $this->driver->findElement(WebDriverBy::id('email'));
        $passwordInput = $this->driver->findElement(WebDriverBy::name('password'));
        $submitButton = $this->driver->findElement(WebDriverBy::id('submit-button'));

        log_message('info', 'found ids');
        $emailInput->sendKeys('testuser@example.com');
        $passwordInput->sendKeys('P@$$wOrd');

        $submitButton->click();

        // Navigate to the eligibility form page
        $this->driver->get('http://localhost:8080/eligibility');

        // Fill in the form fields
        $this->driver->findElement(WebDriverBy::id('firstName'))->sendKeys('John');
        $this->driver->findElement(WebDriverBy::id('lastName'))->sendKeys('Doe');
        $this->driver->findElement(WebDriverBy::id('gender'))->sendKeys('Male');
        $this->driver->findElement(WebDriverBy::id('address1'))->sendKeys('123 Main St');
        $this->driver->findElement(WebDriverBy::id('address2'))->sendKeys('Apt 101');
        $this->driver->findElement(WebDriverBy::id('city'))->sendKeys('Anytown');
        $this->driver->findElement(WebDriverBy::id('state'))->click();
        $this->driver->findElement(WebDriverBy::xpath('//select[@id="state"]/option[text()="Uttar Pradesh"]'))->click();
        $this->driver->findElement(WebDriverBy::id('zip'))->clear()->sendKeys('208020');
        $this->driver->findElement(WebDriverBy::id('dob'))->sendKeys('1990-01-01');
        $this->driver->findElement(WebDriverBy::id('constituencyID'))->sendKeys('1');
        $this->driver->findElement(WebDriverBy::id('voterIDCard'))->clear()->sendKeys('9876789098');
        $this->driver->findElement(WebDriverBy::id('aadharNumber'))->clear()->sendKeys('123456789012');

        // Submit the form
        $this->driver->findElement(WebDriverBy::className('update-profile-button'))->click();

        $this->driver->wait(10, 500)->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('success-message'))
        );

        $successMessage = $this->driver->findElement(WebDriverBy::id('success-message'))->getText();
        $this->assertStringContainsString('Eligibility submitted successfully', $successMessage);
    }
}
