<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Exception\ExpectedException;
use Facebook\WebDriver\Exception\UnexpectedAlertOpenException;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
include(__DIR__.'/helper.php');
/********************************************************
 *
 * DEFINE GLOBALS
 *
 *********************************************************/
//start broswer with 5 second timeout
$chrome = 'http://localhost:9515';
$firefox = 'http://localhost:4444/wd/hub';
$host = $firefox; // this is the default
$capabilities = DesiredCapabilities::firefox();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);
$driver->manage()->timeouts()->implicitlyWait(60);
$driver->get('http://ec2-52-32-93-246.us-west-2.compute.amazonaws.com/login');
/********************************************************
 *
 * DEFINE TEST FUNCTIONS
 *
 *********************************************************/
function loginAsDoctor($driver)
{
    login($driver, "john@Doe.com", "password");
    echo "Passed Test - Login As Doctor <br>";
}
function loginAsClient($driver)
{
    login($driver, "jane@Doe.com", "password");
    echo "Passed Test - Login As Client <br>";
}
function testDoctorAppointment($driver)
{
    addAppointment($driver, "Netfix Chilled", 1);
    $driver->wait(60);
    echo "Passed Test - View & Add Doctors Appointment <br>";
}
function testViewClientList($driver)
{
    viewClientList($driver);
    echo "Passed Test  - View Client List <br>";
}
function testViewDetailedClient($driver)
{
    viewClient($driver, '2');
    goHome($driver);
    echo "Passed Test - View Detailed Record of a Client <br>";
}
function testViewMedicalTerms($driver)
{
    viewTerms($driver);
    echo "Passed Test - View Medical Terms <br>";
}
function testViewMedications($driver)
{
    viewMedications($driver);
    echo "Passed Test - View Medication List <br>";
}
function testOrderMedication($driver)
{
    orderMedications($driver, "test1234");
    echo "Passed Test - Order Medication <br>";
}
function testCreateRequest($driver)
{
    createRequest($driver, "help");
    echo "Passed Test - Create Request <br>";
}
function testViewRequest($driver)
{
    viewRequest($driver, "help");
    echo "Passed Test - View Request <br>";
}
function testAddDoctorsNote($driver)
{
    addDoctorNotes($driver, "Selenium", "Testing this notes, so we get full marks, because that is important");
    goHome($driver);
    echo "Passed Test  - Add Doctor's Note <br>";
}
function testViewDoctorNotes($driver)
{
    viewDoctorNotes($driver, 5);
    goHome($driver);
    echo "Passed Test - View Doctor's Notes <br>";
}
function testEditClientInfo($driver)
{
    editClientInfo($driver, "Nigeria", "Rivers", "080-419-3892", "Hacker", "Single");
    echo "Passed Test  - Edit Client Record <br>";
}
function testViewSetClientAppointment($driver)
{
    addAppointment($driver, "Headache", 0);
    $driver->wait(60);
    echo "Passed Test - View & Add Client Appointment <br>";
}
/********************************************************
 *
 * RUN USER STORY TESTS
 *
 *********************************************************/

echo "Begin Tests... <br><br>";
//Test1 - Login as Doctor
loginAsDoctor($driver);
//Test 2 - View and Add Doctor Appointment
testDoctorAppointment($driver);
//Test 3 - View Clients List
testViewClientList($driver);
//Test 4 - View detailed record of one client
testViewDetailedClient($driver);
//Test 5 - Add Doctor's Notes
testAddDoctorsNote($driver);
//Test 6 - View some Doctors Notes
testViewDoctorNotes($driver);
//Test 7 - View Medication List
testViewMedications($driver);
////Test 8 - Order Medications
testOrderMedication($driver);
logout($driver);
//Test 9 - Login as Client
loginAsClient($driver);
//Test 10 - Edit Client info
testEditClientInfo($driver);
//Test 11 - View and Set Appointment with doctor
testViewSetClientAppointment($driver);
//Test 12 - View Medical Terms
testViewMedicalTerms($driver);
logout($driver);
//Test 13 - Create Requests
loginAsClient($driver);
testCreateRequest($driver);
logout($driver);
//Test 14 - View Requests
loginAsDoctor($driver);
testViewRequest($driver);
logout($driver);
//close browser
echo "<br>Done Tests <br>";
$driver->quit();