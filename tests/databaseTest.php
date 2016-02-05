<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Auth;
use App\models\users;

class databaseTest extends TestCase
{
    /**
     * A basic test to insert and delete.
     *
     * @return void
     */
    public function testAdd()
    {
        //clear user for testing
        DB::table('users')->where('email', '=', 'test@user2.com')->delete();

        $list = [
            'firstName' => 'test',
            'lastName' => 'user2',
            'email' => 'test@user2.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0'
        ];
        $testUser = users::firstOrCreate($list);
    }

    /**
     * test for seeing user was properly added
     *
     * @return void
     */
    public function testseeInDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('users', ['email' => 'test@user2.com']);
    }

    public function testUpdate()
    {

        $list = [
            'firstName' => 'test',
            'lastName' => 'user',
            'email' => 'test@user2.com',
            'password' => bcrypt('password'),
            'admin' => '1',
            'firstEdit' => '0'
        ];

        users::where('email', 'test@user2.com')
            ->update($list);

        $testUser = users::where('email', '=', 'test@user2.com')->firstOrFail();
        $this->assertEquals(1, $testUser->admin);
    }

    public function testdelete()
    {

        $list = [
            'firstName' => 'test',
            'lastName' => 'user',
            'email' => 'test@user2.com',
            'password' => bcrypt('password'),
            'admin' => '1',
            'firstEdit' => '0'
        ];

        users::where('email', 'test@user2.com')
            ->delete();

    }
}
