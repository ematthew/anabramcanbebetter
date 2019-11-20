@extends('layouts.admin-skin')

@section('title')
    Users
@endsection

@section('contents')
	<div class="container pt-50">
		<div class="row">
			<div class="col-md-12">
				<a href="javascript:void(0);" onclick="showAddNewUserModal()" class="btn btn-primary float-right">
					<i class="fa fa-plus"></i> 
					Add New User
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 pt-50">
				<h3 class="lead"><i class="fa fa-user"></i> Users</h3>
				<table class="table">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Post published</th>
							<th>Last updated</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody class="load-all-users">
						@php $sn = 0 @endphp
						@foreach($users as $user)
							@php $sn++ @endphp
							<tr>
								<td>{{ $sn }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								
								<td>{{ $user->bio->phone ?? '' }}</td>
								<td>{{ number_format(count($user->articles)) }}</td>
								<td>{{ $user->created_at->diffForHumans() }}</td>
								<td>
									<a href="javascript:void(0);" onclick="viewUserProfile({{ $user }})" class="btn btn-info btn-md">View</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	@include('admin.modals')
@endsection

@section('scripts')
    <script type="text/javascript">
        function showAddNewUserModal() {
        	$("#add-new-user-modal").modal();
        }

        function createNewUser() {
        	var _token 		= $("#token").val();
        	var email 		= $("#email").val();
        	var firstname 	= $("#firstname").val();
        	var lastname 	= $("#lastname").val();
        	var phone 		= $("#phone").val();
        	
        	var query = {_token, email, firstname, lastname, phone}

        	fetch(`{{url('create/new/user')}}`, {
        		method: 'POST',
        		headers: {
        			'Content-Type': 'application/json',
        		},
        		body: JSON.stringify(query)
        	}).then(r => {
        		return r.json();
        	}).then(results => {
        		// console.log(results)
        		swal(
        			results.status,
        			results.message,
        			results.status
        		);

        		if(results.status == "success"){
        			window.location.reload();
        		}
        	}).catch(err => {
        		console.log(JSON.stringify(err));
        	})

        	// return 
        	return false;
        }
    </script>
@endsection