@extends('layout')

@section('content')

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign up <small>It's free!</small></h3>
                </div>
                <div class="panel-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5>There were errors during registration:</h5>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    {!! Form::open(array('url' => 'register')) !!}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!!  Form::text('first_name', null, array('class'=>'form-control input-sm','placeholder'=>'First Name'))!!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::text('last_name', null, array('class'=>'form-control input-sm','placeholder'=>'Last Name'))!!}
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
