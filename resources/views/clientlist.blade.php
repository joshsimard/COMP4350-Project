@extends('layouts.app')

@section('custom_css')
    <style>

         /*Color list background and text*/
        .list-group-item{background-color: #dddddd;}
        .list-group-item .items{color: #000000;}

    </style>
@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "clientlist";?>
    @include('inc.navigation_link')
@stop

@section('content')

    <div class="list-group col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">

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
@stop