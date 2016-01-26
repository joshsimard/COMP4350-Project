<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Calendar</title>

    <!-- Bootstrap CSS served from a CDN -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.0/superhero/bootstrap.min.css" rel="stylesheet">

    <!-- Pickadate CSS -->
    <link href="vendor/Pickadate/css/default.css" rel="stylesheet">
    <link href="vendor/Pickadate/css/default.date.css" rel="stylesheet">

    <style>
        .top-buffer {
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <div class="top-buffer"></div>
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h1 class="panel-title">Pick a date:</h1>
                </div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <form>
                                    <input id="date" name="date" type="text" placeholder="Choose a date...">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <form>
                                    <input type="submit" value="submit" class="btn btn-info btn-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- Bootstrap JS served from a CDN -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <!-- Pickadate JS -->
    <script src="vendor/Pickadate/js/picker.date.js"></script>
    <script src="vendor/Pickadate/js/picker.js"></script>

    <!-- After including the date picker scripts -->
    <script>$(function() {/* Enable Pickadate on an input field*/ $('#date').pickadate();});</script>
</body>
</html>