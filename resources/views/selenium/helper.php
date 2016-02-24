<?php
// An example of using php-webdriver.

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;


function login($driver, $email, $password)
{
  //input login credentials
  $driver->findElement(WebDriverBy::name("email"))->sendKeys($email);
  $driver->wait(5);
  $driver->findElement(WebDriverBy::name("password"))->sendKeys($password);

  // click the link 'Login'
  $login = $driver->findElement(WebDriverBy::className('btn-circle'));
  $login->click();
}


function logout($driver)
{
  //click dropdown
  $dropdown = $driver->findElement(WebDriverBy::className('dropdown'));
  $dropdown->click();

  $driver->wait(5);

  //logout
  $logout = $driver->findElement(WebDriverBy::className('fa-sign-out'));
  $logout->click();
}

function registerClient($driver, $firstName, $lastName, $email, $password)
{
  //navigate to register page
  $register_link = $driver->findElement(WebDriverBy::linkText('Register'));
  $register_link->click();

  //fill in the fields
  $driver->findElement(WebDriverBy::name("firstName"))->sendKeys($firstName);
  $driver->wait(5);
  $driver->findElement(WebDriverBy::name("lastName"))->sendKeys($lastName);
  $driver->wait(5);
  $driver->findElement(WebDriverBy::name("email"))->sendKeys($email);
  $driver->wait(5);
  $driver->findElement(WebDriverBy::name("password"))->sendKeys($password);
  $driver->wait(5);
  $driver->findElement(WebDriverBy::name("password_confirmation"))->sendKeys($password);

  // click the link 'Login'
  $register = $driver->findElement(WebDriverBy::className('btn-circle'));
  $register->click();
}

