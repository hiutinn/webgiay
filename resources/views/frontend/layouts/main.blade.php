<!DOCTYPE HTML>
<html>
<head>
    <title>Something</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/frontend/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/frontend/css/form.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/frontend/css/my-style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/frontend/font-awesome/css/font-awesome.min.css">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Owlcarousel -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/frontend/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Include the Etalage files -->
    <link rel="stylesheet" href="/frontend/css/etalage.css">
    <script src="/frontend/js/jquery.etalage.min.js"></script>
    <!-- Include the Etalage files -->
    <script type="text/javascript" src="/frontend/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function () {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function () {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function (e) {
                var $clicked = $(e.target);
                if (!$clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function () {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>
    <!-- start menu -->
    <link href="/frontend/css/megamenu.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/frontend/js/megamenu.js"></script>
    <script>$(document).ready(function () {
            $(".megamenu").megamenu();
        });</script>
    <!-- end menu -->
    <!-- top scrolling -->
    <script type="text/javascript" src="/frontend/js/move-top.js"></script>
    <script type="text/javascript" src="/frontend/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
            });
        });
    </script>

</head>
<body>
@include('frontend.layouts.header')
@include('frontend.layouts.topbar')
@yield('content')
@include('frontend.layouts.footer')

<script src="/frontend/owlcarousel/owl.carousel.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop({easingType: 'easeOutQuart'});


        $('.owl-carousel').owlCarousel({
            loop:false,
            margin:50,
            nav:false,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    });
</script>
@yield('my-js')
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>
