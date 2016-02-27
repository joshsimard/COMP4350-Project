<?php

use App\models\users;
use App\Business\DataAccess;

class databaseTest extends TestCase
{
    /**
     * Test to insert 4 new users
     *
     * @return void
     */
    public function testAdd()
    {
        //clear user for testing
        DB::table('users')->where('email', '=', 'test@user1.com')->delete();
        DB::table('users')->where('email', '=', 'test@user2.com')->delete();
        DB::table('users')->where('email', '=', 'test@user3.com')->delete();
        DB::table('users')->where('email', '=', 'test@user4.com')->delete();

        $list1 = [
            'firstName' => 'test1',
            'lastName' => 'user1',
            'email' => 'test@user1.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0'
        ];

        $list2 = [
            'firstName' => 'test2',
            'lastName' => 'user2',
            'email' => 'test@user2.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0'
        ];

        $list3 = [
            'firstName' => 'test3',
            'lastName' => 'user3',
            'email' => 'test@user3.com',
            'password' => bcrypt('password'),
            'admin' => '1',
            'firstEdit' => '0'
        ];

        $list4 = [
            'firstName' => 'test4',
            'lastName' => 'user4',
            'email' => 'test@user4.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0'
        ];

        $testUser = users::firstOrCreate($list1);
        $testUser = users::firstOrCreate($list2);
        $testUser = users::firstOrCreate($list3);
        $testUser = users::firstOrCreate($list4);
    }

    /**
     * test for seeing users was properly added
     *
     * @return void
     */
    public function testSeeInDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('users', ['email' => 'test@user1.com']);
        $this->seeInDatabase('users', ['email' => 'test@user2.com']);
        $this->seeInDatabase('users', ['email' => 'test@user3.com']);
        $this->seeInDatabase('users', ['email' => 'test@user4.com']);
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
            'admin' => '1'
        ];

        users::where('email', 'test@user1.com')
            ->update($list1);

        $testUser = users::where('email', '=', 'test@user1.com')->firstOrFail();
        $this->assertEquals(1, $testUser->admin);


        //update user2's last name
        $list2 = [
            'lastName' => 'UsserD2'
        ];

        users::where('email', 'test@user2.com')
            ->update($list2);

        $testUser = users::where('email', '=', 'test@user2.com')->firstOrFail();
        $this->assertEquals("UsserD2", $testUser->lastName);
    }

    /**
     * test for saving events through data access
     *
     * @return void
     */
    public function testDataAccessEventMethod()
    {
        $dataAccess = new DataAccess();

        //save event to database
        $dataAccess->eventSave($dataAccess->userIdByEmail("test@user1.com"), "Test1", "Sat Mar 12 2016 11:30:00 GMT+0000",
            "Sat Mar 12 2016 11:30:00 GMT+0000", "test@user1.com", "user1");

        $dataAccess->eventSave($dataAccess->userIdByEmail("test@user2.com"), "Test2", "Sun Mar 13 2016 11:30:00 GMT+0000",
            "Sun Mar 13 2016 11:30:00 GMT+0000", "test@user2.com", "user1");

        $dataAccess->eventSave($dataAccess->userIdByEmail("test@user3.com"), "Test3","Mon Mar 14 2016 11:30:00 GMT+0000",
            "Mon Mar 14 2016 11:30:00 GMT+0000", "test@user3.com", "user1");

        $this->seeInDatabase('calendar', ['title' => 'Test1']);
        $this->seeInDatabase('calendar', ['title' => 'Test2']);
        $this->seeInDatabase('calendar', ['title' => 'Test3']);

    }

    /**
     * test for deleting users data [delete user 3 & 4]
     *
     * @return void
     */
    public function testDelete()
    {
        users::where('email', 'test@user3.com')
            ->delete();

        users::where('email', 'test@user4.com')
            ->delete();


    }
}
