@extends('layouts.app')

@section('title')
    <title>Portal | Calendar</title>
@stop

@section('custom_css')
    <style>
        .top-buffer {
            margin-top: 60px;
        }

        .add-button  {
            text-align: right;
            float: right;
        }
    </style>

    <!-- datepicker CSS -->
    <link href="{{ 'css/date_picker.css' }}" rel="stylesheet">

@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
    @include('inc.doctors_nav_links')
@stop

@section('content')

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h1 class="panel-title">Pick a date:<div class="add-button"><a href="/add/event"><span class="glyphicon glyphicon-plus"></span></a></div></h1>
                </div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <form>
                                    <input id="date" name="date" type="text" placeholder="Choose a date...">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <form>
                                    <input type="submit" value="submit" class="btn btn-info btn-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('custom_js')

    <!-- date picker scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
@stop