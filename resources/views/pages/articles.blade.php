@extends('layouts.web-skin')

@section('title')
    Articles
@endsection

@section('contents')
	<!-- Latest News Area Start -->
    <section class="razo-latest-news-area bg-overlay bg-img jarallax" style="background-image: url(img/bg-img/32.jpg);">
        <!-- Razo Latest News Slide -->
        <div class="razo-latest-news-slide owl-carousel">

            @foreach($featured_articles as $article)

                <!-- Single Latest News Area -->
                <div class="razo-single-latest-news-area bg-overlay bg-img" style="background-image: url({{ $article->avatar }});">
                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="{{url('article')}}/{{$article->id}}" class="post-title">{{ $article->title }}</a>
                        <p>{!! str_limit($article->contents, $limit = 150, $end = '...') !!}</p>
                    </div>
                    <!-- Post Date -->
                    <div class="post-date">
                        <h2>{{ $article->created_at->isoFormat('D') }}</h2>
                        <p>{{ $article->created_at->isoFormat('dddd') }}</p>
                    </div>
                    <!-- Read More -->
                    <div class="read-more-btn">
                        <a href="{{url('article')}}/{{$article->id}}" class="btn">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Latest News Area End -->

    <!-- News Area Start -->
    <section class="uza-news-area section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" id="load-all-articles">
                <!-- Single Blog Item -->
                <div class="col-12 col-sm-6 col-lg-4 razo-blog-masonary-item mb-30">
                    <div class="razo-blog-masonary-single-item">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="img/bg-img/44.jpg" alt=""></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <div class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> March 19, 2018</div>
                            <a href="#" class="post-title">Does our economic model need a re-think?</a>
                            <p>Bill Gates says there's something and fundamentally wrong with our economic model.</p>
                            <a href="#" class="btn read-more-btn">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn razo-btn mt-30">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- News Area End -->

@endsection

@section('scripts')
    <script type="text/javascript">
        loadAllArticles();

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
                $.each(results, function(index, val) {
                    $("#load-all-articles").append(`
                        <div class="col-12 col-sm-6 col-lg-4 razo-blog-masonary-item mb-30">
                            <div class="razo-blog-masonary-single-item">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <a href="{{url('article')}}/${val.id}"><img src="${val.avatar}" alt=""></a>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> ${val.created_at}</div>
                                    <a href="{{url('article')}}/${val.id}" class="post-title">${val.title}</a>
                                    <p>${truncate(val.contents, 30, '...')}</p>
                                    <a href="{{url('article')}}/${val.id}" class="btn read-more-btn">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    `);
                });
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