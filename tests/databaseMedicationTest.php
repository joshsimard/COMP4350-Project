<?php

use App\models\Medication;
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
            'quantity' => '23',
            'name' => 'test1',
        ];

        $list2 = [
            'quantity' => '15',
            'name' => 'test2',
        ];

        $list3 = [
            'quantity' => '45',
            'name' => 'test3',
        ];


        $testMedication = Medication::firstOrCreate($list1);
        $testMedication = Medication::firstOrCreate($list2);
        $testMedication = Medication::firstOrCreate($list3);

    }

    /**
     * test for seeing properly added
     *
     * @return void
     */
    public function testSeeInDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('medication', ['name' => 'test1']);
        $this->seeInDatabase('medication', ['name' => 'test2']);
        $this->seeInDatabase('medication', ['name' => 'test3']);

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
            'quantity' => '25'
        ];

        Medication::where('name', 'test1')
            ->update($list1);

        $testMedication = Medication::where('name', 'test1')->firstOrFail();
        $this->assertEquals('25', $testMedication->quantity);
    }

    /**
     * test for saving
     *
     * @return void
     */
    public function testSave()
    {
        $dataAccess = new DataAccess();

        $dataAccess->saveMedications('test1','15');
        $dataAccess->saveMedications('test2','40');

        $testMedication = Medication::where('name', 'test1')->firstOrFail();
        $this->assertEquals('40', $testMedication->quantity);

        $testMedication = Medication::where('name', 'test2')->firstOrFail();
        $this->assertEquals('55', $testMedication->quantity);
    }

    /**
     * test for deleting
     *
     * @return void
     */
    public function testDelete()
    {
        Medication::where('name','test1.com')
            ->delete();

        Medication::where('name','test2.com')
            ->delete();

        Medication::where('name','test3.com')
            ->delete();
    }
}
