@extends('layouts.app')

@section('title')
    <title>New Visit | {{ $patient["firstName"] }} {{ $patient["lastName"] }}</title>
@stop

@section('custom_css')
    <style>
        #allergies {
            border: 0;
        }
        .body{
            padding: 10px;
        }
        .form-group {
            padding-bottom: 5px;
            width: 50%;
        }
        .container-fluid {
            margin: auto;
            width: 80%;
            box-shadow: 2px 3px 3px 1px #888888;
            padding: 30px;
            min-height: 250px;
            z-index: 1;
        }
        .row{
            padding-top: 10px;
        }
        .well {
            margin: auto;
            padding: 30px;
            width: 80%;
            min-height: 250px;
            z-index: 1;
        }
        .input-sm {
            width: 100px;
        }
        #new_visit {
            padding : 10px;
            color: black;
            width: 80%;
            background-color: white;
            min-height: 250px;
        }
        #visits {
            padding : 10px;
            width: 80%;
            min-height: 250px;
        }
        table {
            width: 100%;
        }
        p{
            font-size: medium;
        }
    </style>

    <!-- datepicker CSS -->
    <link href="{{ 'css/date_picker.css' }}" rel="stylesheet">

@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
    @include('inc.order_medication_link')
    @include('inc.notes_link')
@stop

@section('content')
    <h2 style="margin-left: 20px;">{{ $patient["firstName"] or 'firstname'  }} {{ $patient["lastName"] or 'lastname'  }}</h2>
    <hr>
    <div class="container" id="new_visit">
        <div class="row">
            {{-- for some reason VisitFormEditController@store is not defined?--}}
            {!! Form::open(array('action' => 'ClientFormEditController@store')) !!}
            <div class="col-sm-6">
                <p>&emsp;{{ $patient["email"] or 'email@example.com'  }}</p>
                <p>&emsp;{{ $patient["mobileNum"] or $patient["homeNum"] }}</p>
                <p>&emsp;{{ $patient["address"] or 'Address'  }},</p>
                <p>&emsp;{{ $patient["city"] or 'city'  }}&emsp;{{ $patient["postalCode"] or 'Postal Code'  }}</p>
                <p>&emsp;{{ $patient["state"] or 'state'  }},&ensp;{{ $patient["country"] or 'country'  }}</p>
            </div>
            <div class="col-sm-6">
                <p>&emsp;{{ $patient["occupation"] or 'occupation'  }}</p>
                <p>&emsp;{{ $patient["gender"] or 'male/female'  }}</p>
                <p>&emsp;{{ $patient["maritalStatus"] or 'marital status'  }}</p>
                <p>&emsp;Next of kin:&emsp;{{ $patient["nextOfKin"] or '&ensp;n/a'  }}</p>
                <p>&emsp;Date of birth:&emsp;{{ $patient["dob"] or 'MM/DD/YY'  }}</p>
            </div>
        </div>
        <div class="row">
            <br>
            <div class="col-sm-6">
                {!! Form::text('height', $patient["height"], array('class'=>'form-control input-sm','placeholder'=>'height(cm)')) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::text('weight', $patient["weight"], array('class'=>'form-control input-sm','placeholder'=>'weight(kg)')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Symptoms: </p>
                {{ Form::textarea('symptoms', null, ['class' => 'field']) }}
            </div>
            <div class="col-sm-6">
                <p>Allergies: </p>
                {{ Form::textarea('allergies', $patient["allergies"] , ['class' => 'field', 'placeholder'=>'n/a']) }}
                <br><br>
            </div>
        </div>
        <div class="row">
            <label id="year">Date:&emsp;</label>
            {{ Form::selectYear('year', null, []) }}&emsp;
            {{ Form::selectMonth('month', null, [], '%B') }}&emsp;
            {{ Form::selectRange('day', 1, 31, null, []) }}
        </div>
        <div class="row">
            <label id="time" title="The period of the visit. Start and end times">Period: &emsp;</label>
            {{ Form::time('time', null, []) }}&ensp;-&ensp;
            {{ Form::time('end_time', null, []) }}
        </div>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <br>
                {!! Form::submit('Record Visit', array('class'=>'btn btn-default','style'=>"border-radius:0;"))!!}
            </div>
        </div>
    </div>
    <div class="container" id="visits">
        <h3>Previous Visits</h3>
        <hr>
    </div>
@stop
