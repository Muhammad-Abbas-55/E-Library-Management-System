@extends("admin.layouts.layout")
@section("title","Detals for AboutUs")

@section("content")


<section class="content-header">
	<h1>
		About Us Detail
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
			<a href="{{ route('about.index') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">View About Us
				</button>
			</a>
		</div>
	</div>		


	<div class="row">
		<div class="col-md-12 text-center">
			{{session('msg')}}  
			<br/>
			<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting About Us Detail Page</p>
					<p><strong>Introduction :</strong> {{ $about->intro }}</p>
					<p><strong>Description :</strong> {{ $about->description }}
					</p><p><strong></strong> <img src="{{asset($about->a_image)}}" width="400px" height="500px"></p>
			</div>			
		</div>
	</div>

</div>
@endsection
