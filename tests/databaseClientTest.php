<?php

use App\models\ClientList;
use App\models\users;
use App\Business\DataAccess;

class databaseClientTest extends TestCase
{
    /**
     * Test to insert 4 new users
     *
     * @return void
     */
    public function testRegiterAndSaveClientRecords()
    {

        $dataAccess = new DataAccess();

        $list1 = [
            'firstName' => 'test1',
            'lastName' => 'client1',
            'dob' => '1993-02-13',
            'email' => 'test@client11.com',
            'gender' => 'female',
            'height' => '80',
            'weight' => '200',
            'mobileNum' => '2045649283',
            'homeNum' => '2048598372',
            'address' => '24 Thisway rd',
            'city' => 'Winnipeg',
            'postalCode' => '6d7g8h',
            'state' => 'North Dakota',
            'country' => 'US',
            'occupation' => 'dancer',
            'maritalStatus' => 'Single',
            'nextOfKin' => 'son'
        ];

        $list2 = [
            'firstName' => 'test2',
            'lastName' => 'client2',
            'dob' => '1991-07-19',
            'email' => 'test@client22.com',
            'gender' => '',
            'height' => '',
            'weight' => '',
            'mobileNum' => '',
            'homeNum' => '',
            'address' => '',
            'city' => '',
            'postalCode' => '',
            'state' => '',
            'country' => '',
            'occupation' => '',
            'maritalStatus' => '',
            'nextOfKin' => ''
        ];

        $list3 = [
            'firstName' => 'test3',
            'lastName' => 'client3',
            'dob' => '1945-11-06',
            'email' => 'test@client33.com',
            'gender' => 'male',
            'height' => '100',
            'weight' => '220',
            'mobileNum' => '2045768472',
            'homeNum' => '',
            'address' => '',
            'city' => '',
            'postalCode' => '7g8h9j',
            'state' => '',
            'country' => '',
            'occupation' => '',
            'maritalStatus' => 'Single',
            'nextOfKin' => 'mother'
        ];

        //register user
        $dataAccess->register($list1);
        $dataAccess->register($list2);
        $dataAccess->register($list3);

        //save to client table
        $dataAccess->clientInfoSave($list1, 'test@client11.com');
        $dataAccess->clientInfoSave($list2, 'test@client22.com');
        $dataAccess->clientInfoSave($list3, 'test@client33.com');


        $this->seeInDatabase('clients', ['email' => 'test@client11.com']);
        $this->seeInDatabase('clients', ['email' => 'test@client22.com']);
        $this->seeInDatabase('clients', ['email' => 'test@client33.com']);
    }

    /**
     * test getting patient record with user id
     *
     * @return void
     */
    public function testGetPatientRecordWithID()
    {
        $dataAccess = new DataAccess();

        //get patient with id == 1
        $this->assertNotEquals(null,  $dataAccess->getPatient(1));
        $this->assertNotEquals(null,  $dataAccess->getPatient(2));
        $this->assertNotEquals(null,  $dataAccess->getPatient(3));
        $this->assertNotEquals(null,  $dataAccess->getPatient(4));
        $this->assertNotEquals(null,  $dataAccess->getPatient(5));
    }

    /**
    * test getting client list
    *
    * @return void
    */
    public function testGeClientList()
    {
        $dataAccess = new DataAccess();
        $clients =  $dataAccess->getClientsFromUsers();

        //check that client list is not empty
        $this->assertNotEquals(null, $clients);

        //test that there are at least 10 clients after seed
        for($i = 0; $i < 10; $i++)
        {
            $this->assertNotEquals(null,  $clients[$i]);
        }

    }

