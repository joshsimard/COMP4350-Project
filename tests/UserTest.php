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
     * User Story: Enable authentication of Clients and
     *             Doctors to through login page and database
     *             records.
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
     * A basic test for Register.
     *
     * User Story: Add clients through user interface to database.
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
    }


    /**
     * view clients form doctorsPage.
     *
     * User Story: Enable doctors to view list of client records.
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


    /**
     * edit clients form clientPage.
     * updated jane doe's gender to female
     *
     * User Story: Enable editing of client records created,
     *             such as editing name, medication and appointment.
     *
     * @return void
     */
    public function testEditClients()
    {

        $this->visit('/')
            ->type('jane@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->click('Edit Information')
            ->seePageIs('/client_form')
            ->type('female', 'gender')
            ->press('Save')
            ->seePageIs('/home');
    }



}
