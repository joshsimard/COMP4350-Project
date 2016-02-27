<?php

namespace Facebook\WebDriver;

/********************************************************
 *
 * DEFINE HELPER FUNCTIONS FOR SELENIUM TEST
 *
 *********************************************************/

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

function viewClientList($driver)
{
  //view client list page
  $clientList= $driver->findElement(WebDriverBy::linkText('View Clients'));
  $clientList->click();
  $driver->wait(65);
}

function viewClient($driver, $id)
{
  //view specific client record
  $clientList= $driver->findElement(WebDriverBy::cssSelector('a[href="/visit_form/'.$id.'"]'));
  $clientList->click();
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

function addDoctorNotes($driver, $subject, $body)
{
  //view notes page
  $notes= $driver->findElement(WebDriverBy::cssSelector('a[href="/notes"]'));
  $notes->click();
  $driver->wait(65);

  //view add note page
  $clickAdd= $driver->findElement(WebDriverBy::className('glyphicon-plus'));
  $clickAdd->click();

  //fill in text fields
  $driver->findElement(WebDriverBy::name("subject"))->sendKeys($subject.''.rand());
  $driver->findElement(WebDriverBy::name("body"))->sendKeys($body);

  //save note
  $save = $driver->findElement(WebDriverBy::className('btn'));
  $save->click();

}

function viewDoctorNotes($driver, $max)
{

  //navigate to notes page
  $notes= $driver->findElement(WebDriverBy::cssSelector('a[href="/notes"]'));
  $notes->click();
  $driver->wait(65);

  for($i = 1; $i < $max; $i++)
  {
    $clickNote= $driver->findElement(WebDriverBy::cssSelector('a[id="'.$i.'"]'));
    $clickNote->click(); //open note
    $driver->wait(65);
    $clickNote->click(); //collapse note
  }

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


  $month= date("m");
  $day_s = date("d");

  //click day in calendar
  if($admin == 1)
  {
    $day = $driver->findElement(WebDriverBy::cssSelector('td[data-date="2016-'.$month.'-'.$day_s.'"]'));
  }
  else
  {
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


