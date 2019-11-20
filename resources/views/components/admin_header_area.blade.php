<!-- Header Area Start -->
<header class="header-area" >
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off" style="background-color: green;">
            <div class="container" >
                
                @if(Auth::guard('admin')->check())
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="razoNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="{{url('admin/dashboard')}}">
                            <img src="{{asset('img/core-img/l.png')}}" alt="">
                        </a>

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
                                    <li><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li><a href="{{url('admin/articles')}}">Articles</a></li>
                                    @if(Auth::guard('admin')->user()->role == 1)
                                        <li><a href="{{url('admin/musics')}}">Musics</a></li>
                                        <li><a href="{{url('admin/videos')}}">Videos</a></li>
                                        <li><a href="{{url('admin/events')}}">Events</a></li>
                                        <li><a href="{{url('admin/wnews')}}">World News</a></li>
                                        <li><a href="{{url('admin/users')}}">Users</a></li>
                                        <li><a href="{{url('admin/settings')}}">Settings</a></li>
                                        <li><a href="{{url('admin/logout')}}">Logout</a></li>
                                    @else
                                        <li><a href="{{url('admin/settings')}}">Settings</a></li>
                                        <li><a href="{{url('admin/logout')}}">Logout</a></li>
                                    @endif
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
                @endif
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->