@extends("admin.layouts.layout")
@section("title","Book Returnd Report")

@section("content")


<section class="content-header">
	<h1>
		Generate Book Returnd Report
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol><br>
	<a target="_blank" onclick="window.print()" style="float: right" class="btn btn-default"><i class="fa fa-print">Print</i> Preview</a>

	
<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="{{ route('return.reportt') }}">
      @csrf
      
        <div class="col-md-5">
          <label for="fname">Start Date</label>
          <input type="date" name="fromDate" id="fname" value="{{ old('fromDate')}}">
        </div>

      
        <div class="col-md-5">
          <label for="fname">End Date</label>
          <input type="date" name="toDate" id="fname" value="{{ old('toDate')}}">
      	</div>

      	<div class="col-md-2">
      	<button type="submit">Search</button>
      	</div>


    </form>
  </div>    
</div>	
</section></br>

<div style="padding: 30px;">
	
	<div class="row">
		<!-- <div class="col-md-1">
			<a href="{{ route('bookissue.index') }}">
				<button class="button button2" type="submit" style="font-size: 16px; float: left; margin-top: 3.5px; width: 70px; padding: -5px -9px; border-radius: 60%">ALL</button>
			</a>
		</div>
		 -->
	</div>		


	<div class="row">
		<div class="col-md-12 text-center"> 
			<br/>
				<h2>Book Returned by Students</h2>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Book Title</th>
						<th>Book Accession</th>
						<!-- 
						<th>Total Books</th>
						<th>Available Books</th> -->
						<th>Student</th>
						<th>Reg No</th>
						<th>Issue Date</th>
						<th>Return Date</th>
						<th>Actual Return Date</th>
						<th>Fine Status</th>
					</tr>
					<?php $no=1; ?>

					@foreach($bookreturn as $bookret)
					@if(isset($bookret->bookissue->student->name))
					<tr>
						<td>{{$no++}}</td>
						<td>{{$bookret->bookissue->book->b_title}}</td>
						<td>{{$bookret->bookissue->serials->serial_no}}</td>
						<!-- 
						<td>{{$bookret->bookissue->book->total_copies}}</td>
						<td>{{$bookret->bookissue->book->avalible_copies}}</td> -->
						<td>{{$bookret->bookissue->student->name }}</td>
						<td>{{$bookret->bookissue->student->reg_no }}</td>
						<td>{{$bookret->bookissue->issue_date}}</td>
						<td>{{$bookret->bookissue->return_date}}</td>
						<td>{{$bookret->return_date}}</td>
						<td>{{$bookret->status}}</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>

	


	<div class="row">
		<div class="col-md-12 text-center"> 
			<br/>
				<h2>Book Returned by Staff</h2>

			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Book Title</th>
						<th>Book Accession</th>
						<!-- 
						<th>Total Books</th>
						<th>Avalible Books</th> -->
						<th>Staff</th>
						<th>Staff Type</th>
						<th>Issue Date</th>
						<th>Return Date</th>
						<th>Actual Return Date</th>
						<th>Fine Status</th>
					</tr>
					<?php $no=1; ?>

					@foreach($bookreturn as $bookret)
					@if(isset($bookret->bookissue->staff->name))
					<tr>
						<td>{{$no++}}</td>
						<td>{{$bookret->bookissue->book->b_title}}</td>
						<td>{{$bookret->bookissue->serials->serial_no}}</td>
						<!-- 
						<td>{{$bookret->bookissue->book->total_copies}}</td>
						<td>{{$bookret->bookissue->book->avalible_copies}}</td> -->
						<td>{{$bookret->bookissue->staff->name }}</td>
						<td>{{$bookret->bookissue->staff->type }}</td>
						<td>{{$bookret->bookissue->issue_date}}</td>
						<td>{{$bookret->bookissue->return_date}}</td>
						<td>{{$bookret->return_date}}</td>
						<td>{{$bookret->status}}</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>
</div>
@endsection
