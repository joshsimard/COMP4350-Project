<?php

use App\models\Note;

class databaseNotesTest extends TestCase
{
    /**
     * Test to insert 4 notes
     *
     * @return void
     */
    public function testAdd()
    {

        $list1 = [
            'doctor_id' => '1',
            'subject' => 'testNote1.com',
            'body' => "Testing Notes 1",
        ];

        $list2 = [
            'doctor_id' => '1',
            'subject' => 'testNote2.com',
            'body' => "Testing Notes 2",
        ];

        $list3 = [
            'doctor_id' => '1',
            'subject' => 'testNote3.com',
            'body' => "Testing Notes 3",
        ];
        $list4 = [
            'doctor_id' => '1',
            'subject' => 'testNote4.com',
            'body' => "Testing Notes 4",
        ];

        $testNotes = Note::firstOrCreate($list1);
        $testNotes = Note::firstOrCreate($list2);
        $testNotes = Note::firstOrCreate($list3);
        $testNotes = Note::firstOrCreate($list4);

    }

    /**
     * test for seeing notes were properly added
     *
     * @return void
     */
    public function testSeeInDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('notes', ['subject' => 'testNote1.com']);
        $this->seeInDatabase('notes', ['subject' => 'testNote2.com']);
        $this->seeInDatabase('notes', ['subject' => 'testNote3.com']);
        $this->seeInDatabase('notes', ['subject' => 'testNote4.com']);

    }

    /**
     * test for updating doctors notes data [updated notes 1 & 2]
     *
     * @return void
     */
    public function testUpdate()
    {

        //update first note
        $list1 = [
            'subject' => 'Doctor Aspiration',
            'body' => 'Really need to Ace this course, there is a lot of testing here'
        ];

        Note::where('id', '1')
            ->update($list1);

        $testNote = Note::where('id', '=', '1')->firstOrFail();
        $this->assertEquals('Doctor Aspiration', $testNote->subject);
        $this->assertEquals('Really need to Ace this course, there is a lot of testing here', $testNote->body);


        //update second note
        $list2 = [
            'subject' => 'Doctor Problems',
            'body' => 'This course has given me alot of sleeples nights, just saying..lol'
        ];

        Note::where('id', '2')
            ->update($list2);

        $testNote = Note::where('id', '=', '2')->firstOrFail();
        $this->assertEquals('Doctor Problems', $testNote->subject);
        $this->assertEquals('This course has given me alot of sleeples nights, just saying..lol', $testNote->body);


        //update third note
        $list3 = [
            'subject' => 'Doctor Truth',
            'body' => 'In any case, its a very interesting course'
        ];

        Note::where('id', '3')
            ->update($list3);

        $testNote = Note::where('id', '=', '3')->firstOrFail();
        $this->assertEquals('Doctor Truth', $testNote->subject);
        $this->assertEquals('In any case, its a very interesting course', $testNote->body);

    }

    /**
     * test for deleting notes
     *
     * @return void
     */
    public function testDelete()
    {
        Note::where('subject', 'testNote1.com')
            ->delete();

        Note::where('subject', 'testNote2.com')
            ->delete();
    }
}
