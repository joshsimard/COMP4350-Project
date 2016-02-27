<?php


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
     * test only access through login
     *
     * @return void
     */
    public function testAccess()
    {
        $this->visit('/')
            ->seePageIs('/login')
            ->visit('/home')
            ->seePageIs('/login')
            ->visit('/clientlist')
            ->seePageIs('/login')
            ->visit('/client_form')
            ->seePageIs('/login')
            ->visit('/visit_form')
            ->seePageIs('/login')
            ->visit('/client_info')
            ->seePageIs('/login')
            ->visit('/calendar')
            ->seePageIs('/login')
            ->visit('/add/event')
            ->seePageIs('/login')
            ->visit('/appointments_list')
            ->seePageIs('/login')
            ->visit('/orders')
            ->seePageIs('/login')
            ->visit('/notes')
            ->seePageIs('/login')
            ->visit('/add/note')
            ->seePageIs('/login')
            ->visit('/settings')
            ->seePageIs('/login');
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

            //bad login
            ->press('Login')
            ->seePageIs('/login')

            //wrong password
            ->type('john@doe.com', 'email')
            ->type('123', 'password')
            ->press('Login')
            ->seePageIs('/login')

            //good login
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

        //try to register w/o all the fields
        $this->visit('/')
            ->click('Register')
            ->press('Register')
            ->seePageIs('/register')

            //mismatched password
            ->type('Test', 'firstName')
            ->type('user', 'lastName')
            ->type('test@user.com', 'email')
            ->type('password', 'password')
            ->type('123', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register');

        //good register
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

        //find in database
        $this->seeInDatabase('users', ['firstName' => 'Test']);
        $this->seeInDatabase('users', ['lastName' => 'user']);
        $this->seeInDatabase('users', ['email' => 'test@user.com']);
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
            ->seePageIs('/clientlist')

            //Jane doe is a basic user. We can check to see if she shows up
            ->see('Name: Jane Doe')
            ->see('Email: jane@doe.com');
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
            ->select('female', 'sex')
            ->select('1993','year')
            ->select('02','month')
            ->select('13','day')
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
            ->seePageIs('/home')
            ->click('Logout')
            ->seePageIs('/login');

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

    public function testViewAppointments()
    {
        //from doctors side
        $this->visit('/')
            ->type('john@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->click('Calendar')
            ->seePageIs('/calendar');
    }

    public function testAddDoctorsNote()
    {
        $this->visit('/')
            ->type('john@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->click('Notes and Messages')
            ->seePageIs('/notes')
            ->click('addNote')
            ->type('Integration Test','subject')
            ->select('Just so we get our marks and pass Comp 4350, hopefully an A-A+', 'body')
            ->press('Submit')
            ->seePageIs('/notes');

        //check the database
        $this->seeInDatabase('notes', ['subject' => 'Integration Test']);
        $this->seeInDatabase('notes', ['body' => 'Just so we get our marks and pass Comp 4350, hopefully an A-A+']);
    }

    public function testViewDoctorsNotes()
    {
        //view 5 doctor notes
        $this->visit('/')
            ->type('john@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->click('Notes and Messages')
            ->seePageIs('/notes')
            ->click('1')
            ->click('1')
            ->click('2')
            ->click('2')
            ->click('3')
            ->click('3')
            ->click('4')
            ->click('4')
            ->click('5')
            ->click('5')
            ->seePageIs('/notes');
    }

    public function testNavigation()
    {
        //test doctor links
        $this->visit('/')
            ->type('john@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home');


        //now test all the links
        $this->visit('/home')
            ->click('Calendar')
            ->seePageIs('/calendar');


        $this->visit('/home')
            ->click('Notes and Messages')
            ->seePageIs('/notes')
            //->click("add_note")
            //->seePageIs('/add/note')
            ->click('Logout')
            ->seePageIs('/login');

        //test client links
        $this->visit('/')
            ->type('jane@doe.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home')

        //now test all the links
            ->click('View/Set Appointment')
            ->seePageIs('/calendar');
    }

}
