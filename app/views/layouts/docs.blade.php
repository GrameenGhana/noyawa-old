<!doctype html>

<html lang="en">

    <head>
        <title>
            @section('title')
            No Yawa Service
            @show
        </title>

        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="author" content="iKreativ">
        <meta name="description" content="No Yawa Service">
        <meta name="keywords" content="noyawa">

        <!-- favicon -->
        <link rel="shortcut icon" href="/favicon.png?v=2">

        <!-- iOS favicons. -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('noyawa/assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('noyawa/assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('noyawa/assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('noyawa/assets/ico/apple-touch-icon-57-precomposed.png') }}}">


        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
        <link rel="stylesheet" href="{{asset('noyawa/assets/css/datatables-bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('noyawa/assets/css/style.css"')}}">

        @yield('styles')

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    </head>

    <body id="index" class="page docs">

        <!-- wrapper -->
        <div id="wrapper">

            <!-- header -->
            <header id="header" role="header">
                <div class="boxed">
                    <!-- tagline -->
                    <div id="tagline">
                        <h1>No Yawa Service</h1>
                    </div>
                    <!-- /tagline -->

                    <!-- version -->
                    <div id="version">
                       <ul class="nolist">
                            <li {{ (Request::is('/noyawa') ? ' class="current"' : '') }} ><a href="/noyawa" title="Home">Home</a></li>
                            <li {{ (Request::is('noyawa/register') ? ' class="current"' : '') }}><a href="{{ url('noyawa/register') }}" title="Register">Register</a></li>
                            <li {{ (Request::is('noyawa/excelupload') ? ' class="current"' : '') }}><a href="{{ url('noyawa/excelupload') }}" title="Upload Excel">Upload Excel</a></li>
                            <li {{ (Request::is('noyawa/viewclients') ? ' class="current"' : '') }}><a href="{{ url('noyawa/viewclients') }}" title="View All Clients">View All Clients</a></li>
                            <li {{ (Request::is('noyawa/viewuploads') ? ' class="current"' : '') }}><a href="{{ url('noyawa/viewuploads') }}" title="View All Uploads">View All Uploads</a></li>
                        </ul>


               
                    </div>
                    <!-- /version -->
                </div>
            </header>
            <!-- /header -->



            <!-- content -->
            <div id="content">

                <!-- docs -->
                <section id="documentation">
                    <article class="boxed">
                        <!-- docs content -->
                        <div id="docs-content">
                            @yield ('contents' )
                        </div>
                        <!-- /docs content -->

                    </article>
                </section>
                <!-- /docs -->

            </div>
            <!-- /content -->


        </div>
        <!-- /wrapper -->

        <!-- copyright -->
        <section id="copyright" class="textcenter">
            <div class="boxed">
                <div class="animated slideInLeft">No Yawa Service. Copyright &copy; <a href="http://grameenfoundation.org" title="Grameen Foundation" target="_blank">Grameen Foundation</a>.  &hearts; <a href="http://twitter.com" title="Twitter" target="_blank">Twitter</a> &hearts; <a href="http://facebook.com" title="Facebook" target="_blank">Facebook</a>.</div>
            </div>
        </section>
        <!-- /copyright -->

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="{{asset('noyawa/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
        <script src="{{asset('noyawa/assets/js/datatables-bootstrap.js')}}"></script>
        <script src="{{asset('noyawa/assets/js/datatables.fnReloadAjax.js')}}"></script>

        
        
        <!-- load up our js -->
        <script src="{{asset('noyawa/assets/js/plugins.js')}}"></script>
         <script src="{{asset('noyawa/assets/js/application.js')}}"></script>


         <!-- fonts -->
    <script src="http://use.edgefonts.net/source-sans-pro:n3,i3,n4,i4,n6,i6,n7,i7.js"></script>
    <script src="http://use.edgefonts.net/source-code-pro.js"></script>

        @yield('scripts')
    </body>
</html>
