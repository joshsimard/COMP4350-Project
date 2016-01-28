@extends('layout')
@section('custom_css')
    <style>
        body {
            background-image: url("http://books.maxoffsky.com/img/stardust.png");
        }

    </style>
@stop

@section('content')

    <div class="page-header">
        <h1>Client List</h1>
    </div>

    <div class="list-group">

     
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
               echo '<a href="#" class="list-group-item"><h4>'.$patient.'</h4><span class="left">ID#: '.$id.'</span></a>';
            }

        ?>

    </div>
@stop