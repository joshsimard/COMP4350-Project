<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create a New Patient Record</title>

    <!-- Bootstrap CSS served from a CDN -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.0/superhero/bootstrap.min.css" rel="stylesheet">

    <!-- CSS for Login Page -->
    <link rel="stylesheet" href="assets/css/login.css" type="text/css">

    <style>
        body {
            background-image: url('../../public/img/stardust.png');
        }

        .top-buffer {
            margin-top: 60px;
        }
    </style>
</head>
<body>

<div class="top-buffer"></div>
<div class="container">
    @yield('content')
</div>

<script src="http://code.jquery.com/jqery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>