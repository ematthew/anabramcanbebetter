<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ env("APP_NAME") }} | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Oswald:200,300,400,500,600,700");
        @import url({{asset('css/bootstrap.min.css')}});
        @import url({{asset('css/animate.css')}});
        @import url({{asset('css/default-assets/classy-nav.css')}});
        @import url({{asset('css/default-assets/audioplayer.css')}});
        @import url({{asset('css/owl.carousel.min.css')}});
        @import url({{asset('css/magnific-popup.css')}});
        @import url({{asset('css/font-awesome.min.css')}});
        @import url({{asset('css/style.css')}});
    </style>
</head>

<body>
    <input type="hidden" id="token" value="{{ csrf_token() }}" name="">
    
    <!-- Preloader -->
    <div id="preloader">
        <div>
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
            <span>Wait, please...</span>
        </div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area -->
    @include('components.admin_header_area')

    @yield('contents')


    <!-- Footer Area -->
    @include('components.admin_footer_area')

    <!-- All JS Files -->

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Popper -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- All Plugins -->
    <script src="{{asset('js/razo.bundle.js')}}"></script>
    <!-- Active -->
    <script src="{{asset('js/default-assets/active.js')}}"></script>

    <script src="{{asset('js/sweetalert.min.js')}}"></script>

    @yield('scripts')
</body>
</html>