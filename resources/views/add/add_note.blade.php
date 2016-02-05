@extends('layouts.app')

@section('title')
    <title>Portal | Add Note</title>
@stop

@section('custom_css')
    <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.css">
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
    @include('inc.doctors_nav_links')
@stop

@section('content')
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-6 col-sm-offset-2 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Post a Note</h3>
                </div>
                <div class="panel-body">


                    <form method="POST" action="/" accept-charset="UTF-8"><input name="_token" type="hidden" value="WiWQfGs9uRb8Ze1Nxgv5DJ1qO5UVilS7Tgt6JZBO">
                        <div class="form-group">
                            <label for="name">Post Name</label>
                            <input class="form-control" name="name" type="text" placeholder="Enter a title...">
                        </div>

                        <div class="form-group">
                            <label for="body">Post Body</label>
                            <textarea class="form-control" name="body" placeholder="Enter a message..." cols="50" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tags">Tag Patient</label>
                            <select id="tags-menu" name="tags[]" multiple="multiple">
                                <option value="">Add tags to this post...</option>
                                <?php
                                //populate
                                foreach($clients as $patient)
                                {
                                    echo '<option value="#" selected="selected">'.$patient["firstName"].' '.$patient["lastName"].'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-info btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>

    <script type="text/javascript">
        $(function() {
            // Enable Selectize with an option to create new tags and add the remove button for tags
            $('#tags-menu').selectize({
                plugins: ['remove_button']
            })
        });
    </script>
@stop