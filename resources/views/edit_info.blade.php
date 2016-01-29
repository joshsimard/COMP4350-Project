@extends('layout')

@section('custom_css')
    <style>
        body
        {
            background-image: url(" {{ asset('img/stardust.png') }}");
        }

    </style>
@stop

@section('content')

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Your Information</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => 'auth/register')) !!}

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::text('First name', null, array('class'=>'form-control input-sm', 'placeholder'=>'First Name')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::text('Last name', null, array('class'=>'form-control input-sm', 'placeholder'=>'Last Name')) !!}
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::email('email', null, array('class'=>'form-control input-sm', 'placeholder'=>'Email Address'))!!}
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::text('date_of_birth', null, array('class' => 'form-control','placeholder' => 'Date of birth','data-datepicker' => 'datepicker'))!!}
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Update', array('class'=>'btn btn-info btn-block'))!!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop