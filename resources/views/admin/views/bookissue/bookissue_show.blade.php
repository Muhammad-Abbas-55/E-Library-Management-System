@extends("admin.layouts.layout")
@section("title","Detals for Book Issue")

@section("content")


<section class="content-header">
	<h1>
		Book Issue Details
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>


<div class="container p-4">
	
	<div class="row">
		<div class="col-md-8"> 
			<a href="{{ route('bookissue.index') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Back
				</button>
			</a>
		</div>
	</div>		


   @if(isset($bookissue->student->name))
	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
			<div class="table-responsive" style="padding: 5%;  border-radius: 10%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting this Page</p>
					<p ><strong>Book Title :</strong> {{ $bookissue->book->b_title }}</p>
					<p><strong>Book ISBN No :</strong> {{ $bookissue->book->b_isbn }}</p>
					<p><strong>Book Edition :</strong> {{ $bookissue->book->b_edition }}</p>
					<p><strong>Student Name :</strong> {{ $bookissue->student->name }}</p>
					<p><strong>Student Email :</strong> {{ $bookissue->student->email }}</p>
					<p><strong>Student Cell No :</strong> {{ $bookissue->student->cell_no }}</p>
					<p><strong>Student Department :</strong> {{ $bookissue->student->department }}</p>
					<p><strong>Student Registration No :</strong> {{ $bookissue->student->reg_no }}</p>
					<p><strong>Book Category :</strong> {{ $bookissue->book->category->c_name }}</p>
					<p><strong>Issue Date :</strong> {{ $bookissue->issue_date }}</p>
					<p><strong>Return Date :</strong> {{ $bookissue->return_date }}</p>
					<p><strong>Total Copies :</strong> {{ $bookissue->book->total_copies }}</p>
					<p><strong>Available Copies :</strong> {{ $bookissue->book->avalible_copies  }}</p>
			</div>			
			</div>			
		</div>
	</div>
	@endif

  @if(isset($bookissue->staff->name))
	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
			<div class="table-responsive" style="padding: 5%;  border-radius: 10%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting this Page</p>
					<p ><strong>Book Title :</strong> {{ $bookissue->book->b_title }}</p>
					<p><strong>Book ISBN No :</strong> {{ $bookissue->book->b_isbn }}</p>
					<p><strong>Book Edition :</strong> {{ $bookissue->book->b_edition }}</p>
					<p><strong>Staff Name :</strong> {{ $bookissue->staff->name }}</p>
					<p><strong>Staff Email :</strong> {{ $bookissue->staff->email }}</p>
					<p><strong>Staff Type :</strong> {{ $bookissue->staff->type }}</p>
					<p><strong>Staff Cell No :</strong> {{ $bookissue->staff->phone }}</p>
					<p><strong>Staff Email :</strong> {{ $bookissue->staff->email }}</p>
					<p><strong>Book Category :</strong> {{ $bookissue->book->category->c_name }}</p>
					<p><strong>Issue Date :</strong> {{ $bookissue->issue_date }}</p>
					<p><strong>Return Date :</strong> {{ $bookissue->return_date }}</p>
					<p><strong>Total Copies :</strong> {{ $bookissue->book->total_copies }}</p>
					<p><strong>Available Copies :</strong> {{ $bookissue->book->avalible_copies  }}</p>
			</div>			
			</div>			
		</div>
	</div>
	@endif


</div>
@endsection
