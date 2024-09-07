@extends("admin.layouts.layout")
@section("title","Admin List")

@section("content")
<?php 

 // use DB;
use App\Models\User;
?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
	<h1>
		Admin List
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 30px;">

	<div class="row">
		<div class="col-md-12 text-center"> 


			@if(Session()->has('insert'))
			<br>
				<div class="alert alert-success" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('insert')}}
				</div>
			@endif

			@if(Session()->has('update'))
			<br>
				<div class="alert alert-info" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('update')}}
				</div>
			@endif


			@if(Session()->has('delete'))
			<br>
				<div class="alert alert-danger" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('delete')}}
				</div>
			@endif
			 
			<br/>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Admin Name</th>
						<th>Email</th>
						<th>Password</th>
						<!-- <th>Permition</th> -->
						<th>Action</th>
					</tr>
					<?php $no=1; ?>


					@foreach($users as $user)


					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->password}}</td>
						<!-- <td>{{$user->role}}</td> -->


						<td style="padding: 0%; width: 17%;">
						<!-- <a href="role_edit/{{ $user->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a> -->
						<a href="role_delete/{{ $user->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>			
		</div>
	</div>

<br>
<br>


</div>
@endsection
