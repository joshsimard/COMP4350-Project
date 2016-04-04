@extends('layouts.app')

@section('title')
    <title>Portal | Order Medications</title>
@stop

@section('custom_css')
    <style>

        .logout-button  {
            text-align: right;
            float: right;
        }

        .add-button  {
            text-align: right;
            float: right;
        }

        .list-group-item {
            background-color: #dddddd;
            color: #000000;
            width: inherit;
            margin-bottom: 5px;
            text-wrap: normal;
        }

        .list-group-item .items{color: #000000;}

        .reset-btn {
            margin-left: 5px;
            float:right;
        }

    </style>
@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
@stop

@section('content')
    <div class="container-fluid">
        <h1>Order Medication</h1>
        <hr>
        {!! Form::open(array('action' => 'MedicationController@store')) !!}
        <div class="row">
            <div class="col-sm-6" style="float: right">
                {!! Form::number('quantity', '', array('class'=>'form-control input-md', 'style'=>'width: 150px', 'placeholder'=>'Quantity')) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::text('name', '', array('class'=>'form-control input-md','placeholder'=>'Medication Name', 'id'=>'name')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" style="z-index: 2;float:right;">
                {!! Form::submit('Save', array('class'=>'btn btn-default','style'=>"float:right; width:100px; border-radius:0; box-shadow: 2px 3px 3px 1px #888888;"))!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('custom_js')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            {!! FormAutocomplete::selector('#name')->db('medication', 'name') !!}
        });

        $(function()
        {
            $( "#name" ).autocomplete({
                serviceUrl:  "autocomplete",
                dataType: 'json',
                minLength: 1,
                type: 'GET',
                select: function(event, ui) {
                    $('#name').val(ui.item.value);
                }
            });
        });
    </script>
@stop