    public function testUpdateClientRecord()
    {

        $dataAccess = new DataAccess();

        $list1 = [
            'userid' => $dataAccess->userIdByEmail("test@client11.com"),
            'city' => 'Winnipeg',
            'postalCode' => 'R3T2Z6',
            'state' => 'Manitoba',
            'country' => 'Canada',
            'occupation' => "Student",
            'maritalStatus' => "Single"
        ];

        $list2 = [
            'userid' => $dataAccess->userIdByEmail("test@client22.com"),
            'city' => 'PortHarcourt',
            'postalCode' => 'LOL',
            'state' => 'Rivers',
            'country' => 'Nigeria',
            'occupation' => "Student",
            'maritalStatus' => "Single"
        ];

        $list3 = [
            'userid' => $dataAccess->userIdByEmail("test@client33.com"),
            'city' => 'Oakbank',
            'postalCode' => 'R3T2Z6',
            'state' => 'Manitoba',
            'country' => 'Canada',
            'occupation' => "Farmer",
            'maritalStatus' => "Married"
        ];

        $dataAccess->clientInfoSave($list1, 'test@client11.com');
        $dataAccess->clientInfoSave($list2, 'test@client22.com');
        $dataAccess->clientInfoSave($list3, 'test@client33.com');

        //assert that users are in the database
        $this->assertNotEquals(null,  $dataAccess->getPatient($dataAccess->userIdByEmail("test@client11.com")));
        $this->assertNotEquals(null,  $dataAccess->getPatient($dataAccess->userIdByEmail("test@client22.com")));
        $this->assertNotEquals(null,  $dataAccess->getPatient($dataAccess->userIdByEmail("test@client33.com")));


        //check that the info in the database is updated with what we added
        $testUser = ClientList::where('email', '=', 'test@client11.com')->firstOrFail();
        $this->assertEquals('Winnipeg', $testUser->city);
        $this->assertEquals('R3T2Z6', $testUser->postalCode);
        $this->assertEquals('Manitoba', $testUser->state);
        $this->assertEquals('Canada', $testUser->country);
        $this->assertEquals('Student', $testUser->occupation);
        $this->assertEquals('Single', $testUser->maritalStatus);

        $testUser = ClientList::where('email', '=', 'test@client22.com')->firstOrFail();
        $this->assertEquals('PortHarcourt', $testUser->city);
        $this->assertEquals('LOL', $testUser->postalCode);
        $this->assertEquals('Rivers', $testUser->state);
        $this->assertEquals('Nigeria', $testUser->country);
        $this->assertEquals('Student', $testUser->occupation);
        $this->assertEquals('Single', $testUser->maritalStatus);

        $testUser = ClientList::where('email', '=', 'test@client33.com')->firstOrFail();
        $this->assertEquals('Oakbank', $testUser->city);
        $this->assertEquals('R3T2Z6', $testUser->postalCode);
        $this->assertEquals('Manitoba', $testUser->state);
        $this->assertEquals('Canada', $testUser->country);
        $this->assertEquals('Farmer', $testUser->occupation);
        $this->assertEquals('Married', $testUser->maritalStatus);

    }

    /**
     * test for getting clients through RESTFUL API
     *
     * @return void
     */
    public function testGetClientRecordApi()
    {
        $dataAccess = new DataAccess();

        //assert that it does not return an empty list of clients
        $this->assertNotEquals(null, $dataAccess->getClientsApi());

        //get detailed client through id, assert its not null
        $this->assertNotEquals(null, $dataAccess->getDetailedClientsApi($dataAccess->userIdByEmail('test@client33.com')));

        //get clients vists, assert its not null
        $this->assertNotEquals(null, $dataAccess->getVisits(1));

    }

    /**
     * test for deleting users data
     *
     * @return void
     */
    public function testDelete()
    {
        //delete record
        ClientList::where('email', 'test@client11.com')->delete();
        users::where('email', 'test@client11.com')->delete();


        ClientList::where('email', 'test@client22.com')->delete();
        users::where('email', 'test@client22.com')->delete();

        ClientList::where('email', 'test@client33.com')->delete();
        users::where('email', 'test@client33.com')->delete();


        //assert records are not in database
        $this->dontSeeInDatabase('clients', ['email' => 'test@client11.com']);
        $this->dontSeeInDatabase('clients', ['email' => 'test@client22.com']);
        $this->dontSeeInDatabase('clients', ['email' => 'test@client33.com']);

    }

}
