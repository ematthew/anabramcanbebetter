@extends('layouts.admin-skin')

@section('title')
    Unauthorized Access
@endsection

@section('contents')
	<div class="container">
		<div class="row pt-50">
			<div class="col-md-12 text-center">
				<h1 style="font-size: 130px;">
					Unauthorized Access 
				</h1>
				<a href="{{ URL::previous() }}" class="btn btn-danger">
					<i class="fa fa-times"></i> Go Back
				</a>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection