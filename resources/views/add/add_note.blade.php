@extends('layouts.app')

@section('title')
    <title>Portal | Add Note</title>
@stop

@section('custom_css')
    <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.css">
    <style>

        .top-buffer {
            margin-top: 60px;
        }

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
    @include('inc.doctors_nav_links')
@stop

@section('content')
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-6 col-sm-offset-2 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Post a Note</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('action' => 'AddNoteController@store')) !!}
                        <div class="form-group">
                            <label for="name">Post Name</label>
                            {!! Form::text('subject', null, array('class'=>'form-control input-md', 'placeholder'=>'Enter a title...')) !!}
                        </div>

                        <div class="form-group">
                            <label for="body">Post Body</label>
                            {!! Form::text('body', null, array('class'=>'form-control input-md', 'placeholder'=>'Enter a message (Under 250 characters)...', 'cols'=>'50', 'rows'=>'10', 'wrap'=>'true')) !!}
                        </div>

                        {{--<div class="form-group">
                            <label for="tags">Tag Patient</label>
                            <select id="tags-menu" name="tags[]" multiple="multiple">
                                <option value="">Add tags to this post...</option>
                                <option value="#" selected="selected"></option>
                            </select>
                        </div>--}}

                        {!! Form::submit('Submit', array('class'=>'btn btn-info btn-block'))!!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>

    <script type="text/javascript">
        {{--$(function() {--}}
            {{--// Enable Selectize with an option to create new tags and add the remove button for tags--}}
            {{--$('#tags-menu').selectize({--}}
                {{--plugins: ['remove_button']--}}
            {{--})--}}
        {{--});--}}

        {{--var selectize = $("#tags-menu")[0].selectize;--}}
        {{--selectize.clear();--}}
        {{--selectize.clearOptions();--}}
        {{--selectize.load(function(callback) {--}}
            {{--callback();--}}
        {{--});--}}
    </script>
@stop

<?php
////populate
//foreach($clients as $patient)
//{
//    echo '<option value="#" selected="selected">'.$patient["firstName"].' '.$patient["lastName"].'</option>';
//}
//?>