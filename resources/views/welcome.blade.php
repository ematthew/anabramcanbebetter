@extends('layouts.web-skin')

@section('title')
    Welcome
@endsection

@section('contents')
    <!-- Welcome Area -->
    @include('components.welcome_area')

    <!-- Blog Area -->
    @include('components.blog_area')

    <!-- Music Chart Area -->
    @include('components.music_chart_area')

    <!-- Trending Video Area -->
    @include('components.trending_video_area')

    <!-- App Download Area -->
    {{-- @include('components.app_download_area') --}}

    <!-- Weekly Schedule Area -->
    {{-- @include('components.weekly_schedule_area') --}}

    <!-- Latest news Area -->
    @include('components.latest_news_area')
@endsection

@section('scripts')
    <script type="text/javascript">
        loadAllArticles();
        loadTrendingArea();

        function loadAllArticles() {
            fetch("{{url('clients/articles')}}", {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(r => {
                return r.json();
            }).then(results => {
                $("#load-all-articles").html("");
                console.log(results[0]);
                $.each(results, function(index, val) {
                    $("#load-all-articles").append(`
                        <!-- Single Post Area -->
                        <div class="col-12 col-md-6">
                            <div class="razo-single-post d-flex mb-30">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <a href="{{url('article')}}/${val.id}"><img src="${val.avatar}" alt=""></a>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        
                                    </div>
                                    <a href="{{url('article')}}/${val.id}" class="post-title">${truncate(val.title, 30, '...')}</a>
                                </div>
                            </div>
                        </div>
                    `);
                });

                // show featured blog post
                $("#feature-article").html("");
                $("#feature-article").append(`
                    <!-- Featured Post Area -->
                    <div class="featured-post-area bg-img bg-overlay mb-30" style="background-image: url(${results[0].avatar});">
                        <!-- Post Overlay -->
                        <div class="post-overlay">
                            <div class="post-meta">
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 2.1k</a>
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 3.6k</a>
                            </div>
                            <a href="{{url('article')}}/${results[0].id}" class="post-title">${results[0].title}</a>
                        </div>
                    </div>
                `);
            }).catch(err => {
                console.log(JSON.stringify(err));
            })
        }

        function loadTrendingArea() {
            fetch("{{url('clients/trending/articles')}}", {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(r => {
                return r.json();
            }).then(results => {
                // console.log(results[0]);
                $("#load-trending-news").html("");
                $.each(results, function(index, val) {
                    $("#load-trending-news").append(`
                        <!-- Single Post Area -->
                        <div class="razo-single-post d-flex mb-30">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <a href="{{url('article')}}/${val.id}"><img src="${val.avatar}" alt=""></a>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta">
                                </div>
                                <a href="{{url('article')}}/${val.id}" class="post-title">
                                    ${truncate(val.title, 40, '...')}
                                </a>
                            </div>
                        </div>
                    `);
                });

                // show featured blog post
                $("#load-feature-trending-news").html("");
                $("#load-feature-trending-news").append(`
                    <!-- Featured Post Area -->
                    <div class="featured-post-area small-featured-post bg-img bg-overlay mb-30" style="background-image: url(${results[0].avatar});">
                        <!-- Post Overlay -->
                        <div class="post-overlay">
                            <div class="post-meta">
                            </div>
                            <a href="{{url('article')}}/${results[0].id}" class="post-title">
                                ${results[0].title}
                            </a>
                        </div>
                    </div>
                `);
            }).catch(err => {
                console.log(JSON.stringify(err));
            })
        }

        function truncate(string, length, delimiter) {
           delimiter = delimiter || "&hellip;";
           return string.length > length ? string.substr(0, length) + delimiter : string;
        };
    </script>
@endsection