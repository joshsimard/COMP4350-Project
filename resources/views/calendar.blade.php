@extends('layouts.app')

@section('title')
    <title>Portal | Calendar</title>
@stop

@section('custom_css')
    {{--Calendar style--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css" rel="stylesheet">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.9/jquery.timepicker.min.css" rel="stylesheet">

    <style>
        /*Current day styling*/
        .fc-unthemed .fc-today {
            color:#000000;
        }
    </style>
@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
@stop

@section('content')
    <?php $user_info = array( Auth::user()->firstName, Auth::user()->lastName, Auth::user()->admin,Auth::user()->email);?>

    <!-- Convert php arrays to javascript   -->
    <script type="text/javascript">
        // pass PHP array to JavaScript array
        var events = <?php echo json_encode($events) ?>;
        var user_info = <?php echo json_encode($user_info) ?>;
    </script>

    <div id='calendar'></div>

    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            {{--Choose Doctor--}}
                            <label for="doctor-choice" class="control-label">Choose Doctor:</label>
                            <select class="form-control" id="doctor-choice">
                                <option>Any</option>
                                <option>Dr. Joe</option>
                                <option>Dr. Frankinstein</option>
                                <option>Dr. Einstein</option>
                                <option>Dr. Lakus</option>
                            </select>

                            <label for="recipient-name" class="control-label">Title:</label>
                            <input type="text" class="form-control" id="event-title">
                            <label for="recipient-name" class="control-label">Start Time:</label>
                            <input type="text" class="form-control" id="start-time">
                            <label for="recipient-name" class="control-label">End Time:</label>
                            <input type="text" class="form-control" id="end-time">

                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Description:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id ="save-button" type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('custom_js')

    <!-- Calender scripts -->
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.11.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>

    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.9/jquery.timepicker.min.js"></script>
    <script src="{{ 'js/calender.js' }}"></script>

@stop