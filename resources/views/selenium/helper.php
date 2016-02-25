<?php
// An example of using php-webdriver.

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Exception\ExpectedException;
use Facebook\WebDriver\Exception\UnexpectedAlertOpenException;


function login($driver, $email, $password)
{
  //input login credentials
  $driver->findElement(WebDriverBy::name("email"))->sendKeys($email);
  $driver->wait(65);
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

  $driver->wait(65);

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
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("lastName"))->sendKeys($lastName);
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("email"))->sendKeys($email);
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("password"))->sendKeys($password);
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("password_confirmation"))->sendKeys($password);

  // click the link 'Login'
  $register = $driver->findElement(WebDriverBy::className('btn-circle'));
  $register->click();
}

function viewClients($driver)
{
  //view calendar page
  $calendar= $driver->findElement(WebDriverBy::linkText('View Clients'));
  $calendar->click();
  $driver->wait(65);
}

function goHome($driver)
{
  $home= $driver->findElement(WebDriverBy::className('navbar-brand'));
  $home->click();

}

function editClientInfo($driver, $country, $state, $phone, $occupation, $status)
{
  //view calendar page
  $edit= $driver->findElement(WebDriverBy::linkText('Edit Information'));
  $edit->click();
  $driver->wait(65);

  //fill in the fields
  $driver->findElement(WebDriverBy::name("phone"))->clear();
  $driver->findElement(WebDriverBy::name("phone"))->sendKeys($phone);
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("country"))->clear();
  $driver->findElement(WebDriverBy::name("country"))->sendKeys($country);
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("state"))->clear();
  $driver->findElement(WebDriverBy::name("state"))->sendKeys($state);
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("occupation"))->clear();
  $driver->findElement(WebDriverBy::name("occupation"))->sendKeys($occupation);
  $driver->wait(65);
  $driver->findElement(WebDriverBy::name("status"))->clear();
  $driver->findElement(WebDriverBy::name("status"))->sendKeys($status);

  //save record
  $save = $driver->findElement(WebDriverBy::className('btn'));
  $save->click();


}

function addAppointment($driver, $title, $admin)
{
  //view calendar page
  if($admin == 1)
    $calendar= $driver->findElement(WebDriverBy::linkText('Calendar'));
  else
    $calendar= $driver->findElement(WebDriverBy::linkText('View/Set Appointment'));

  $calendar->click();
  $driver->wait(65);

  //click day in calendar
  if($admin == 1)
  {
    $day = $driver->findElement(WebDriverBy::cssSelector('.fc-widget-content'));
  }
  else
  {
    $day_s = date("d")+1;
    $month= date("m");
    $day = $driver->findElement(WebDriverBy::cssSelector('td[data-date="2016-'.$month.'-'.$day_s.'"]'));
  }
  $day->click();


  //add appointment title to prompt
  $driver->switchTo()->alert()->sendKeys($title);
  $driver->wait(65);
  $driver->switchTo()->alert()->accept();
  $driver->wait(65);
  goHome($driver);

}


