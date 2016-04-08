<?php

use App\models\requests;
use App\Business\DataAccess;

class databaseMedicationTest extends TestCase
{
    /**
     * Test to insert 3
     *
     * @return void
     */
    public function testAdd()
    {

        $list1 = [
            'quantity' => '2',
            'name' => 'test1',
            'email' => 'jane@doe.com',
        ];

        $list2 = [
            'quantity' => '15',
            'name' => 'test2',
            'email' => 'jane@doe.com',
        ];

        $list3 = [
            'quantity' => '12',
            'name' => 'test3',
            'email' => 'jane@doe.com',
        ];


        $testrequests = requests::firstOrCreate($list1);
        $testrequests = requests::firstOrCreate($list2);
        $testrequests = requests::firstOrCreate($list3);

    }

    /**
     * test for seeing properly added
     *
     * @return void
     */
    public function testSeeInDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('requests', ['name' => 'test1']);
        $this->seeInDatabase('requests', ['name' => 'test2']);
        $this->seeInDatabase('requests', ['name' => 'test3']);

    }

    /**
     * test for updating
     *
     * @return void
     */
    public function testUpdate()
    {

        //update first term
        $list1 = [
            'quantity' => '20'
        ];

        requests::where('name', 'test1')
            ->update($list1);

        $testrequests = requests::where('name', 'test1')->firstOrFail();
        $this->assertEquals('25', $testrequests->quantity);
    }


    /**
     * test for deleting
     *
     * @return void
     */
    public function testDelete()
    {
        requests::where('name','test1')->delete();

        requests::where('name','test2')->delete();

        requests::where('name','test3')->delete();

    }
}
