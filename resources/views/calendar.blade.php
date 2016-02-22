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
        .top-buffer {
            margin-top: 60px;
        }

        .add-button  {
            text-align: right;
            float: right;
        }

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
    @include('inc.doctors_nav_links')
@stop

@section('content')

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
                            {{--<label for="recipient-name" class="control-label">Doctor:</label>--}}
                            {{--<input type="text" class="form-control" id="recipient-name">--}}

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
                    {{--<button type="button"><a id="eventUrl" target="_blank">Save</a></button>--}}
                </div>
            </div>
        </div>
    </div>

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class='col-sm-6'>--}}
                {{--<div class="form-group">--}}
                    {{--<div class='input-group date' id='datetimepicker3'>--}}
                        {{--<input type='text' class="form-control" />--}}
                    {{--<span class="input-group-addon">--}}
                        {{--<span class="glyphicon glyphicon-time"></span>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<script type="text/javascript">--}}
                {{--$(function () {--}}
{{--//                    $('#datetimepicker3').datetimepicker({--}}
{{--//                        format: 'LT'--}}
{{--//                    });--}}
                    {{--$('#datetimepicker3').timepicker();--}}
                {{--});--}}
            {{--</script>--}}
        {{--</div>--}}
    {{--</div>--}}

@stop

@section('custom_js')

    <!-- Calender scripts -->
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.11.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>

    {{-- DatePicker Scripts--}}
    {{--<script href="https://cdn.jsdelivr.net/jquery.transition/1.7.2/jquery.transition.js"></script>--}}
    {{--<script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/umd/collapse.js"></script>--}}
    {{--<script href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"></script>--}}
            {{--<!-- Latest compiled and minified JavaScript -->--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}

    {{--<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>--}}
    {{--<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>--}}
    {{--<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>--}}


    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.9/jquery.timepicker.min.js"></script>
    <script src="{{ 'js/calender.js' }}"></script>

@stop