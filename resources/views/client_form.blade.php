@extends('layouts.app')

@section('title')
    <title>Client Information | {{ $patient["firstName"] }} {{ $patient["lastName"] }}</title>
@stop

@section('custom_css')
    <style>
        .body{
            padding: 10px;
        }
        .form-group {
            padding-bottom: 5px;
            width: 50%;
        }
        .container-fluid {
            padding : 50px;
            color: black;
            width: 80%;
            background-color: white;
            min-height: 250px;
        }


    </style>

    <!-- datepicker CSS -->
    <link href="{{ 'css/date_picker.css' }}" rel="stylesheet">

@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
@stop

@section('content')
    <div class="container-fluid">
        <h1>Client Information</h1>
        Edit client information.
        <hr>
        {!! Form::open(array('action' => 'ClientFormEditController@store')) !!}

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    {!! Form::text('email', $patient["email"], array('class'=>'form-control input-md', 'disabled')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('first_name', $patient["firstName"], array('class'=>'form-control input-md', 'disabled')) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('last_name', $patient["lastName"], array('class'=>'form-control input-md', 'disabled')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6"><div class="form-group">
                    <div class='input-group date' id='dob'>
                        <label id="year">Date of birth:&emsp;</label>
                        {{ Form::selectYear('year', null, []) }}
                        {{ Form::selectMonth('month', null, [], '%B') }}
                        {{ Form::selectRange('day', 1, 31, null, []) }}
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('gender', $patient["gender"], array('class'=>'form-control input-md', 'placeholder'=>'Male/Female')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('height', $patient["height"], array('class'=>'form-control input-md', 'placeholder'=>'height(cm)')) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('weight', $patient["weight"], array('class'=>'form-control input-md', 'placeholder'=>'weight(kg)')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('phone', $patient["mobileNum"], array('class'=>'form-control input-md', 'placeholder'=>'Phone Number')) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('home_phone', $patient["homeNum"], array('class'=>'form-control input-md', 'placeholder'=>'Home Phone')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::text('address', $patient["address"], array('class'=>'form-control input-md', 'placeholder'=>'P.O. Box, Apt #, Street Address.')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('city', $patient["city"], array('class'=>'form-control input-md', 'placeholder'=>'city')) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('postal_code', $patient["postalCode"], array('class'=>'form-control input-md', 'placeholder'=>'postal/zip code')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('state', $patient["state"], array('class'=>'form-control input-md', 'placeholder'=>'State/Province/Region')) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('country', $patient["country"], array('class'=>'form-control input-md', 'placeholder'=>'Country')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    {!! Form::text('occupation', $patient["occupation"], array('class'=>'form-control input-md', 'placeholder'=>'Occupation')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('status', $patient["maritalStatus"], array('class'=>'form-control input-md', 'placeholder'=>'Marital Status')) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::text('next_kin', $patient["nextOfKin"], array('class'=>'form-control input-md', 'placeholder'=>'Next of Kin')) !!}
                </div>
            </div>
        </div>


        {!! Form::submit('Save', array('class'=>'btn btn-default'))!!}

        {!! Form::close() !!}
    </div>
@stop

@section('custom_js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>

@stop
