@extends("admin.layouts.layout")
@section("title","Detals for " . $publisher->p_name)

@section("content")


<section class="content-header">
	<h1>
		Detals for {{ $publisher->p_name }}
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
			<a href="{{ route('publisher.index') }}">
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
					<p>Thank you for visiting {{ $publisher->p_name }} Detail Page</p>
					<p><strong>Publisher Name :</strong> {{ $publisher->p_name }}</p>
			</div>			
		</div>
	</div>


	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}
			<br/>
			<div class="table-responsive">
				<h2>{{ $publisher->p_name }} Books Detail </h2>
				<div class="table-responsive">
				<table class="table" id="" border="1px">
					<tr>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publisher Name</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Book Title</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publish Country</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publisher Date</th>
					</tr>

					@foreach ($publisher->books as $book)
					<tr>
						<td style="font-size: 16px; border: 1px solid green;">{{ $publisher->p_name }}</td>
						<td style="font-size: 16px; border: 1px solid green;">{{ $book->b_title }}</td>
						<td style="font-size: 16px; border: 1px solid green;">{{ $book->country->country }}</td>
						<td style="font-size: 16px; border: 1px solid green;">{{ $book->p_date }}</td>
					</tr>
					@endforeach
				</table>
				</div>				
			</div>
		</div>
	</div>
</div>

@endsection
