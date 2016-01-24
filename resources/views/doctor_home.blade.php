@extends('layout')

@section('content')
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h1 class="panel-title">Welcome, Doctor</h1>
                </div>
                <div class="panel panel-body">
                    <ul>
                        <li><a href="/auth/clientlist">Client List</a></li>
                        <li><a href="/auth/calendar">Calendar</a></li>
                        <li><a href="/auth/orders">Order Medication</a></li>
                        <li><a href="/auth/notes">Notes and Messages</a></li>
                        <li><a href="/auth/settings">Account Settings</a></li>
                    </ul>
                </div>
                <div class="panel panel-footer"></div>
            </div>
        </div>
    </div>