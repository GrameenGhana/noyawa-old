<!doctype html>

<html lang="en">

<head>
    <title>No Yawa Service.</title>

    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
    <meta name="author" content="iKreativ">
    <meta name="description" content="Laravel - The PHP framework for web artisans.">
    <meta name="keywords" content="laravel, php, framework, web, artisans, taylor otwell">

    <!-- favicon -->
    <link rel="shortcut icon" href="/favicon.png?v=2">

    <!-- we're minifying and combining all our css -->
    <link href="noyawa/assets/css/style.css" rel="stylesheet">

    <!-- grab jquery from google cdn. fall back to local if offline -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.js"><\/script>')</script>

    <!-- prettyprint -->
    <script src="http://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>

    <!-- load up our js -->
    <script src="noyawa/assets/js/plugins.js"></script>
    <script src="noyawa/assets/js/application.js"></script>

    <!-- fonts -->
    <script src="http://use.edgefonts.net/source-sans-pro:n3,i3,n4,i4,n6,i6,n7,i7.js"></script>
    <script src="http://use.edgefonts.net/source-code-pro.js"></script>

    
</head>

<body id="index" class="page home">

    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6 -->
	<!--[if lt IE 7]>
		<p>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
	<![endif]-->

	<!-- wrapper -->
    <div id="wrapper">

    @yield('content')

    </div>
    <!-- /wrapper -->

    <!-- copyright -->
    <section id="copyright" class="textcenter">
        <div class="boxed">
            <div class="animated slideInLeft">No Yawa Service. Copyright &copy; <a href="http://grameenfoundation.org" title="Grameen Foundation" target="_blank">Grameen Foundation</a>.  &hearts; <a href="http://twitter.com" title="Twitter" target="_blank">Twitter</a> &hearts; <a href="http://facebook.com" title="Facebook" target="_blank">Facebook</a>.</div>
        </div>
    </section>
    <!-- /copyright -->

</body>
</html>
