@extends("admin.layouts.layout")
@section("title","Detals for " . $category->c_name)

@section("content")


<section class="content-header">
	<h1>
		Detals for {{ $category->c_name }}
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
			<a href="{{ route('category.index') }}">
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
					<p>Thank you for visiting {{ $category->c_name }} Detail Page</p>
					<p><strong>Book Category :</strong> {{ $category->c_name }}</p>
			</div>			
		</div>
	</div>


<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}
			<br/>
			<div class="table-responsive">
				<h2>{{ $category->c_name }} Books List </h2>
				<div class="table-responsive">
				<table class="table" id="" border="1px">
					
					<tr>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Sr.no</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Category</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Book Title</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Edition </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Total Copies </th>
					</tr>
			<?php		$no=1; ?>
						@foreach ($category->books as $book)
					<tr>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $no++ }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $category->c_name }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_title }}</td>
						
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_edition }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->total_copies }}</td>
					</tr>
					@endforeach
					
				</table>
				</div>
				
			</div>
		</div>
	</div>

</div>
@endsection
