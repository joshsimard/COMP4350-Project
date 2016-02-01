@extends('layouts.app')

@section('title')
    <title>Portal | Calendar</title>
@stop

@section('custom_css')
    <style>
        body {
            /*background-image: url("http://books.maxoffsky.com/img/stardust.png");*/
        }

        .top-buffer {
            margin-top: 60px;
        }

        .add-button  {
            text-align: right;
            float: right;
        }
    </style>

    <!-- Pickadate CSS -->
    <link href="vendor/Pickadate/css/default.css" rel="stylesheet">
    <link href="vendor/Pickadate/css/default.date.css" rel="stylesheet">
@stop


@section('content')

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h1 class="panel-title">Pick a date:<div class="add-button"><a href="/add/event"><span class="glyphicon glyphicon-plus"></span></a></div></h1>
                </div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <form>
                                    <input id="date" name="date" type="text" placeholder="Choose a date...">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <form>
                                    <input type="submit" value="submit" class="btn btn-info btn-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('custom_js')
    <!-- Pickadate JS -->
    <script src='{{asset('vendor/Pickadate/js/picker.date.js') }}'></script>
    <script src='{{asset('vendor/Pickadate/js/picker.js') }}'></script>

    <!-- After including the date picker scripts -->
    <script>$(function() {/* Enable Pickadate on an input field*/ $('#date').pickadate();});</script>
@stop