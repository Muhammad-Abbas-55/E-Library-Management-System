@extends("admin.layouts.layout")
@section("title","Students")

@section("content")


<section class="content-header">
	<h1>
		Students List
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 15px;">
	<a href="{{ route('student.create') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Add New Student</button>
	</a>

	<a href="{{ route('student.exportexcel') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Export Students via Excel</button>
	</a>

	<a href="{{ route('student.exportcsv') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Export Students via CSV</button>
	</a>

	<a href="{{ route('student.imp') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Import Students</button>
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
						<th>Student Name</th>
						<th>Father Name</th>
						<th>Email</th>
						<!-- <th>Password</th> -->
						<th>Cell No</th>
						<th>Gender</th>
						<th>Registration No</th>
						<th>Cnic</th>
						<th>Batch</th>
						<th>Department</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($student as $std)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$std->name}}</td>
						<td>{{$std->fname}}</td>
						<td>{{$std->email}}</td>
						<!-- <td>{{$std->password}}</td> -->
						<td>{{$std->cell_no}}</td>
						<td>{{$std->gender ? 'Male' : 'Female'}}</td>
						<td>{{$std->reg_no}}</td>
						<td>{{$std->cnic}}</td>
						<td>{{$std->batch}}</td>
						<td>{{$std->department}}</td>


						<td style="padding: 0%;">
							<a href="student_show/{{ $std->id }}">
								<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
							</a>
							<a href="student_edit/{{ $std->id }}/edit">
								<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
							</a>
							<a href="student_delete/{{ $std->id }}">
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