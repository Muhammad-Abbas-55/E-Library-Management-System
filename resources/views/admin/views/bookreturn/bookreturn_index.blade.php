@extends("admin.layouts.layout")
@section("title","Book Return List")

@section("content")


<section class="content-header">
	<h1>
		Book Return List
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
			<a href="{{ route('bookreturn.create') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Return Book
				</button>
			</a>
			<a href="{{ route('check_copies.available') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Check Books Available
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
			
			<br/>
				<h2>Book Returned by Students</h2>
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
						<th>Actual Return Date</th>
						<th>Fine Status</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($bookreturn as $bookret)
					@if(isset($bookret->bookissue->student->name))
					<tr>
						<td>{{$no++}}</td>
						<td>{{$bookret->bookissue->book->b_title}}</td>
						<td>{{$bookret->bookissue->serials->serial_no}}</td>
						<td>{{$bookret->bookissue->book->total_copies}}</td>
						<td>{{$bookret->bookissue->book->avalible_copies}}</td>
						<td>{{$bookret->bookissue->student->name }}</td>
						<td>{{$bookret->bookissue->student->reg_no }}</td>
						<td>{{$bookret->bookissue->issue_date}}</td>
						<td>{{$bookret->bookissue->return_date}}</td>
						<td>
						@if(@isset($bookret->return_date))
							{{$bookret->return_date}}
							@else
								Lose
							@endif
						</td>
						<td>
							<a href="bookreturn_edit/{{ $bookret->id }}/edit">
						 {{$bookret->status}}</a>
<!-- <form method="post" action="bookreturn_store">
      @csrf
     <div class="row">
        <div class="col-25">
          <label for="status">Fine Status </label>
        </div>
      <div class="col-75">
        <select name="status" id="status" class="form-control">
            <option value="None">Select Fine Status</option>
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
         </select>
      </div>
      </div>
  </form> -->
						</td>

						<td style="padding: 0%; width: 17%;">
						<a href="bookreturn_show/{{ $bookret->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<!-- <a href="bookreturn_edit/{{ $bookret->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a> -->
						<a href="bookreturn_delete/{{ $bookret->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>
	<div>
		{{ $bookreturn->links() }}
		
	</div>

	


	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}
			<br/>
				<h2>Book Returned by Staff</h2>

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
						<th>Actual Return Date</th>
						<th>Fine Status</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($bookreturn as $bookret)
					@if(isset($bookret->bookissue->staff->name))
					<tr>
						<td>{{$no++}}</td>
						<td>{{$bookret->bookissue->book->b_title}}</td>
						<td>{{$bookret->bookissue->serials->serial_no}}</td>
						<td>{{$bookret->bookissue->book->total_copies}}</td>
						<td>{{$bookret->bookissue->book->avalible_copies}}</td>
						<td>{{$bookret->bookissue->staff->name }}</td>
						<td>{{$bookret->bookissue->staff->type }}</td>
						<td>{{$bookret->bookissue->issue_date}}</td>
						<td>{{$bookret->bookissue->return_date}}</td>
						<td>{{$bookret->return_date}}</td>
						<td><a href="bookreturn_edit/{{ $bookret->id }}/edit">
							{{$bookret->status}}</a></td>


						<td style="padding: 0%; width: 17%;">
						<a href="bookreturn_show/{{ $bookret->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<!-- <a href="bookreturn_edit/{{ $bookret->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a> -->
						<a href="bookreturn_delete/{{ $bookret->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>

	<div>
		{{ $bookreturn->links() }}
		
	</div>
</div>
@endsection
