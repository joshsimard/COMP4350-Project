<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\models\ClientList;

class databaseClientTest extends TestCase
{
    /**
     * Test to insert 4 new users
     *
     * @return void
     */
    public function testAdd()
    {
        //clear user for testing
        DB::table('clients')->where('email', '=', 'test@client1.com')->delete();
        DB::table('clients')->where('email', '=', 'test@client2.com')->delete();
        DB::table('clients')->where('email', '=', 'test@client3.com')->delete();

        $list1 = [
            'firstName' => 'test1',
            'lastName' => 'client1',
            'dob' => '1993-02-13',
            'email' => 'test@client1.com',
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
            'email' => 'test@client2.com',
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
            'email' => 'test@client3.com',
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

        $testUser = ClientList::firstOrCreate($list1);
        $testUser = ClientList::firstOrCreate($list2);
        $testUser = ClientList::firstOrCreate($list3);

        $this->seeInDatabase('clients', ['email' => 'test@client1.com']);
        $this->seeInDatabase('clients', ['email' => 'test@client2.com']);
        $this->seeInDatabase('clients', ['email' => 'test@client3.com']);
    }

    /**
     * test for updating users data [updated user 1 & 2]
     *
     * @return void
     */
    public function testUpdate()
    {

        //update user1's admin status
        $list1 = [
            'address' => '24 Thisthat rd'
        ];

        ClientList::where('email', 'test@client1.com')
            ->update($list1);

        $testUser = ClientList::where('email', '=', 'test@client1.com')->firstOrFail();
        $this->assertEquals('24 Thisthat rd', $testUser->address);


        //update user2's last name
        $list2 = [
            'postalCode' => '3w4d6f',
            'maritalStatus' => 'Married',
            'nextOfKin' => 'father'
        ];

        ClientList::where('email', 'test@client2.com')
            ->update($list2);

        $testUser = ClientList::where('email', '=', 'test@client2.com')->firstOrFail();
        $this->assertEquals("3w4d6f", $testUser->postalCode);
        $this->assertEquals("Married", $testUser->maritalStatus);
        $this->assertEquals("father", $testUser->nextOfKin);
    }

    /**
     * test for deleting users data [delete user 3 & 4]
     *
     * @return void
     */
    public function testDelete()
    {
        ClientList::where('email', 'test@client2.com')
            ->delete();

        ClientList::where('email', 'test@client3.com')
            ->delete();


    }
}
