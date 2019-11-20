@extends('layouts.admin-skin')

@section('title')
    Articles
@endsection

@section('contents')
    <div class="container">
    	<div class="row section-padding-80">
    		<div class="col-md-12">
    			<h1><strong> Articles </strong>
    				<button class="btn razo-btn w-10 float-right" onclick="showAddArticleModal()">
    					Write Article
    				</button>
    			</h1>
    			<hr />
    		</div>
    	</div>
    	<br />
      <div class="row">
        <div id="load-articles"></div>
      </div>
    </div>

    {{-- Modal Section --}}
    @include('admin.modals')
@endsection

@section('scripts')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
    		fetchAllArticles();
    		$('#body').summernote('destroy');
    		$('#body').summernote({
    			placeholder: "Type a new article...",
    			height: 200,
    			tabsize: 4,
    			popover: {
					image: [],
					link: [],
					air: []
				}
    		});
    	})

    	function showAddArticleModal() {
    		$("#add-new-article-modal").modal();
    	}
        
        function showEditArticle(article_id) {
            fetch(`{{url('fetch/article/by')}}/${article_id}`).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
                if(results !== null){
                    $("#edit_article_id").val(results.id);
                    $("#edit_title").val(results.title);
                    $("#edit_body").val(results.contents);
                    $("#edit_featured_images").val(results.avatar);
                    $("#edit_category").val(results.category);

                    $("#edit-preview-image").html(`
                        <img src="${results.avatar}" class="img-rounded img-responsive" width="100%" height="200" />
                    `);

                    $('#edit_body').summernote('destroy');
                    $('#edit_body').summernote({
                        placeholder: "Type a new article...",
                        height: 200,
                        tabsize: 4,
                        popover: {
                            image: [],
                            link: [],
                            air: []
                        }
                    });
                }
            }).catch(err => {
                console.log(JSON.stringify(err));
            })

            $("#edit-admin-article-modal").modal();
        }

        function postNewArticle() {
        	var _token 		= $("#token").val();
        	var title 		= $("#title").val();
        	var contents 	= $("#body").val();
        	var avatar      = $("#featured-images").val();
        	var category    = $("#category").val();

        	fetch("{{url('add/new/article')}}", {
        		method: 'POST',
        		headers: {
        			'Content-Type': 'application/json',
        		},
        		body: JSON.stringify({_token, title, contents, avatar, category})
        	}).then(r => {
        		return r.json();
        	}).then(results => {
        		console.log(results)
        		if(results.status == "success"){
        			fetchAllArticles();
        			swal(
        				"Ok",
        				results.message,
        				results.status
        			);
        		}else{
        			swal(
        				"Oops!",
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

        function updateAddedArticle() {
            var _token      = $("#token").val();
            var article_id  = $("#edit_article_id").val();
            var title       = $("#edit_title").val();
            var contents    = $("#edit_body").val();
            var avatar      = $("#edit_featured_images").val();
            var category    = $("#edit_category").val();

            fetch("{{url('update/new/article')}}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({_token, article_id, title, contents, avatar, category})
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results)
                if(results.status == "success"){
                    fetchAllArticles();
                    swal(
                        "Ok",
                        results.message,
                        results.status
                    );
                }else{
                    swal(
                        "Oops!",
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

        function fetchAllArticles() {
        	fetch("{{url('get/all/articles')}}", {
        		method: 'GET',
        		headers: {
        			'Content-Type': 'application/json',
        		}
        	}).then(r => {
        		return r.json();
        	}).then(results => {
        		console.log(results)
        		$("#load-articles").html("");
        		$.each(results, function(index, val) {
        			$("#load-articles").append(`
        				<!-- Single Razo Event Area -->
		                <div class="col-12">
		                    <div class="single-razo-event-area d-flex flex-wrap align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
		                        <!-- Thumbnail -->
		                        <div class="event-thumbnail">
		                            <img src="${val.avatar}" alt="">
		                        </div>
		                        <!-- Event Content -->
		                        <div class="event-content d-flex align-items-center">
		                            <div class="event-text">
		                                <h5>${val.title}</h5>
		                                <div class="event-meta">
		                                    <a href="#" class="event-date"><i class="icon_calendar"></i> March 11, 2018</a>
		                                    <a href="#" class="event-time"><i class="icon_clock_alt"></i> 09.00 - 17.00</a>
		                                    <a href="#" class="event-address"><i class="icon_pin_alt"></i>  Africa - Lagos, Nigeria</a>
		                                </div>
		                                <p>${truncate(val.contents, 150, '...')}</p>
		                                <a href="#" class="btn read-more-btn">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="showEditArticle(${val.id})" class="btn btn-link w-20">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="javascript:void(0);" onclick="deleteArticle(${val.id})" class="btn btn-link w-20">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
        			`);
        		});
        	}).catch(err => {
        		console.log(JSON.stringify(err));
        	})
        }

        function deleteArticle(article_id) {
            var _token      = $("#token").val();
            fetch("{{url('delete/article')}}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({_token, article_id})
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
                    fetchAllArticles(); 
                }else{
                   swal(
                        "Ops",
                        results.message,
                        results.status
                    );
                }
            }).catch(err => {
                console.log(JSON.stringify(err));
            })
        }

        var myWidget = cloudinary.createUploadWidget({
          cloudName: 'delino12', 
          uploadPreset: 'ebnmedia'}, (error, result) => { 
            // console.log(result);
            if (!error && result && result.event === "success") { 
                // console.log('Done! Here is the image info: ', result.info);
                $("#featured-images").val(`${result.info.secure_url}`);
                $("#preview-image").append(`
                	<img src="${result.info.secure_url}" class="img-rounded img-responsive" width="100%" height="200" />
                `);
            }
          }
        )

        document.getElementById("upload_widget").addEventListener("click", function(){
            myWidget.open();
        }, false);

        var myEditWidget = cloudinary.createUploadWidget({
          cloudName: 'delino12', 
          uploadPreset: 'ebnmedia'}, (error, result) => { 
            if (!error && result && result.event === "success") { 
                // console.log('Done! Here is the image info: ', result.info);
                $("#edit_featured_images").val(`${result.info.secure_url}`);
                $("#edit-preview-image").html(`
                    <img src="${result.info.secure_url}" class="img-rounded img-responsive" width="100%" height="200" />
                `);
            }
          }
        )

        document.getElementById("edit_upload_widget").addEventListener("click", function(){
            myEditWidget.open();
        }, false);

        function truncate(string, length, delimiter) {
		   delimiter = delimiter || "&hellip;";
		   return string.length > length ? string.substr(0, length) + delimiter : string;
		};

    </script>
@endsection