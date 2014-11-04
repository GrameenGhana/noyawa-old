<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>No Yawa Service</title>


        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="author" content="iKreativ">
        <meta name="description" content="No Yawa Service">
        <meta name="keywords" content="noyawa">

        <!-- favicon -->
        <link rel="shortcut icon" href="/favicon.png?v=2">

        <!-- iOS favicons. -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">


        <!-- CSS -->
        <link rel="stylesheet" href="/noyawa/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/noyawa/assets/css/bootstrap-theme.css">
        <link rel="stylesheet" href="{{asset('/noyawa/assets/css/datatables-bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('/noyawa/assets/css/style.css"')}}">
        <link rel="stylesheet" href="{{asset('/noyawa/assets/css/jumbotron-narrow.css"')}}">

        @yield('styles')


    </head>

    <body>

        <div class="container">

            <div class="header">
                <ul class="nav nav-pills pull-right">
                    @if(!Auth::check())
                    <li class="active"><a href="/noyawa">Home</a></li>
                    <li><a href="/noyawa/users/login">Login</a></li>
                    <li><a href="/noyawa/users/register">Register</a></li>
                    <li><a href="#">Send Feedback</a></li>
                    @else
                    <li>{{ HTML::link('/noyawa/users/logout', 'logout') }}</li>
                @endif
                </ul>
                <h3 class="text-muted">NoYawa Service</h3>
            </div>

            <div >
                @if(Session::has('message'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>{{ Session::get('message') }}</p>
                    @endif
                </div>    

                    {{ $content }}
            </div>


            </div>
   


        <div class="container">

            <hr>

            <footer>
                <p>© Grameen Foundation 2014</p>
            </footer>
        </div>
<!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="{{asset('noyawa/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
        <script src="{{asset('noyawa/assets/js/datatables-bootstrap.js')}}"></script>
        <script src="{{asset('noyawa/assets/js/datatables.fnReloadAjax.js')}}"></script>


    </body>
</html>
