@extends('layouts.app')

@section('title')
    <title>Portal | Notes</title>
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
    @include('inc.doctors_nav_links')
@stop

@section('content')
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">Notes<div class="add-button"><a href="/add/note" name="add_note"><span class="glyphicon glyphicon-plus" style="color: rgb(91, 192, 222)"></span></a></div></h5>
                </div>
                <div class="panel-body" style="background-color: #2e3436; ">
                    {!! Form::open(['method'=>'GET','url'=>'notes','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

                    <div class="input-group custom-search-form">
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
            </div>

            <div class="panel panel-default">
                <div class="panel-body" style="background-color: #2e3436">
                    @if(count($notes) < 1)
                        <a href="#" class="list-group-item"><h4 class="items">No Clients!</h4><span class="left items"></span></a>
                    @else
                        <?php $patient_info = array(); ?>
                        @foreach($notes as $note)
                            <?php array_push ($patient_info, array( $note["id"], $note["subject"], $note["body"])); ?> <!-- Make an array of all the clients to send to jquery -->
                            <a href="#" class="list-group-item" id="{!! $note["id"]!!}" style="color: #000000;" wrap="true"> <!-- Should be note id -->
                                {!! $note["subject"]!!}
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

            var patients = <?php echo json_encode($patient_info) ?>;
            var id = parseInt(this.id);   //the id of the note
            var patient_info = new Array();
            var found = 0;
            var curPatient = new Array();

            //first find the note from the list
            for (var i=0; i<patients.length && found==0; i++)
            {
                curPatient = patients[i];
                if(curPatient[0]==(id))  //if the current id is equal to the id of the note in array
                {
                    found = 1;
                    patient_info = patients[i];    //set the note info to the correct one given the note id matched
                }
            }

            //then swap the text!
            if ($(this).text() == patient_info[2])
                $(this).text(patient_info[1]);
            else
                $(this).text(patient_info[2]);
        });
    </script>
@stop