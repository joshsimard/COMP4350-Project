<?php


namespace Facebook\WebDriver;

use Facebook\WebDriver\Exception\ExpectedException;
use Facebook\WebDriver\Exception\UnexpectedAlertOpenException;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Mockery\CountValidator\Exception;

include(__DIR__.'/helper.php');

// start Chrome with 5 second timeout
$firefox = 'http://localhost:4444/wd/hub';
$chrome = 'http://localhost:9515';

$host = $firefox;//$chrome; // this is the default
$capabilities = DesiredCapabilities::firefox();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);
$driver->manage()->timeouts()->implicitlyWait(60);
// int url
$driver->get('http://ec2-52-32-93-246.us-west-2.compute.amazonaws.com/login');

/********************************************************
 *
 * DEFINE TEST FUNCTIONS
 *
 *********************************************************/

function loginAsDoctor($driver)
{
    login($driver, "john@Doe.com", "password");

    echo "Passed Test 1 - Login As Doctor <br>";
}

function loginAsClient($driver)
{
    login($driver, "jane@Doe.com", "password");

    echo "Passed Test 4 - Login As Client <br>";
}

function addClients($driver)
{
    //add 5 clients to db
    for($i = 0; $i < 5; $i++)
    {
        registerClient($driver, "Selenium", 'Tester', 'sele@test.com', 'password');
        logout($driver);
    }

}



/********************************************************
 *
 * RUN USER STORY TESTS
 *
 *********************************************************/

//Test1 - Login as Doctor
loginAsDoctor($driver);



//Test 2 - View and Add Doctor Appointment
addAppointment($driver, "Netfix Chilled", 1);
$driver->wait(60);
echo "Passed Test 2 - View & Add Appointment <br>";



//Test 3 - View Clients List
viewClients($driver);
echo "Passed Test 3 - View Client List <br>";
logout($driver);


//Detailed Client Record - Almost done


//Notes - Almost done



//Test4 - Login as Client
loginAsClient($driver);


//Test5 - Edit Client info
editClientInfo($driver, "Nigeria", "Rivers", "080-419-3892", "Hacker", "Single");
echo "Passed Test 5 - Edit Client Record <br>";


//Test 6 - View and Set Appointment with doctor
addAppointment($driver, "Headache", 0);
$driver->wait(60);
echo "Passed Test 6 - View & Add Appointment <br>";



logout($driver);



echo "Done <br>";



//close the Chrome
$driver->quit();
