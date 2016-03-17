<?php

use App\models\Term;
use App\Business\DataAccess;

class databaseTermsTest extends TestCase
{
    /**
     * Test to insert 4 notes
     *
     * @return void
     */
    public function testAdd()
    {

        $list1 = [
            'name' => 'test1',
            'description' => 'this is test 1',
        ];

        $list2 = [
            'name' => 'test2',
            'description' => 'this is test 2',
        ];

        $list3 = [
            'name' => 'test3',
            'description' => 'this is test 3',
        ];


        $testTerm = Term::firstOrCreate($list1);
        $testTerm = Term::firstOrCreate($list2);
        $testTerm = Term::firstOrCreate($list3);

    }

    /**
     * test for seeing notes were properly added
     *
     * @return void
     */
    public function testSeeInDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('terms', ['name' => 'test1']);
        $this->seeInDatabase('terms', ['name' => 'test2']);
        $this->seeInDatabase('terms', ['name' => 'test3']);

    }

    /**
     * test for updating doctors notes data [updated notes 1 & 2]
     *
     * @return void
     */
    public function testUpdate()
    {

        //update first term
        $list1 = [
            'description' => 'updated test 1'
        ];

        Term::where('name', 'test1')
            ->update($list1);

        $testTerm = Term::where('name', 'test1')->firstOrFail();
        $this->assertEquals('updated test 1', $testTerm->description);
    }

    /**
     * test for deleting notes
     *
     * @return void
     */
    public function testDelete()
    {
        Term::where('name','test1.com')
            ->delete();

        Term::where('name','test2.com')
            ->delete();

        Term::where('name','test3.com')
            ->delete();
    }
}
