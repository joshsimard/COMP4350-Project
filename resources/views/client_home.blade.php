@extends('layout')

@section('custom_css')
    <style>
        body
        {
            background-image: url(" {{ asset('img/stardust.png') }}");
        }

    </style>
@stop

@section('content')
    <style>
        .logout-button {
            text-align: right;
            float: right;
        }
    </style>
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <span class="panel-title">
                        <h5>Welcome, Jane Doe<div class="logout-button"><a href="auth/logout"><span class="glyphicon glyphicon-log-out"></span></a></div></h5>
                    </span>
                </div>
                <div class="panel panel-body">
                    <ul>
                        <li><a href="/viewAppoinments">View Appoinments</a></li>
                        <li><a href="/scheduleAppointment">Schedule Appointment</a></li>
                        <li><a href="/editInfo">Edit Information</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop