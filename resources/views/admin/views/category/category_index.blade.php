@extends("admin.layouts.layout")
@section("title","Book Category")

@section("content")


<section class="content-header">
	<h1>
		Books Category List
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div class="container p-4">
	<a href="{{ route('category.create') }}">
		<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
		Add New Category</button>
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
						<th>Book Category</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($category as $cat)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$cat->c_name}}</td>
						<td style="padding: 0%;">
							<a href="category_show/{{ $cat->id }}">
								<button class="button button2"><i class="fa fa-eye" style="font-size: 19px"></i></button>
							</a>
							<a href="category_edit/{{ $cat->id }}/edit">
								<button class="button button"><i class="fa fa-edit" style="font-size: 19px"></i></button>
							</a>
							<a href="category_delete/{{ $cat->id }}">
								<button class="button button3"><i class="fa fa-trash" style="font-size: 19px"></i></button>
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