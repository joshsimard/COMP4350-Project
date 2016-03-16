@extends('layouts.app')

@section('title')
    <title>Portal | Medications</title>
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

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-4 col-md-offset-4">
            <div class="panel panel-default" style="background-color: #485563">
                <div class="panel-heading">
                    <h4 class="name">Medication list</h4><br>
                    <div class="order-btn">
                        <button class="btn btn-default" onclick="location.href = '{{ url('order_medication') }}'">
                            Order Medication
                        </button>
                    </div>
                </div>
                <div class="panel-body" style="background-color: #4e5d6c">
                    <?php
                    if(count($medications) < 1)
                        echo '<a href="#" class="list-group-item"><h4 class="items">No Medications!</h4><span class="left items"></span></a>';
                    else
                    {
                        //populate
                        foreach($medications as $medication)
                        {
                            echo '<a href="" class="list-group-item">
                                    <h4 class="left items right-align">Quantity: '.$medication["quantity"].'</h4>
                                    <h4 class="items"> Name: '.$medication["name"].'</h4>
                                    </a>';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
@stop