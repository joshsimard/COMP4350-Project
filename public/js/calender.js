$(document).ready(function() {


    var user_name = user_info[0]+" "+user_info[1];
    /*
     Initialize fullCalendar and store into variable.
     Why in variable?
     Because doing so we can use it inside other function.
     In order to modify its option later.
     */

    var calendar = $('#calendar').fullCalendar(
        {

            /*
             header option will define our calendar header.
             left define what will be at left position in calendar
             center define what will be at center position in calendar
             right define what will be at right position in calendar
             */
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            /*
             defaultView option used to define which view to show by default,
             for example we have used agendaWeek.
             */
            defaultView: 'agendaWeek',
            /*
             selectable:true will enable user to select datetime slot
             selectHelper will add helpers for selectable.
             */
            selectable: true,
            selectHelper: true,
            /*
             when user select timeslot this option code will execute.
             It has three arguments. Start,end and allDay.
             Start means starting time of event.
             End means ending time of event.
             allDay means if events is for entire day or not.
             */
            select: function (start, end, allDay) {
                /*
                 after selection user will be promted for enter title for event.
                 */
                var title = prompt('Event Title:');
                var id = new Date().getTime().toString();


                if (title) {

                    title = title+' - '+user_name;

                    //attach event to calendar
                    addEventToCalender(id, title, start, end, true,"");

                    //send event to controller
                    postEventToDB(id, title, start.toString(), end.toString());


                }
                calendar.fullCalendar('unselect');
            },


            eventClick: function(event, element) {

                if(user_info[2] == 0) {

                    //edit only ur event as client
                    if(event.color.toString() == "") {
                        title = prompt('Update Title:');

                        if(title) {
                            event.title = title+' - '+user_name;

                            $('#calendar').fullCalendar('updateEvent', event);
                            postEventToDB(event.id, event.title, event.start.toString(), event.end.toString());
                        }
                    }
                }
                else{

                    //admin
                    title = prompt('Update Title:');

                    if(title) {
                        event.title = title+' - '+user_name;

                        $('#calendar').fullCalendar('updateEvent', event);
                        postEventToDB(event.id, event.title, event.start.toString(), event.end.toString());
                    }
                }


            },

            eventDrop: function(event, delta, revertFunc) {

                alert(event.title + " was dropped on " + event.start.format());

                if (!confirm("Are you sure about this change?")) {
                    revertFunc();
                }
                else
                {
                    postEventToDB(event.id, event.title, event.start.toString(), event.end.toString());
                }

            },

            eventResize: function(event, delta, revertFunc) {

                alert(event.title + " has been extended to " + event.end.format('HH:mm:ss'));

                if (!confirm("Are you sure about this change?")) {
                    revertFunc();
                }
                else
                {
                    postEventToDB(event.id, event.title, event.start.toString(), event.end.toString());
                }

            },

            /*
             editable: true allow user to edit events.
             */
            editable: true,
        });

    //get all events from db
    for (i = 0; i < events.length; i++) {

        var editable;
        var color = "";

        if(user_info[2] == 0) //if client
        {
            //edit only ur event as client
            if(events[i][5].indexOf(user_info[3]) > -1) {
                editable = true;
            }
            else {
                editable = false;
                color = '#5D4037';
                events[i][2] = 'Not Available'
            }
            addEventToCalender(events[i][0], events[i][2], events[i][3], events[i][4],editable, color);
        }
        else
            addEventToCalender(events[i][0], events[i][2], events[i][3], events[i][4], true, color);
    }



    function postEventToDB(id, title, start, end)
    {
        $.post('calendar', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                data: id +'&'+ title+'&'+ start +'&'+ end +'&'+ user_info[2] +'&'+user_name,
            })
            .done(function(data) {
                //alert(data);
                // alert("succes");
            })
            .fail(function() {
                //alert( "error-lala" );
            });
    }

    function addEventToCalender(id, title, start, end, editable, color)
    {

        calendar.fullCalendar('renderEvent',
            {
                id: id,
                title: title,
                start: start,
                end: end,
                editable:editable,
                color:color,
                textColor:color,
                //allDay: allDay
            },
            true // make the event "stick"


        );
    }

});

