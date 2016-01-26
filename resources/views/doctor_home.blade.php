@extends('layout')

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
                        <h5>Welcome, Dr. Josh Simard, PHD<div class="logout-button"><a href="auth/logout"><span class="glyphicon glyphicon-log-out"></span></a></div></h5>
                    </span>
                </div>
                <div class="panel panel-body">
                    <ul>
                        <li><a href="/clientlist">Client List</a></li>
                        <li><a href="/calendar">Calendar</a></li>
                        <li><a href="/orders">Order Medication</a></li>
                        <li><a href="/notes">Notes and Messages</a></li>
                        <li><a href="/settings">Account Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop