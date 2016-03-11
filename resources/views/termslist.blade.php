@extends('layouts.app')

@section('title')
    <title>Portal | Medical Terms</title>
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
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">

            <div class="panel panel-default">

                <div class="panel-body" style="background-color: #2e3436; ">
                    {!! Form::open(['method'=>'GET','url'=>'terms','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--></i>
                            </button>
                        </span>
                        <div class="reset-btn">
                            <button class="btn btn-xs btn-info btn-circle" onclick="reset()">Reset</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body" style="background-color: #2e3436">
                    @if(count($terms) < 1)
                        <?php $term_info = array(); ?>
                        <a href="#" class="list-group-item"><h4 class="items">No Terms!</h4><span class="left items"></span></a>
                        @else
                        <?php $term_info = array(); ?>
                        @foreach($terms as $term)
                        <?php array_push ($term_info, array( $term["id"], $term["name"], $term["description"])); ?>
                        <a href="#" class="list-group-item" id="{!! $term["id"]!!}" style="color: #000000;" wrap="true">
                            {!! $term["name"]!!}
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom_js')
    <script>
        function reset()
        {
            location.reload(true);
        }

        $(".list-group-item").click(function() {

            var terms = <?php echo json_encode($term_info) ?>;
            var id = parseInt(this.id);   //the id of the term
            var term_info = new Array();
            var found = 0;
            var curPatient = new Array();

            if (terms != null) {
                //first find the note from the list
                for (var i = 0; i < terms.length && found == 0; i++) {
                    curPatient = terms[i];
                    if (curPatient[0] == (id))  //if the current id is equal to the id of the term in array
                    {
                        found = 1;
                        term_info = terms[i];    //set the term info to the correct one given the term id matched
                    }
                }

                //then swap the text!
                if ($(this).text() == term_info[2])
                    $(this).text(term_info[1]);
                else
                    $(this).text(term_info[2]);
            }
        });
    </script>
@stop