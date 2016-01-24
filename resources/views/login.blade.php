@extends('layout')

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Login</h3>
            </div>
            <div class="panel-body">
                @if(count($errors)>0)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5>There were errors during login:</h5>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                {!! Form::open(array('url' => 'login')) !!}
                    <div class="form-group">
                        {!! Form::text('user_name', null, array('class'=>'form-control input-sm','placeholder'=>'Username')) !!}
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
            <a href="/register">Don't have an account? Register</a>
        </div>
    </div>
</div>

@stop