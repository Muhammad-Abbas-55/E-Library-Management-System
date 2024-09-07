@extends("admin.layouts.layout")
@section("title","List Country")

@section("content")


<section class="content-header">
	<h1>
		Add Country
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div class="container p-4">

		<a href="{{ route('publisher.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
 	 Back</button>
	</a>


<div class="row">
  <div class="col-md-10 text-center" >

  			@if(Session()->has('insert'))
			<br>
				<div class="alert alert-success" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('insert')}}
				</div>
			@endif

			@if(Session()->has('update'))
			<br>
				<div class="alert alert-info" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('update')}}
				</div>
			@endif

			@if(Session()->has('delete'))
			<br>
				<div class="alert alert-danger" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
					{{Session::get('delete')}}
				</div>
			@endif
	</br>		    
    <form method="post" action="country_store">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="fname">Country Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="country" placeholder="Enter Book Country Here..">
        </div>
        	<div style="color: red">{{ $errors->first('country') }}</div>
       	  <div class="row" style="padding-top: 60px">
       		<input type="submit" value="Submit">
    	  </div>
    	</div>
    </form>
  </div>
 </div>


	<div class="row">
		<div class="col-md-12 text-center">
			{{session('msg')}}  
			<br/>
			<div class="table-responsive">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Country Name</th>
						<th>Action</th>
					</tr>
					@foreach($country as $con)
					<tr>
						<td>{{$con->id}}</td>
						<td>{{$con->country}}</td>
						<td style="padding: 0%;">
							<a href="country_show/{{ $con->id }}">
								<button class="button button2"><i class="fa fa-eye" style="font-size: 19px"></i></button>
							</a>
							<a href="country_edit/{{ $con->id }}/edit">
								<button class="button button"><i class="fa fa-edit" style="font-size: 19px"></i></button>
							</a>
							<a href="country_delete/{{ $con->id }}">
								<button class="button button3"><i class="fa fa-trash" style="font-size: 19px"></i></button>
							</a>       
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>



@endsection