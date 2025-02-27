jQuery(document).ready(function($) {

    // select text inputs
    $('input[type=text], textarea').focus(function() {
        $(this).select();
    });

    

    // sticky nav
    var nav      = $('nav#primary');
    var content  = $('#content');
    var docs     = $('#docs-content');
    var isFixed  = false;
    var $w       = $(window);

    

    // make sure nav stays full width on resize
    $( window ).resize(function() {
        $( "nav#primary" ).css({ width: '100%' });
    });

    // parallax header
    $(window).scroll( function()
    {
		var scroll = $(window).scrollTop(), slowScroll = scroll/2;
		$('#header').css({ transform: "translateY(" + slowScroll + "px)" });
	});

    // footer z-index fix for ie
    $(window).scroll(function(){
        if ( $(window).scrollTop() >= 400)
        {
            $('#copyright').css({ 'z-index' : 22});
        }
        else
        {
            $('#copyright').css({ 'z-index' : 1});
        }
    });

    // quotes scroll
    var scrollSpeed = 80;
    var current = 0;
    var direction = 'h';

    function bgscroll()
    {
        current -= 1;
        $('#quotes').css("backgroundPosition", (direction == 'h') ? current+"px 0" : "0 " + current+"px");
    }
    setInterval(bgscroll, scrollSpeed);

    // quotes fade
    $('#quote > li').hide();
    $('#quote > li').fadeLoop({ fadeIn: 1000, stay: 5000, fadeOut: 500 });

    /*
    // docs drop menu
    $('#documentation nav#docs ul li').click(function(){
       $(this).find('ul:first').stop(true, true).animate({
                height: ['toggle', 'swing'],
                opacity: 'toggle'
          }, 200, 'linear');
    });
    */

    // scrolling docs nav
    /*
    var $sidebar   = $("nav#docs"),
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 50;

    $window.scroll(function(){
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        }
        else
        {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
    */

    // heading links
    $('#docs-content').find('a[name]').each(function () {
        var anchor = $('<a href="#' + this.name + '">');
        $(this).parent().next('h2').wrapInner(anchor);
    });

    // prettyprint
    $('pre').addClass('prettyprint');

	// uniform
	$('select, input:checkbox, input:radio, input:file').uniform();

});
