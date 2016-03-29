@extends('layouts.app')

@section('title')
    <title>Requests | {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</title>
@stop

@section('custom_css')

    <style>
        input{
            color: black
        }
        .modal-body{
            padding: 25px;
        }
        .approved{
            background-color: midnightblue;
        }
        .declined{
            background-color: #880000;
        }
        .items .approved{
            color: green;
        }
        .items .declined{
            color: red;
        }
    </style>

    <!-- datepicker CSS -->
    <link href="{{ 'css/date_picker.css' }}" rel="stylesheet">

@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
@stop

@section('content')
    <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 id="myModalLabel">add new request</h5>
                </div>
                <div class="modal-body">
                        {!! Form::open(array('url'=>'/requests', 'method'=>'post', 'action' => 'RequestsController@store')) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'drug name', 'id'=>'name')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::number('quantity', null, array('required', 'class'=>'form-control', 'style'=>'width: 100px', 'placeholder'=>'0', 'min'=>'0')) !!}
                        </div>
                        <br>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Request', array('class'=>'btn btn-info')) !!}
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <span class="panel-title">
                        <p>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</p>
                       <button class="btn btn-info" onclick="$('#myModal').modal({show:'true'});">Add Request</button>
                    </span>
                </div>
                <div class="panel-body">
                    <?php
                    if(count($requests) < 1)
                        echo '<a href="#" class="list-group-item"><h4 class="items">no requests!</h4><span class="left items"></span></a>';
                    else
                    {
                        //populate
                        foreach($requests as $request)
                        {
                            $date = date_format($request["created_at"],"Y/m/d");
                            echo '<a class="list-group-item '.$request["status"].'">
                                    <h4 class="left items right-align">Date: '.$date.'</h4>
                                    <h4 class="items">Drug Name: '.$request["name"].'</h4>
                                    <h4 class="items"> quantity: '.$request["quantity"].'</h4>
                                    <h4 class="items '.$request["status"].'"> Status: '.$request["status"].'</h4>
                                    Notes:<br><textarea style="color:black" disabled>'.$request["notes"].'</textarea>
                                    </a>
                                    <br>';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
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
        jQuery.noConflict();
    </script>
@stop
