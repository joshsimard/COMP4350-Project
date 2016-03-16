@extends('layouts.app')

@section('title')
    <title>Requests</title>
@stop

@section('custom_css')

    <style>
        input{
            color: black
        }
        input[type=number]{
            width: 75px;
        }
        .modal-body{
            padding: 25px;
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
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <span class="panel-title">
                        <p>client requests</p>
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
                            echo '<a class="list-group-item">
                                    <p class="left items right-align">Date: '.$date.'
                                    </p><h4 class="items">Client: '.$request["client"].'</h4>
                                    <h4 class="items">Drug Name: '.$request["name"].'</h4>';
                            echo Form::open(array("url" => "/request"));
                            echo Form::hidden('id', $request["id"]);
                            echo Form::number("quantity", $request["quantity"], array("min" => 0));
                            echo '<br><br>'.Form::text("notes", $request["notes"]);
                            echo '<br><br>';
                            echo Form::submit('approved', ['name' => 'action', 'class' => 'btn btn-info']);
                            echo '&emsp;'.Form::submit('declined', ['name' => 'action', 'class' => 'btn btn-danger']);
                            echo Form::close();
                            echo '</a>
                                    <br>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
@stop
