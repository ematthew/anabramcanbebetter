<!-- Latest News Area Start -->
<section class="razo-latest-news-area bg-overlay bg-img jarallax" style="background-image: url(img/bg-img/32.jpg);">
    <!-- Razo Latest News Slide -->
    <div class="razo-latest-news-slide owl-carousel">

        @foreach($featured_articles as $article)

            <!-- Single Latest News Area -->
            <div class="razo-single-latest-news-area bg-overlay bg-img" style="background-image: url({{ $article->avatar }});">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="{{url('view/article')}}/{{ str_replace(' ', '-', $article->title) }}?id={{ $article->id }}" class="post-title">{{ $article->title }}</a>
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