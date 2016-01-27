@extends('layout')

@section('title')
    <title>Portal | Register</title>
@stop

@section('custom_css')
    <style>
        body {
            background-image: url("http://books.maxoffsky.com/img/stardust.png");
        }

        .top-buffer {
            margin-top: 60px;
        }
    </style>
@stop

@section('content')

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign up <small>It's free!</small></h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => 'auth/register')) !!}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::text('name', null, array('class'=>'form-control input-sm', 'placeholder'=>'Full Name')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::email('email', null, array('class'=>'form-control input-sm', 'placeholder'=>'Email Address'))!!}
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::password('password', array('class'=>'form-control input-sm', 'placeholder'=>'Password'))!!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::password('password_confirmation', array('class'=>'form-control input-sm','placeholder'=>'Confirm Password'))!!}
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Register', array('class'=>'btn btn-info btn-block'))!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
