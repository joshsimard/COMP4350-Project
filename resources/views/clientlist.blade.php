@extends('layouts.app')

@section('custom_css')
    <style>
         /*Color list background and text*/
        .list-group-item {
            background-color: #dddddd;
            margin-bottom: 5px;
        }

        .list-group-item .items{
            color: #000000;
        }

        .right-align{text-align: right;}

        .panel-heading {
            min-height: 60px;
        }

        .name {
            float:left;
        }

        .reset-btn {
            margin-left: 3px;
            float:right;
        }

        .input-group {
            margin-left: 75px;
            float: right;
        }

        .fa-search{
            color: #000000;
        }

        .panel-body{
            margin-top: 40px;
        }

    </style>
@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "clientlist";?>
    @include('inc.navigation_link')
@stop

@section('content')

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-4 col-md-offset-4">
            <div class="panel panel-default" style="background-color: #485563">
                <div class="panel-heading">
                    <h4 class="name">Client List</h4><br>

                    {!! Form::open(['method'=>'GET','url'=>'clientlist','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                    <div class="input-group custom-search-form col-xs-12 col-sm-6 col-md-4 col-sm-offset-4 col-md-offset-4" style="margin-left:0" >
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--></i>
                            </button>
                        </span>
                        <div class="reset-btn">
                            <button class="btn btn-xs btn-info btn-circle" onclick="reset()">
                                Reset
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="panel-body" style="background-color: #4e5d6c">
                    <?php
                     if(count($clients) < 1)
                         echo '<a href="#" class="list-group-item"><h4 class="items">No Clients!</h4><span class="left items"></span></a>';
                     else
                     {
                         //populate
                         foreach($clients as $patient)
                         {
                             echo '<a href="/visit_form/'.$patient["id"].'" class="list-group-item">
                                    <h4 class="left items right-align">ID: '.$patient["id"].'</h4>
                                    <h4 class="items">Name: '.$patient["firstName"].' '.$patient["lastName"].'</h4>
                                    <h4 class="items"> Email: '.$patient["email"].'</h4>
                                    </a>';
                         }
                     }

                    ?>
                </div>
            </div>
        </div>
    </div>
@stop