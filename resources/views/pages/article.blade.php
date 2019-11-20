@extends('layouts.article-skin')

@section('title')
    {{ $article->title }}
@endsection

@section('contents')
	<!-- Blog Details Post Thumbnail Area Start -->
    <section class="blog-details-post-thumbnail-area bg-overlay bg-img jarallax" style="background-image: url({{ $article->avatar }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="post-title-text">
                        <h2>{{ $article->title }}</h2>
                        <div class="post-meta">
                            <a href="#">{{ $article->created_at->isoFormat('dddd D') }}</a>
                            <a href="#">Post by EBN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Post Thumbnail Area End -->

    <!-- Blog Details Area Start -->
    <section class="blog-details-area section-padding-80">
        <div class="container">
            <!-- Post Details Text -->
            <div class="post-details-text">
                <div class="row justify-content-center">
                    <div class="col-2 col-md-2 col-lg-1">
                        <!-- Post Share -->
                        <div class="razo-post-share">
                            <h5>Share</h5>
                            <a href="#" data-toggle="tooltip" data-placement="left" onclick="shareToFacebook({{ json_encode($article) }})" title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Google Plus" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Instagram" class="instagram"><i class="fa fa-instagram"></i></a>

                            <!-- Your share button code -->
                            <div class="fb-like" data-href="{{ Request::url() }}" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true"></div>
                        </div>
                    </div>

                    <div class="col-10 col-md-10 col-lg-9">
                        
                        {!! $article->contents !!}

                        <!-- Post Catagories -->
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Post Catagories -->
                            <div class="post-catagories">
                                <ul class="d-flex flex-wrap align-items-center">
                                    <li><i class="fa fa-tag"></i> Tag:</li>
                                    <li><a href="#">Tutorials</a></li>
                                    <li><a href="#">Business</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Comments Area -->
                        <div class="comment_area mb-50 clearfix">
                            <h5 class="title">Comments</h5>

                            <ol id="load-comments">
                                @foreach($article->comments as $comment)
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                @if($comment->user->avatar == null)
                                                    <img src="{{asset('img/bg-img/15.jpg')}}" alt="author">
                                                @else
                                                    <img src="{{ $comment->user->avatar }}" alt="author">
                                                @endif
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="author-name">{{ $comment->user->name }}
                                                    <span class="post-date">- {{ $comment->created_at->isoFormat('dddd D - Y') }}</span></a>
                                                <p>{{ $comment->message }}</p>
                                                <a href="#" class="like">Like</a>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>

                        <!-- Leave A Reply -->
                        <div class="razo-contact-form">
                            <h2 class="mb-4">Leave A Comment</h2>

                            <!-- Form -->
                            <form method="POST" onsubmit="return postNewComment()">
                                <input type="hidden" id="article_id" value="{{ $article->id }}" name="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" id="message_name" name="message-name" class="form-control mb-30" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" id="message_email" name="message-email" class="form-control mb-30" placeholder="Email">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" id="message" class="form-control mb-30" placeholder="Comment"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn razo-btn mt-15">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Area End -->

    <!-- Related News Area Start -->
    <div class="related-news-area">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <h2>RELATED STORIES</h2>
                    </div>
                </div>
            </div>

            <div class="row" id="load-related-stories"></div>
        </div>
    </div>
    <!-- Related News Area End -->

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
@endsection

@section('scripts')
    
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
    <script type="text/javascript">
        loadRelatedArticle();

        function loadRelatedArticle() {
            fetch("{{url('fetch/related/articles')}}").then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
                $("#load-related-stories").html("");
                $.each(results, function(index, val) {
                    $("#load-related-stories").append(`
                        <!-- Single Blog Item -->
                        <div class="col-12 col-sm-6 col-lg-4 razo-blog-masonary-item mb-80">
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

        function postNewComment() {
            var _token  = $("#token").val();
            var name    = $("#message_name").val();
            var email   = $("#message_email").val();
            var message = $("#message").val();
            var article_id = $("#article_id").val();

            var query = {_token, name, email, message, article_id};
            console.log(query);

            fetch("{{url('add/new/comment')}}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': _token,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(query)
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
                if(results.status == "success"){
                    swal(
                        "Ok",
                        results.message,
                        results.status
                    );
                    window.location.reload();
                }else{
                    swal(
                        "Ok",
                        results.message,
                        results.status
                    );
                }
            }).catch(err => {
                console.log(JSON.stringify(err));
            })

            // void form
            return false;
        }

        function shareToFacebook(article) {
            article.url = '{{ Request::url() }}'
            // console.log(article);
            article.contents.replace(/"/g, "");

            article.title.replace(/"/g, "");

            // share to facebook
            shareOverrideOGMeta(article.url, article.title, article.contents, article.avatar);
        }

        // share overide meta data
        function shareOverrideOGMeta(url, title, description, avatar){
            FB.ui({
                method: 'share',
                action_type: 'og.shares',
                mobile_iframe: false,
                display: 'popup',
                redirect_uri: url,
                action_properties: JSON.stringify({
                    object: {
                        'title': title,
                        'description': description,
                        'author': 'EBN',
                        'og:url': url,
                        'og:title': title,
                        'og:description': description,
                        'og:image': avatar
                    }
                })
            },
            function (response) {
                // Action after response
                // window.location.reload();
                console.log(response);
                // window.close();
            });
        }
    </script>
@endsection