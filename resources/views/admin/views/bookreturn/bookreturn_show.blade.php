@extends("admin.layouts.layout")
@section("title","Detals for Book Return")

@section("content")


<section class="content-header">
	<h1>
		Book Return Details
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
			<a href="{{ route('bookreturn.index') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Back
				</button>
			</a>
		</div>
	</div>		


   @if(isset($bookreturn->bookissue->student->name))
	<div class="row">
		<div class="col-md-12 text-center"> 
			<br/>
			<div class="table-responsive" style="padding: 5%;  border-radius: 10%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting this Page</p>
					<p ><strong>Book Title :</strong> {{ $bookreturn->bookissue->book->b_title }}</p>
					<p><strong>Book ISBN No :</strong> {{ $bookreturn->bookissue->book->b_isbn }}</p>
					<p><strong>Book Edition :</strong> {{ $bookreturn->bookissue->book->b_edition }}</p>
					<p><strong>Student Name :</strong> {{ $bookreturn->bookissue->student->name }}</p>
					<p><strong>Student Cell No :</strong> {{ $bookreturn->bookissue->student->cell_no }}</p>
					<p><strong>Student Department :</strong> {{ $bookreturn->bookissue->student->department }}</p>
					<p><strong>Student Registration No :</strong> {{ $bookreturn->bookissue->student->reg_no }}</p>
					<p><strong>Book Category :</strong> {{ $bookreturn->bookissue->book->category->c_name }}</p>
					<p><strong>Issue Date :</strong> {{ $bookreturn->bookissue->issue_date }}</p>
					<p><strong>Return Date :</strong> {{ $bookreturn->bookissue->return_date }}</p>
					<p><strong>Actual Return Date :</strong> {{ $bookreturn->return_date }}</p>
					<p><strong>Fine Status :</strong> {{ $bookreturn->status }}</p>
					<p><strong>Lose Fine :</strong> {{ $bookreturn->lose }}</p>
					<!-- @if(isset($bookreturn->fine->f_amount))
					<p><strong>Fine Amount:</strong> {{ $bookreturn->fine->f_amount }}</p>
					@endif -->
					<p><strong>Late Fine :</strong> {{ $bookreturn->fine }}</p>
					<p><strong>Total Copies :</strong> {{ $bookreturn->bookissue->book->total_copies }}</p>
					<p><strong>Available Copies :</strong> {{ $bookreturn->bookissue->book->avalible_copies  }}</p>
			</div>			
		</div>
	</div>
	@endif

  @if(isset($bookreturn->bookissue->staff->name))
	<div class="row">
		<div class="col-md-12 text-center"> 
			<br/>
			<div class="table-responsive" style="padding: 5%;  border-radius: 10%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting this Page</p>
					<p ><strong>Book Title :</strong> {{ $bookreturn->bookissue->book->b_title }}</p>
					<p><strong>Book ISBN No :</strong> {{ $bookreturn->bookissue->book->b_isbn }}</p>
					<p><strong>Book Edition :</strong> {{ $bookreturn->bookissue->book->b_edition }}</p>
					<p><strong>Staff Name :</strong> {{ $bookreturn->bookissue->staff->name }}</p>
					<p><strong>Staff Cell No :</strong> {{ $bookreturn->bookissue->staff->phone }}</p>
					<p><strong>Staff Email :</strong> {{ $bookreturn->bookissue->staff->email }}</p>
					<p><strong>Staff CNIC :</strong> {{ $bookreturn->bookissue->staff->cnic }}</p>
					<p><strong>Book Category :</strong> {{ $bookreturn->bookissue->book->category->c_name }}</p>
					<p><strong>Issue Date :</strong> {{ $bookreturn->bookissue->issue_date }}</p>
					<p><strong>Return Date :</strong> {{ $bookreturn->bookissue->return_date }}</p>
					<p><strong>Actual Return Date :</strong> {{ $bookreturn->return_date }}</p>
					<p><strong>Fine Status :</strong> {{ $bookreturn->status }}</p>
					<p><strong>Lose Fine :</strong> {{ $bookreturn->lose }}</p>
					<!-- @if(isset($bookreturn->fine->f_amount))
					<p><strong>Fine Amount:</strong> {{ $bookreturn->fine->f_amount }}</p>
					@endif -->
					<p><strong>Late Fine :</strong> {{ $bookreturn->fine }}</p>
					<p><strong>Total Copies :</strong> {{ $bookreturn->bookissue->book->total_copies }}</p>
					<p><strong>Available Copies :</strong> {{ $bookreturn->bookissue->book->avalible_copies  }}</p>
			</div>			
			</div>			
		</div>
	</div>
	@endif


</div>
@endsection
