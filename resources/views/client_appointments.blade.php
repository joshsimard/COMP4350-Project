@extends('layouts.app')

@section('title')
    <title>Portal | Home</title>
@stop

@section('custom_css')
    <style>

        .top-buffer {
            margin-top: 60px;
        }

        .logout-button  {
            text-align: right;
            float: right;
        }
    </style>
@stop

@section('header_links')
    {{--insert name of link--}}
    <?php $nav_link = "home";?>
    @include('inc.navigation_link')
@stop

@section('content')
@stop