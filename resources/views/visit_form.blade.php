@extends('layouts.app')

@section('title')
    <title>New Visit | {{ $patient["firstName"] }} {{ $patient["lastName"] }}</title>
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
            padding: 30px;
            color: black;
            width: 80%;
            background-color: white;
            min-height: 250px;
        }
        .input-sm {
            width: 100px;
        }
        table {
            width: 100%;
        }
        td {
            float : left;
            width : 45%;
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
@stop

@section('content')
    <div class="container-fluid">
    <table>
        <tr>
            <h2>{{ $patient["firstName"] or 'firstname'  }} {{ $patient["lastName"] or 'lastname'  }}</h2>
            <hr>
        </tr>
        <br>
        <tr>
            <td>
                <p>&emsp;{{ $patient["email"] or 'email@example.com'  }}</p>
                <p>&emsp;{{ $patient["mobileNum"] or $patient["homeNum"] }}</p>
                <p>&emsp;{{ $patient["address"] or 'Address'  }},</p>
                <p>&emsp;{{ $patient["city"] or 'city'  }}&emsp;{{ $patient["postalCode"] or 'Postal Code'  }}</p>
                <p>&emsp;{{ $patient["state"] or 'state'  }},&ensp;{{ $patient["country"] or 'country'  }}</p>
            </td>
            <td>
                <p>&emsp;{{ $patient["occupation"] or 'occupation'  }}</p>
                <p>&emsp;{{ $patient["gender"] or 'male/female'  }}</p>
                <p>&emsp;{{ $patient["maritalStatus"] or 'marital status'  }}</p>
                <p>&emsp;Next of kin:&emsp;{{ $patient["nextOfKin"] or '&ensp;n/a'  }}</p>
                <p>&emsp;Date of birth:&emsp;{{ $patient["dob"] or 'MM/DD/YY'  }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <br><br><br>
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::text('height', $patient["height"], array('class'=>'form-control input-sm','placeholder'=>'height(cm)')) !!}
            </td>
            <td>
                {!! Form::text('weight', $patient["weight"], array('class'=>'form-control input-sm','placeholder'=>'weight(kg)')) !!}
            </td>
        </tr>
    </table>
    <br>
    <p>Symptoms: </p>
    {{ Form::textarea('symptoms', null, ['class' => 'field']) }}
    <br><br>
    <label id="year">Date:&emsp;</label>
    {{ Form::selectYear('year', null, []) }}&emsp;
    {{ Form::selectMonth('month', null, [], '%B') }}&emsp;
    {{ Form::selectRange('day', 1, 31, null, []) }}
    <br><br>
    <label id="time">Period: &emsp;</label>
    {{ Form::time('time', null, []) }}&ensp;-&ensp;
    {{ Form::time('end_time', null, []) }}
    <br><br>
    {!! Form::submit('Record Visit', array('class'=>'btn btn-default'))!!}

    <p>&emsp;</p>
    </div>

@stop
