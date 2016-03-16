@extends('layouts.app')

@section('title')
    <title>Portal | Home</title>
@stop

@section('custom_css')
    <style>
        .logout-button  {
            text-align: right;
            float: right;
        }
    </style>
@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
@stop

@section('content')
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">
                        <h5>Welcome, Dr. {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}, PhD</h5>
                    </span>
                </div>
                <div class="panel-body">
                    <ul>
                        <li><a href="/clientlist" style="color: rgb(0, 0, 0)">View Clients</a></li>
                        <li><a href="/calendar" style="color: rgb(0, 0, 0)">Calendar</a></li>
                        <li><a href="/notes" style="color: rgb(0, 0, 0)">Notes and Messages</a></li>
                        <li><a href="/requests" style="color: rgb(0, 0, 0)">requests</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop