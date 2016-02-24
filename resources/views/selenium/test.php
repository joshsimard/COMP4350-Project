<?php


namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
include(__DIR__.'/helper.php');

// start Chrome with 5 second timeout
//$firefox = 'http://localhost:4444/wd/hub';
$chrome = 'http://localhost:9515';

$host = $chrome; // this is the default
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);

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

    //view clients

    logout($driver);
    echo "Passed Test 1 - Login As Doctor <br>";
}

function loginAsClient($driver)
{
    login($driver, "jane@Doe.com", "password");
    logout($driver);
    echo "Passed Test 2 - Login As Client <br>";
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

//Test1
loginAsDoctor($driver);

//Test2
loginAsClient($driver);

//Test3
//addClients($driver);

echo "Done <br>";

// close the Chrome
$driver->quit();
