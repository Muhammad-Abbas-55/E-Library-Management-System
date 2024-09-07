@extends("admin.layouts.layout")
@section("title","Book Issue Report")

@section("content")


<section class="content-header">
	<h1>
		Generate Book Issue Report
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol><br>
	<a target="_blank" onclick="window.print()" style="float: right" class="btn btn-default"><i class="fa fa-print">Print</i> Preview</a>


<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="{{ route('issue.reportt') }}">
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
		<div class="col-md-12"> 
<!-- 			<a href="{{ route('bookissue.create') }}">
				
            
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Issue Book
				</button>
			</a> -->
		</div>
	</div>		


	<div class="row">
		<div class="col-md-12 text-center"> 
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
					</tr>
					<?php $no=1; ?>

					@foreach($weekly as $bookissues)
					
					@if(isset($bookissues->student->name))
					<tr>
						<td>{{$no++}}</td>
						<td>{{$bookissues->book->b_title}}</td>
						<td>{{$bookissues->serials->serial_no}}</td>
						<td>{{$bookissues->book->total_copies}}</td>
						<td>{{$bookissues->book->avalible_copies}}</td>
						<td>{{$bookissues->student->name}}</td>
						<td>{{$bookissues->student->reg_no}}</td>
						<td>{{$bookissues->issue_date}}</td>
						<td>{{$bookissues->return_date}}</td>    
						</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>



	

	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}
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
					</tr>
					<?php $no=1; ?>

					@foreach($weekly as $bookissues)
					@if(isset($bookissues->staff->name))
					<tr>
						<td>{{$no++}}</td>
						<td>{{$bookissues->book->b_title}}</td>
						<td>{{$bookissues->serials->serial_no}}</td>
						<td>{{$bookissues->book->total_copies}}</td>
						<td>{{$bookissues->book->avalible_copies}}</td>
						<td>{{$bookissues->staff->name }}</td>
						<td>{{$bookissues->staff->type }}</td>
						<td>{{$bookissues->issue_date}}</td>
						<td>{{$bookissues->return_date}}</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>
</div>
@endsection
