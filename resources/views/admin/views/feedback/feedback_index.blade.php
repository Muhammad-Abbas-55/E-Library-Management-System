@extends("admin.layouts.layout")
@section("title","Feedback")

@section("content")


<section class="content-header">
	<h1>
		Feedback
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div class="container p-4">
	<div class="row">
		<div class="col-md-12 text-center">

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
						<th>Registration No</th>
						<th>Feedback Title</th>
						<th>Feedback Description</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($feedback as $feed)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$feed->registration}}</td>
						<td>{{$feed->message_title}}</td>
						<td>{{$feed->feedback}}</td>
						<td style="padding: 0%;">
							<a href="feedback_delete/{{ $feed->id }}">
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