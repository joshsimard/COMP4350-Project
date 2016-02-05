@extends('layouts.app')

@section('title')
    <title>Portal | Notes</title>
@stop

@section('custom_css')
    <style>

        .top-buffer {
            margin-top: 60px;
        }

        .logout-button  {
            text-align: right;
            float: right;
        }

        .add-button  {
            text-align: right;
            float: right;
        }
    </style>
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
                <div class="panel-heading">
                    <h5 class="panel-title">Sorry<div class="add-button"><a href="/add/note" name="add_note"><span class="glyphicon glyphicon-plus" style="color: rgb(91, 192, 222)"></span></a></div></h5>
                </div>
                <div class="panel-body">
                    <h3>Notes is not currently implemented.</h3>
                </div>
            </div>
        </div>
    </div>
@stop