@extends("admin.layouts.layout")
@section("title","Book Issues List")

@section("content")


<section class="content-header">
	<h1>
		Book Issues List
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 30px;">
	
	<div class="row">
		<div class="col-md-12"> 
			<a href="{{ route('bookissue.create') }}">
				
            
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Issue Book
				</button>
			</a>
			<a href="{{ route('check_copies.available') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Check Books Available
				</button>
			</a>
			<a href="{{ route('send.email') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Send Email To Book Late Returns
				</button>
			</a>
		</div>
	</div>		


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
			@if(Session()->has('emailsend'))
			<br>
				<div class="alert alert-success" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('emailsend')}}
				</div>
			@endif
			
	


			<br/>
				<h2>Book Issued to Students</h2>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Book Title</th>
						<th>Book Accession</th>
						<th>Total Books</th>
						<th>Available Books</th>
						<th>Student</th>
						<th>Reg No</th>
						<th>Issue Date</th>
						<th>Return Date</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($bookissue as $bookissues)
					@if(isset($bookissues->student->name))
					@if(isset($bookissues["return_status"]) && $bookissues["return_status"] != "1")
						
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$bookissues->book->b_title}}</td>
						<td>{{$bookissues->serials->serial_no}}</td>
						<td>{{$bookissues->book->total_copies}}</td>
						<td>{{$bookissues->book->avalible_copies}}</td>
						<td>{{$bookissues->student->name}}</td>
						<td>{{$bookissues->student->reg_no}}</td>
						<td>{{$bookissues->issue_date}}</td>
						<td>{{$bookissues->return_date}}</td>

						<td style="padding: 0%; width: 17%;">
						<a href="bookissue_show/{{ $bookissues->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<!-- <a href="bookissue_edit/{{ $bookissues->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a> -->
						<a href="bookissue_delete/{{ $bookissues->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endif
					@endforeach
				</table>
			</div>	
		</div>
	</div>
		<div>
		{{ $bookissue->links() }}
		
	</div>


	

	<div class="row">
		<div class="col-md-12 text-center"> 
			<br/>
				<h2>Book Issued to Staff</h2>

			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Book Title</th>
						<th>Book Accession</th>
						<th>Total Books</th>
						<th>Avalible Books</th>
						<th>Staff</th>
						<th>Staff Type</th>
						<th>Issue Date</th>
						<th>Return Date</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($bookissue as $bookissues)
					@if(isset($bookissues->staff->name))
					@if(isset($bookissues["return_status"]) && $bookissues["return_status"] != "1")

					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$bookissues->book->b_title}}</td>
						<td>{{$bookissues->serials->serial_no}}</td>
						<td>{{$bookissues->book->total_copies}}</td>
						<td>{{$bookissues->book->avalible_copies}}</td>
						<td>{{$bookissues->staff->name }}</td>
						<td>{{$bookissues->staff->type }}</td>
						<td>{{$bookissues->issue_date}}</td>
						<td>{{$bookissues->return_date}}</td>

						<td style="padding: 0%; width: 17%;">
						<a href="bookissue_show/{{ $bookissues->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<!-- <a href="bookissue_edit/{{ $bookissues->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a> -->
						<a href="bookissue_delete/{{ $bookissues->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>

	<div>
		{{ $bookissue->links() }}
		
	</div>
</div>
@endsection
