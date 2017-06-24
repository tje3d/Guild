<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{config('app.name')}} Warmane PVE Guild">
    <meta name="author" content="tje3d">
    <title>@if(isset($title)){{$title}} - @endif{{config('app.name')}} - Caspian PVE Guild</title>
    <link rel="icon" type="image/png" href="/assets/site/images/favicon.png">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300i,400,700%7cMarcellus+SC" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/site/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- IonIcons -->
    <link rel="stylesheet" href="/assets/site/bower_components/ionicons/css/ionicons.min.css">

    <!-- Revolution Slider -->
    <link rel="stylesheet" type="text/css" href="/assets/site/plugins/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="/assets/site/plugins/revolution/css/layers.css">
    {{-- <link rel="stylesheet" type="text/css" href="/assets/site/plugins/revolution/css/navigation.css"> --}}

    <!-- Flickity -->
    <link rel="stylesheet" href="/assets/site/bower_components/flickity/dist/flickity.min.css">

    <!-- Photoswipe -->
    {{-- <link rel="stylesheet" type="text/css" href="/assets/site/bower_components/photoswipe/dist/photoswipe.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="/assets/site/bower_components/photoswipe/dist/default-skin/default-skin.css"> --}}

    <!-- DateTimePicker -->
    <link rel="stylesheet" type="text/css" href="/assets/site/bower_components/datetimepicker/build/jquery.datetimepicker.min.css">

    <!-- Revolution Slider -->
    <link rel="stylesheet" type="text/css" href="/assets/site/plugins/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="/assets/site/plugins/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="/assets/site/plugins/revolution/css/navigation.css">

    <!-- Prism -->
    <link rel="stylesheet" type="text/css" href="/assets/site/bower_components/prism/themes/prism-tomorrow.css">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="/assets/site/bower_components/summernote/dist/summernote.css">

    <!-- GODLIKE -->
    <link rel="stylesheet" href="/assets/site/css/godlike.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/assets/site/css/custom.css">

    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="/assets/site/bower_components/jquery/dist/jquery.min.js"></script>

	@stack('styles')

</head>

<body>

    <div class="nk-preloader">

        <div class="nk-preloader-bg" style="background-color: #000;" data-close-frames="23" data-close-speed="1.2" data-close-sprites=".//assets/site/images/preloader-bg.png" data-open-frames="23" data-open-speed="1.2" data-open-sprites=".//assets/site/images/preloader-bg-bw.png">
        </div>

        <div class="nk-preloader-content">
            <div>
                <img class="nk-img" src="/assets/site/images/logo.png" alt="GodLike - Gaming Bootstrap 4 Template" width="170">
                <div class="nk-preloader-animation"></div>
            </div>
        </div>

        <div class="nk-preloader-skip">Skip</div>
    </div>

    <div class="nk-page-background op-5" data-bg-mp4="/assets/site/video/bg-2.mp4" data-bg-webm="/assets/site/video/bg-2.webm" data-bg-ogv="/assets/site/video/bg-2.ogv" data-bg-poster="/assets/site/video/bg-2.jpg"></div>

    <div class="nk-page-border">
        <div class="nk-page-border-t"></div>
        <div class="nk-page-border-r"></div>
        <div class="nk-page-border-b"></div>
        <div class="nk-page-border-l"></div>
    </div>

    <header class="nk-header nk-header-opaque">

        <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-transparent nk-navbar-autohide">
            <div class="container">
                <div class="nk-nav-table">

                    <a href="http://caspiangc.ir" class="nk-nav-logo">
                        <img src="/assets/site/images/logo.png" alt="" width="90">
                    </a>


                    <ul class="nk-nav nk-nav-right hidden-md-down" data-nav-mobile="#nk-nav-mobile" dir="rtl">
                        <li class="{{Nav::is('home', 'active')}}">
                            <a href="{{route('home')}}"> صفحه نخست</a>
                        </li>
                        <li class="{{Nav::is('rules', 'active')}}">
                            <a href="{{route('rules')}}"> قوانین و مقررات</a>
                        </li>
                        <li class="{{Nav::regex('apply*', 'active')}}">
                            <a href="{{route('apply')}}"> ثبت نام</a>
                        </li>
                        <li class="{{Nav::is('usefulladdons', 'active')}}">
                            <a href="{{route('usefulladdons')}}"> افزونه ها</a>
                        </li>
                        <li class="{{Nav::regex('tactics*', 'active')}}">
                            <a href="{{route('tactics')}}"> تاکتیک ها</a>
                        </li>
                        <li class="{{Nav::is('contact', 'active')}}">
                            <a href="{{route('contact')}}"> ارتباط با ما</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-left-side nk-navbar-overlay-content hidden-lg-up">
        <div class="nano">
            <div class="nano-content">
                <a href="index.html" class="nk-nav-logo">
                    <img src="/assets/site/images/logo.png" alt="" width="90">
                </a>
                <div class="nk-navbar-mobile-content">
                    <ul class="nk-nav">
                        <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="nk-main">
	    @yield('content')
    </div>


    <!--
    START: Side Buttons
        .nk-side-buttons-visible
-->
    <div class="nk-side-buttons nk-side-buttons-visible">
        <ul>
            <li>
                <span class="nk-btn nk-btn-lg nk-btn-icon nk-bg-audio-toggle">
                    <span class="icon">
                        <span class="ion-android-volume-up nk-bg-audio-pause-icon"></span>
                        <span class="ion-android-volume-off nk-bg-audio-play-icon"></span>
                    </span>
                </span>
            </li>
            <li class="nk-scroll-top">
                <span class="nk-btn nk-btn-lg nk-btn-icon">
                    <span class="icon ion-ios-arrow-up"></span>
                </span>
            </li>
        </ul>
    </div>
    <!-- END: Side Buttons -->



    <!--
    START: Search

    Additional Classes:
        .nk-search-light
-->
    <div class="nk-search">
        <div class="container">
            <form action="#">
                <fieldset class="form-group nk-search-field">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search..." name="s">
                    <label for="searchInput"><i class="ion-ios-search"></i></label>
                </fieldset>
            </form>
        </div>
    </div>
    <!-- END: Search -->




    <!--
    START: Shopping Cart

    Additional Classes:
        .nk-cart-light
-->
    
    <!-- END: Shopping Cart -->




    <!-- START: Scripts -->

    <!-- GSAP -->
    <script src="/assets/site/bower_components/gsap/src/minified/TweenMax.min.js"></script>
    <script src="/assets/site/bower_components/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

    <!-- Bootstrap -->
    <script src="/assets/site/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="/assets/site/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Sticky Kit -->
    <script src="/assets/site/bower_components/sticky-kit/dist/sticky-kit.min.js"></script>

    <!-- Jarallax -->
    <script src="/assets/site/bower_components/jarallax/dist/jarallax.min.js"></script>
    <script src="/assets/site/bower_components/jarallax/dist/jarallax-video.min.js"></script>

    <!-- Flickity -->
    <script src="/assets/site/bower_components/flickity/dist/flickity.pkgd.min.js"></script>

    <!-- Jquery Countdown + Moment -->
    <script src="/assets/site/bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>
    <script src="/assets/site/bower_components/moment/min/moment.min.js"></script>
    <script src="/assets/site/bower_components/moment-timezone/builds/moment-timezone-with-data.js"></script>

    <!-- Hammer.js -->
    <script src="/assets/site/bower_components/hammer.js/hammer.min.js"></script>

    <!-- NanoSroller -->
    <script src="/assets/site/bower_components/nanoscroller/bin/javascripts/jquery.nanoscroller.min.js"></script>

    <!-- SoundManager2 -->
    <script src="/assets/site/bower_components/SoundManager2/script/soundmanager2-nodebug-jsmin.js"></script>

    <!-- DateTimePicker -->
    <script src="/assets/site/bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript" src="/assets/site/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="/assets/site/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/assets/site/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="/assets/site/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="/assets/site/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

    <!-- Keymaster -->
    <script src="/assets/site/bower_components/keymaster/keymaster.js"></script>

    <!-- Summernote -->
    <script src="/assets/site/bower_components/summernote/dist/summernote.min.js"></script>

    <!-- Prism -->
    <script src="/assets/site/bower_components/prism/prism.js"></script>

    <script>
    	window.backgroundMusic = "{{\App\Sound::find(Setting::get('music'))->getFirstMedia()->getUrl()}}";
    </script>

    <!-- GODLIKE -->
    <script src="/assets/site/js/godlike.js?r={{md5(config('app.version'))}}"></script>
    <script src="/assets/site/js/godlike-init.js?r={{md5(config('app.version'))}}"></script>
    <!-- END: Scripts -->



    <script type="text/javascript">
    var tpj = jQuery;
    var revapi50;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_50_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_50_1");
        } else {
            revapi50 = tpj("#rev_slider_50_1").show().revolution({
                sliderType: "carousel",
                jsFileLocation: "/assets/site/plugins/revolution/js/",
                sliderLayout: "auto",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    onHoverStop: "off",
                },
                carousel: {
                    maxRotation: 8,
                    vary_rotation: "off",
                    minScale: 20,
                    vary_scale: "off",
                    horizontal_align: "center",
                    vertical_align: "center",
                    fadeout: "off",
                    vary_fade: "off",
                    maxVisibleItems: 3,
                    infinity: "on",
                    space: -90,
                    stretch: "off"
                },
                responsiveLevels: [1240, 1024, 778, 480],
                gridwidth: [800, 600, 400, 320],
                gridheight: [600, 400, 320, 280],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    });
    </script>

</body>

</html>