{{--Links for navagivation--}}
<ul class="nav navbar-nav">
    <li class="<?php if($nav_link =="home"){ echo "active"; }?>"><a href="/home"><h4>Home</h4> <span class="sr-only">(current)</span></a></li>
    <li class="<?php if($nav_link =="clientlist"){ echo "active"; }?>"><a href="/clientlist"><h4>Clients</h4></a></li>
</ul>
<span class="navbar-right"><a href="auth/logout"><h4 class="glyphicon glyphicon-log-out"></h4></a></span>