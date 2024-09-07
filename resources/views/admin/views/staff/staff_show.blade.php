@extends("admin.layouts.layout")
@section("title","Detals for " . $staff->name)

@section("content")


<section class="content-header">
	<h1>
		Details for <strong> {{ $staff->name }} </strong>
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
			<a href="{{ route('staff.index') }}">
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
					<p>Thank you for visiting <strong> {{ $staff->name }} </strong> Detail Page</p>
					<p><strong>Staff Name :</strong> {{ $staff->phone }}</p>
					<p><strong>Phone :</strong> {{ $staff->cnic }}</p>
					<p><strong>Email :</strong> {{ $staff->email }}</p>
					<p><strong>Gender :</strong> {{ $staff->gender ? 'Male' : 'Female' }}</p>
					<p><strong>Staff Type :</strong> {{ $staff->type }}</p>
			</div>			
		</div>
	</div>


</div>
@endsection
