@extends("admin.layouts.layout")
@section("title","Staff")

@section("content")


<section class="content-header">
	<h1>
		Staff List
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 15px;">
	<a href="{{ route('staff.create') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Add New Staff</button>
	</a>

	<a href="{{ route('staff.exportexcel') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Export Staff via Excel</button>
	</a>

	<a href="{{ route('staff.exportcsv') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Export Staff via CSV</button>
	</a>

	<a href="{{ route('staff.imp') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Import Staff</button>
	</a>


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
			<div class="table-responsive">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Staff Name</th>
						<th>Staff Phone</th>
						<th>CNIC</th>
						<th>Email</th>
						<!-- <th>Password</th> -->
						<th>Gender</th>
						<th>Staff Type</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($staff as $stf)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$stf->name}}</td>
						<td>{{$stf->phone}}</td>
						<td>{{$stf->cnic}}</td>
						<td>{{$stf->email}}</td>
						<!-- <td>{{$stf->password}}</td> -->
						<td>{{$stf->gender ? 'Male' : 'Female'}}</td>
						<td>{{$stf->type}}</td>


						<td style="padding: 0%;">
							<a href="staff_show/{{ $stf->id }}">
								<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
							</a>
							<a href="staff_edit/{{ $stf->id }}/edit">
								<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
							</a>
							<a href="staff_delete/{{ $stf->id }}">
								<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
							</a>       
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>



@endsection