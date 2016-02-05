<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Auth;
use App\models\users;

class UserTest extends TestCase
{
    /**
     * A basic test for '/' route.
     *
     * @return void
     */
    public function testHomeRoute()
    {
        $this->visit('/');
    }

    /**
     * A basic test for login.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('/')
            ->type('john@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->click('Logout')
            ->seePageIs('/login');

    }

    /**
     * A basic test for login.
     *
     * @return void
     */
    public function testRegister()
    {
        //clear user
        DB::table('users')->where('email', '=', 'test@user.com')->delete();

        $this->visit('/')
            ->click('Register')
            ->type('Test', 'firstName')
            ->type('user', 'lastName')
            ->type('test@user.com', 'email')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/home')
            ->click('Logout')
            ->seePageIs('/login');

       // $this->seeInDatabase('users', ['email' => 'test@user.com']);
    }

    /**
     * test for seeing user was properly added
     *
     * @return void
     */
    public function testseeInDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('users', ['email' => 'test@user.com']);
    }

    /**
     * view clients form doctorsPage.
     *
     * @return void
     */
    public function testViewClients()
    {

        $this->visit('/')
            ->type('john@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->click('Clients')
            ->seePageIs('/clientlist');
    }



}
