<?php

use App\models\calendar;
use App\Business\DataAccess;

class databaseCalendarTest extends TestCase
{
    /**
     * Test to insert 3 new events
     *
     * @return void
     */
    public function testAdd()
    {
        //clear user for testing
        DB::table('calendar')->where('event_id', '=', '19483726503')->delete();
        DB::table('calendar')->where('event_id', '=', '64893021765')->delete();
        DB::table('calendar')->where('event_id', '=', '83746284054')->delete();

        $list1 = [
            'event_id' => '19483726503',
            'title' => 'Metting - John Doe',
            'start_time' => 'Wed Feb 26 2016 10:00:00 GMT+0000',
            'end_time' => 'Wed Feb 26 2016 12:30:00 GMT+0000',
            'client_id' => 'john@doe.com',
            'client_name' => 'John Doe'
        ];

        $list2 = [
            'event_id' => '64893021765',
            'title' => 'More Meds',
            'start_time' => 'Fri Mar 11 2016 10:00:00 GMT+0000',
            'end_time' => 'Fri Mar 11 2016 10:30:00 GMT+0000',
            'client_id' => 'jane@doe.com',
            'client_name' => 'Jane Doe'
        ];

        $list3 = [
            'event_id' => '83746284054',
            'title' => 'Meeting',
            'start_time' => 'Wed Mar 02 2016 10:00:00 GMT+0000',
            'end_time' => 'Wed Mar 02 2016 11:00:00 GMT+0000',
            'client_id' => 'john@doe.com',
            'client_name' => 'John Doe'
        ];

        $testEvent = calendar::firstOrCreate($list1);
        $testEvent = calendar::firstOrCreate($list2);
        $testEvent = calendar::firstOrCreate($list3);

        $this->seeInDatabase('calendar', ['event_id' => '19483726503']);
        $this->seeInDatabase('calendar', ['event_id' => '64893021765']);
        $this->seeInDatabase('calendar', ['event_id' => '83746284054']);
    }

    /**
     * test for updating calendar data
     *
     * @return void
     */
    public function testUpdate()
    {


        $list1 = [
            'end_time' => 'Wed Feb 26 2016 11:30:00 GMT+0000'
        ];

        calendar::where('event_id', '19483726503')
            ->update($list1);

        $testUser = calendar::where('event_id', '=', '19483726503')->firstOrFail();
        $this->assertEquals('Wed Feb 26 2016 11:30:00 GMT+0000', $testUser->end_time);


        $list2 = [
            'title' => 'No More Meds',
            'start_time' => 'Fri Mar 11 2016 09:30:00 GMT+0000',
            'end_time' => 'Fri Mar 11 2016 10:00:00 GMT+0000',
        ];
        calendar::where('event_id', '64893021765')
            ->update($list2);

        $testUser = calendar::where('event_id', '=', '64893021765')->firstOrFail();
        $this->assertEquals("No More Meds", $testUser->title);
        $this->assertEquals('Fri Mar 11 2016 09:30:00 GMT+0000', $testUser->start_time);
        $this->assertEquals('Fri Mar 11 2016 10:00:00 GMT+0000', $testUser->end_time);
    }

    /**
     * test for getting events through RESTFUL API
     *
     * @return void
     */
    public function testGetEvents()
    {
        $dataAccess = new DataAccess();

        //assert that it does not return an empty lists
        $this->assertNotEquals(null, $dataAccess->getEvents());
    }

    /**
     * test for deleting users data [delete user 2 & 3]
     *
     * @return void
     */
    public function testDelete()
    {
        calendar::where('event_id', '64893021765')->delete();
        calendar::where('event_id', '83746284054')->delete();

        $this->dontSeeInDatabase('calendar', ['event_id' => '64893021765']);
        $this->dontSeeInDatabase('calendar', ['event_id' => '83746284054']);

    }
}
