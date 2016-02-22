{{--Now in Iteration 2--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon Link -->
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/public/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS served from a CDN -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/sandstone/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    @yield('custom_css')

    <style>

        /*Color brand name and bold it*/
        .navbar-brand .brand-name{
            color: #000000;
            font-weight: bold;
            height: auto;
        }
        .navbar{
            z-index: 2;
        }
        .navbar-toggle {
            margin: 10px 0;
        }

        .centered-form .panel{
            background: rgba(255, 255, 255, 0.8);
            box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
            color: #4e5d6c;
            border-radius: 4px;
        }

        #home-button {
            font-size: 1.5em;
            margin: 5px 1px;
        }

        #content{
            padding-top: 100px;
            padding-bottom: 100px;
        }

    </style>

</head>
<body>

{{--Navigation Bar--}}
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand brand-name" href="{{ url('/') }}">D
                <i id="home-button" class="fa fa-stethoscope"></i>C
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @yield('header_links')
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><h5>Login</h5></a></li>
                    <li><a href="{{ url('/register') }}"><h5>Register</h5></a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           <h4>{{ Auth::user()->firstName }} <span class="caret"></span></h4>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/settings') }}"><h5><i class="fa fa-btn fa-gear"> Settings</i></h5></a></li>
                            <li><a href="{{ url('/logout') }}"><h5><i class="fa fa-btn fa-sign-out"> Logout</i></h5></a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="top-buffer"></div>
<div class="container" id="content">
    @yield('content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
@yield('custom_js')
</body>
</html>
