@extends('layouts.admin-skin')

@section('title')
    Articles
@endsection

@section('contents')
    <div class="container">
    	<div class="row section-padding-80">
    		<div class="col-md-12">
    			<h1><strong> World News </strong>
    				<button class="btn razo-btn w-10" onclick="updateNews(1, 'mtv-news')">
    					MTV Base
    				</button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'cnn')">
                        CNN
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'fox-news')">
                        FOX
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'bloomberg')">
                        BLOOMBERG Base
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'al-jazeera-english')">
                        AL-JAZEERA
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'time')">
                        TIME
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'google-news')">
                        GOOGLE
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'the-new-york-times')">
                        NEW YORK TIMES
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(9, 'nigeria')">
                        NIGERIA
                    </button>
                    <button class="btn razo-btn w-10" onclick="updateNews(1, 'africa')">
                        AFRICA
                    </button>
    			</h1>
    			<hr />
    		</div>
    	</div>
    </div>

    {{-- Modal Section --}}
    @include('admin.modals')
@endsection

@section('scripts')
    <script type="text/javascript">
        function updateNews(filter, channel) {
            var _token = $("#token").val();
            fetch(`{{url('update/remote/news')}}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({_token, filter, channel})
            }).then(r => {
                return r.json();
            }).then(results => {
                console.log(results);
                if(results.status == "success"){
                    swal(
                        "Awesome",
                        results.message,
                        results.status
                    );
                }else{
                    swal(
                        "Ops!",
                        results.message,
                        results.status
                    );
                }
            }).catch(err => {
                console.log(JSON.stringify(err));
            })
        }
    </script>
@endsection