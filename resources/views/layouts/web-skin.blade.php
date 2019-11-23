<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ env("APP_NAME") }} | @yield('title')</title>

    {{-- <meta name="description" content="EBN (Ekpoto Blog Network) is a platform that aim to show inside Africa, Entertainment, Lifestyle and News. Showing the world the other side of the picture and uncover hidden stories is always challenging but we are ready to bring sunrise of Africa to the rest of the world." />
    <meta name="keywords" content="Blog, Entertainment, Musics, Arts, Videos, Fashion, Lifestyle, Latest, Trending, News, Headlines, Technology, Twitter, Google, Facebook, Youtube" />
    <meta name="author" content="ekpotoliberty.com" />
    <meta property="fb:app_id" content="1294111604081869" />
    <meta property="og:title" content="EBN, No.1 Africa Entertainment Network"/>
    <meta property="og:image" content="{{env("APP_URL")}}/img/featured-img/1.jpg"/>
    <meta property="og:url" content="{{env("APP_URL")}}"/>
    <meta property="og:site_name" content="{{env("APP_NAME")}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="EBN (Ekpoto Blog Network) is a platform that aim to show inside Africa, Entertainment, Lifestyle and News. Showing the world the other side of the picture and uncover hidden stories is always challenging but we are ready to bring sunrise of Africa to the rest of the world."/> --}}

    {{-- Twitter Section --}}
    {{-- <meta name="twitter:title" content="EBN, No.1 Africa Entertainment Network" />
    <meta name="twitter:image" content="{{env("APP_URL")}}/img/featured-img/1.jpg" />
    <meta name="twitter:url" content="{{env("APP_URL")}}" />
    <meta name="twitter:card" content="EBN (Ekpoto Blog Network) is a platform that aim to show inside Africa, Entertainment, Lifestyle and News. Showing the world the other side of the picture and uncover hidden stories is always challenging but we are ready to bring sunrise of Africa to the rest of the world." /> --}}

    <!-- Favicon -->
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    {{-- Material icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Oswald:200,300,400,500,600,700">

    {{-- Cookie Policy --}}
    {{-- <link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/default-assets/classy-nav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/default-assets/audioplayer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <!-- google -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143698758-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-143698758-1');
    </script> --}}
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

    <!-- Top Search Area -->
    @include('components.top_search_area')

    <!-- Social Share Area -->
    @include('components.social_share_area')

    <!-- Header Area -->
    @include('components.header_area')

    <!-- Yield Body -->
    @yield('contents')

    <!-- Footer -->
    @include('components.footer_area')

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
    
    {{-- cookie policy --}}
    {{-- <script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script> --}}
    <script>window.addEventListener("load", function(){window.wpcc.init({"colors":{"popup":{"background":"#f0edff","text":"#000000","border":"#5e65c2"},"button":{"background":"#5e65c2","text":"#ffffff"}},"position":"bottom","transparency":"25","content":{"href":"ebn.ng","message":"Welcome to EBN Network, this website uses cookies to ensure you get the best experience on our website.","link":"www.ebn.ng/policy"}})});</script>
    
    {{-- <!-- facebook -->
    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script type="text/javascript">
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1294111604081869',
                cookie     : true,
                xfbml      : true,
                version    : 'v3.3'
            });  
            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> --}}
    @yield('scripts')
</body>
</html>