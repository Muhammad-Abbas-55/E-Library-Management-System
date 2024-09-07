@extends("admin.layouts.layout")
@section("title","Detals for " . $student->name)

@section("content")


<section class="content-header">
	<h1>
		Details for <strong> {{ $student->name }} </strong>
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
			<a href="{{ route('student.index') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Back
				</button>
			</a>
		</div>
	</div>		


	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
			<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting <strong> {{ $student->name }} </strong> Detail Page</p>
					<p><strong>Student Name :</strong> {{ $student->name }}</p>
					<p><strong>Father Name :</strong> {{ $student->fname }}</p>
					<p><strong>Email :</strong> {{ $student->email }}</p>
					<p><strong>Cell No :</strong> {{ $student->cell_no }}</p>
					<p><strong>Gender :</strong> {{ $student->gender ? 'Male' : 'Female' }}</p>
					<p><strong>Registration No :</strong> {{ $student->reg_no }}</p>
					<p><strong>CNIC No :</strong> {{ $student->cnic }}</p>
					<p><strong>Batch :</strong> {{ $student->batch }}</p>
					<p><strong>Department :</strong> {{ $student->department }}</p>
			</div>			
		</div>
	</div>


</div>
@endsection
