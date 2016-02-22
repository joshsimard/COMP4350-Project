$(document).ready(function() {

    //***Remember to populate calender

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

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
                var id = date.getTime();
                /*
                 if title is enterd calendar will add title and event into fullCalendar.
                 */

                //determine what will be id

                if (title) {

                    calendar.fullCalendar('renderEvent',
                        {
                            id: id,
                            title: title+" - Brian Griffin",
                            start: start,
                            end: end,
                            //allDay: allDay
                        },
                        true // make the event "stick"


                    );

                    //send event to controller
                    $.post('http://localhost:8000/calendar', {
                            _token: $('meta[name=csrf-token]').attr('content'),
                            data: id +'&'+ title+'&'+ start +'&'+ end,
                        })
                        .done(function(data) {
                            alert(data);
                           // alert("succes");
                        })
                        .fail(function() {
                            alert( "error-lala" );
                        });


                }
                calendar.fullCalendar('unselect');
            },


            eventClick: function(event, element) {

                title = prompt('Update Title:');

                if(title) {
                    event.title = title + " - Brian Griffin";

                    $('#calendar').fullCalendar('updateEvent', event);

                }
            },

            eventDrop: function(event, delta, revertFunc) {

                alert(event.title + " was dropped on " + event.start.format());

                if (!confirm("Are you sure about this change?")) {
                    revertFunc();
                }

            },

            eventResize: function(event, delta, revertFunc) {

                alert(event.title + " has been extended to " + event.end.format('HH:mm:ss'));

                if (!confirm("Are you sure about this change?")) {
                    revertFunc();
                }

            },

            /*
             editable: true allow user to edit events.
             */
            editable: true,
        });



});

