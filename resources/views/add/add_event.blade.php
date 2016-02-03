@extends('layouts.app')

@section('title')
    <title>Portal | Add Event</title>
@stop

@section('custom_css')
    <style>
        body {
            /*background-image: url("http://books.maxoffsky.com/img/stardust.png");*/
        }

        .top-buffer {
            margin-top: 60px;
        }

        ::selection {
            margin-top: 200px;
            background: black;
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
                    <h3 class="panel-title">Add a new Event:</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => 'add/event')) !!}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::text('name', null, array('class'=>'form-control input-sm', 'placeholder'=>'Name the event...')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <p>Select one: </p>
                        {!! Form::select('selector', array('yes' => 'Yes', 'no' => 'Madagascar')) !!}
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::textarea('description', null, array('class'=>'form-control input-sm', 'placeholder'=>'Description (optional)...'))!!}
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Add', array('class'=>'btn btn-info btn-block'))!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop