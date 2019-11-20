<!-- Header Area Start -->
<header class="header-area" style="background-image: url(img/core-img/acb1.jpg); text-decoration-color: black; ">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="razoNav">

                    <!-- Logo -->
                    <a style="background-image: url('img/core-img/ac.jpg');" class="nav-brand" href="{{ url('/') }}"><img src="{{asset('img/core-img/ac.jpg')}}" alt=""></a> 

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="#">Trending</a>
                                    <ul class="dropdown">
                                        
                                        <li><a href="{{url('shows')}}">- Show</a></li>
                                        <li><a href="{{url('events')}}">- Event</a></li>
                                        <li><a href="{{url('articles')}}">- Blog</a></li>
                                        <li><a href="{{url('article')}}">- Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('shows')}}">Shows</a></li>
                                
                                <li><a href="{{url('events')}}">Events</a></li>
                                <li><a href="{{url('articles')}}">Blog</a></li>
                            </ul>

                            <!-- Share Icon -->
                            <div class="social-share-icon">
                                <i class="social_share"></i>
                            </div>

                            <!-- Search Icon -->
                            <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->