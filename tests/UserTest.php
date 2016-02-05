<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Auth;
use App\models\users;
use App\models\ClientList;

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
            ->type('1993-02-13', 'dob')
            ->type('92', 'height')
            ->type('200', 'weight')
            ->type('2043918349', 'phone')
            ->type('2048573942', 'home_phone')
            ->type('44 Jubinville Bay', 'address')
            ->type('Winnipeg', 'city')
            ->type('Canada', 'country')
            ->type('r3j4k0', 'postal_code')
            ->type('Iowa', 'state')
            ->type('Singer', 'occupation')
            ->type('Single', 'status')
            ->type('Mom', 'next_kin')
            ->press('Save')
            ->seePageIs('/home');

        //check the database
        $this->seeInDatabase('clients', ['gender' => 'female']);
        $this->seeInDatabase('clients', ['dob' => '1993-02-13']);
        $this->seeInDatabase('clients', ['height' => '92']);
        $this->seeInDatabase('clients', ['weight' => '200']);
        $this->seeInDatabase('clients', ['mobileNum' => '2043918349']);
        $this->seeInDatabase('clients', ['homeNum' => '2048573942']);
        $this->seeInDatabase('clients', ['address' => '44 Jubinville Bay']);
        $this->seeInDatabase('clients', ['city' => 'Winnipeg']);
        $this->seeInDatabase('clients', ['country' => 'Canada']);
        $this->seeInDatabase('clients', ['postalCode' => 'r3j4k0']);
        $this->seeInDatabase('clients', ['state' => 'Iowa']);
        $this->seeInDatabase('clients', ['occupation' => 'Singer']);
        $this->seeInDatabase('clients', ['maritalStatus' => 'Single']);
        $this->seeInDatabase('clients', ['nextOfKin' => 'Mom']);
    }



}
