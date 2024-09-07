@extends("admin.layouts.layout")
@section("title","Import Book")

@section("content")


<section class="content-header">
  <h1>
    Import Book
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('book.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Back</button>
</a>

<div class="row">
<div class="col-md-10 text-center" >
			@if(Session()->has('imp'))
			<br>
				<div class="alert alert-info" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('imp')}}
				</div>
			@endif
	<form method="POST" enctype="multipart/form-data" action="{{route('book.import')}}">
		  @csrf

		 <div class="row">
		  		<div class="card-header">
					<h4> Import </h4>
				</div>
		    <div class="col-25">
		      <label for="fname">Choose File</label>
		    </div>
		    <div class="col-75">
		      <input type="file" name="file">
		    </div>
		  </div>
		  <div class="row" style="padding-left: 50%">
		    <input type="submit" value="Submit">
		 </div>
	</form>
</div>
</div>

</div>


@endsection