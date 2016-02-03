@extends('layouts.app')

@section('custom_css')
    <style>

        .top-buffer {
            margin-top: 60px;
        }

         /*Color list background and text*/
        .list-group-item {
            background-color: #dddddd;
            margin-bottom: 5px;
        }
        .list-group-item .items{color: #000000;}

        /*make border rounded*/
        .list-special .list-group-item:first-child {
            border-top-right-radius: 4px;
            border-top-left-radius: 4px;
        }

        .list-special .list-group-item:last-child {
            border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px;
        }

    </style>
@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "clientlist";?>
    @include('inc.navigation_link')
    @include('inc.doctors_nav_links')
@stop

@section('content')

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Client List</div>
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
                             echo '<a href="#" class="list-group-item"><h4 class="items">'.$patient["firstName"].' '.$patient["lastName"].'</h4><span class="left items">ID#: '.$patient["id"].'</span></a>';
                         }
                     }

                    ?>
                </div>
            </div>
        </div>
    </div>
@stop