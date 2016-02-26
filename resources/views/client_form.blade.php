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
            padding : 10px;
            color: black;
            width: 80%;
            background-color: white;
            min-height: 250px;
        }
        .row{
            padding: 6px;
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
            <div class="col-sm-6">
                {!! Form::text('first_name', $patient["firstName"], array('class'=>'form-control input-md', 'disabled')) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::text('last_name', $patient["lastName"], array('class'=>'form-control input-md', 'disabled')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                {!! Form::text('email', $patient["email"], array('class'=>'form-control input-md', 'disabled')) !!}
            </div>
            <div class="col-xs-6">

            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <label id="year">Date of birth:&emsp;</label>
                <?php
                    if($patient["dob"])
                        $dob = explode ( "-",  $patient["dob"]);
                    else
                        $dob = explode ( "-",  "1930-01-01");
                ?>
                {{ Form::selectYear('year', 1930, 2016, ["selected" => $dob[0]]) }}
                {{ Form::selectMonth('month', $dob[1], [], '%B') }}
                {{ Form::selectRange('day', 1, 31, $dob[2], []) }}
            </div>
            <div class="col-xs-6">
                @if ($patient["gender"] === "male")
                    {{ Form::radio('sex', 'male', true) }}&ensp;Male&emsp;&emsp;
                    {{ Form::radio('sex', 'female') }}Female
                @else
                    {{ Form::radio('sex', 'male') }}&ensp;Male&emsp;&emsp;
                    {{ Form::radio('sex', 'female', true) }}&ensp;Female
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                {!! Form::text('height', $patient["height"], array('class'=>'form-control input-md', 'placeholder'=>'height(cm)')) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::text('weight', $patient["weight"], array('class'=>'form-control input-md', 'placeholder'=>'weight(kg)')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                {!! Form::text('phone', $patient["mobileNum"], array('class'=>'form-control input-md', 'placeholder'=>'Phone Number')) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::text('home_phone', $patient["homeNum"], array('class'=>'form-control input-md', 'placeholder'=>'Home Phone')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                {!! Form::text('address', $patient["address"], array('class'=>'form-control input-md', 'placeholder'=>'P.O. Box, Apt #, Street Address.')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::text('city', $patient["city"], array('class'=>'form-control input-md', 'placeholder'=>'city')) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('postal_code', $patient["postalCode"], array('class'=>'form-control input-md', 'placeholder'=>'postal/zip code')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::text('state', $patient["state"], array('class'=>'form-control input-md', 'placeholder'=>'State/Province/Region')) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('country', $patient["country"], array('class'=>'form-control input-md', 'placeholder'=>'Country')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::text('occupation', $patient["occupation"], array('class'=>'form-control input-md', 'placeholder'=>'Occupation')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::text('status', $patient["maritalStatus"], array('class'=>'form-control input-md', 'placeholder'=>'Marital Status')) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('next_kin', $patient["nextOfKin"], array('class'=>'form-control input-md', 'placeholder'=>'Next of Kin')) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4" style="z-index: 2;float:right;">
                {!! Form::submit('Save', array('class'=>'btn btn-default','style'=>"float:right; width:100px; border-radius:0; box-shadow: 2px 3px 3px 1px #888888;"))!!}
            </div>
        </div>
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
