@extends('layout')

@section('custom_css')
    <style>
        body
        {
            background-image: url("http://books.maxoffsky.com/img/stardust.png");
        }

         /*Color list background and text*/
        .list-group-item{background-color: #dddddd;}
        .list-group-item .items{color: #000000;}

    </style>
@stop

@section('header_links')
    <ul class="nav navbar-nav">
        <li class="active"><a href="/home"><h4>Home</h4> <span class="sr-only">(current)</span></a></li>
        <li><a href="/calendar"><h4>Appointments</h4></a></li>
        <li class="navbar-right"><a href="auth/logout"><h4 class="glyphicon glyphicon-log-out"></h4></a></li>
    </ul>
@stop

@section('content')


    {{--<div class="page-header">--}}
        {{--<h2>Client List</h2>--}}
    {{--</div>--}}

    <div class="list-group col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">

     
        <?php

            //controller returns array of clients{id,name,}
            $clients = array
            (
                    "317721" => "Trump",
                    "009721" =>  "Kanye West",
                    "323765" =>"Booby Ray",
                    "309721" =>"Amber Rose",
                    "895321" =>"Drake",
                    "314252" =>"Nadia Buhari",
                    "912955" =>"Edmond Lazlo",
                    "000951" =>"Kevi Hart",
                    "110952" =>"Tesla Apple"
            );

            foreach($clients as $id => $patient)
            {
               echo '<a href="#" class="list-group-item"><h4 class="items">'.$patient.'</h4><span class="left items">ID#: '.$id.'</span></a>';
            }

        ?>

    </div>
@stop