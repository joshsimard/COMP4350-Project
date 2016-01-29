@extends('layout')

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Login</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(array('url' => 'auth/login')) !!}
                    <div class="form-group">
                        {!! Form::text('email', null, array('class'=>'form-control input-sm','placeholder'=>'Email Address')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password', array('class'=>'form-control input-sm','placeholder'=>'Password')) !!}
                    </div>

                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember', 'Remember Me') !!}Remember Me
                            <a href="/forgot" class="pull-right">Forgot Password?</a>
                        </label>
                    </div>
                    {!! Form::submit('Login', array('class'=>'btn btn-info btn-block')) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center">
            <a href="/auth/register">Don't have an account? Register</a>
        </div>
    </div>
</div>

@stop