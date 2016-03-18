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
            min-height: 250px;
        }
        #visits {
            padding : 10px;
            color: black;
            width: 80%;
            min-height: 250px;
        }
        table {
            width: 100%;
        }
        p{
            font-size: medium;
        }
        #content{
            background-color: #FFFFFF;
        }
        .titleHeads{
            color: #000000;
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
    <h2 style="margin-left: 20px;" class="titleHeads">{{ $patient["firstName"] or 'firstname'  }} {{ $patient["lastName"] or 'lastname'  }}</h2>
    <hr>
    <div class="container" id="new_visit">
        {!! Form::open(array('action' => 'VisitFormEditController@store')) !!}
        <div class="row">
            {{-- for some reason VisitFormEditController@store is not defined?--}}
            <div class="col-sm-6">
                <p>&emsp;{{ $patient["email"] or "email" }}</p>{{ Form::hidden('email', $patient["email"]) }}
                <p>&emsp;Mobile:&emsp;{{ $patient["mobileNum"] or $patient["homeNum"] }}</p>
                <p>&emsp;Address:&emsp;{{ $patient["address"] or 'Address'  }},</p>
                <p>&emsp;{{ $patient["city"] or 'city'  }}&emsp;{{ $patient["postalCode"] or 'Postal Code'  }}</p>
                <p>&emsp;{{ $patient["state"] or 'state'  }},&ensp;{{ $patient["country"] or 'country'  }}</p>
            </div>
            <div class="col-sm-6">
                <p>&emsp;Occupation:&emsp;{{ $patient["occupation"] or 'occupation'  }}</p>
                <p>&emsp;Gender:&emsp;{{ $patient["gender"] or 'male/female'  }}</p>
                <p>&emsp;Marital Status:&emsp;{{ $patient["maritalStatus"] or 'marital status'  }}</p>
                <p>&emsp;Next of kin:&emsp;{{ $patient["nextOfKin"] or '&ensp;n/a'  }}</p>
                <p>&emsp;Date of birth:&emsp;{{ $patient["dob"] or 'MM/DD/YY'  }}</p>
            </div>
        </div>
        <div class="row">
            <br>
            <div class="col-sm-6">
                <label>Height</label>
                {!! Form::text('height', $patient["height"], array('class'=>'form-control input-sm','placeholder'=>'height(cm)')) !!}
            </div>
            <div class="col-sm-6">
                <label>Weight</label>
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
                {{ Form::textarea('allergies', "" , ['class' => 'field', 'placeholder'=>'n/a']) }}
                <br><br>
            </div>
        </div>
        <div class="row">
            <label id="year">Date:&emsp;</label>
            {{ Form::selectYear('year', 1900, date("Y"), ["selected" => date("Y")]) }}
            {{ Form::selectMonth('month', date("m"), [], '%B') }}
            {{ Form::selectRange('day', 1, 31, date("d"), []) }}
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
        {!! Form::close() !!}
    </div>
    <div class="container" id="visits">
        <h3 class="titleHeads">Previous Visits</h3>
        <hr>
        <?php
        if(count($visits) < 1)
            echo '<a href="#" class="list-group-item"><h4 class="items">No Visits!</h4><span class="left items"></span></a>';
        else
        {
            //populate
            foreach($visits as $visit)
            {
                echo '<a href="#'.$visit["id"].'" class="list-group-item">
                                    <h4 class="left items right-align">Date: '.$visit["date"].'</h4>
                                    <h4 class="items">Height: '.$visit["height"].'&emsp;Weight:'.$visit["weight"].'</h4>
                                    <h4 class="items"> Symptoms: '.$visit["symptoms"].'</h4>
                                    <h4 class="items"> Allergies: '.$visit["allergies"].'</h4>
                                    </a>
                                    <br>';
            }
        }

        ?>
    </div>
@stop
