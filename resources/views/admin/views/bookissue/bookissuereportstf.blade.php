@extends("admin.layouts.layout")
@section("title","Book Issued Report")

@section("content")

<section class="content-header">
	<h1>
		Book Issued Report
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>



<form class="example" action="{{ route('bookissue.searchstf') }}" style="margin:auto;max-width:700px;margin-top: 230px;">
  <input type="text" placeholder="Search Staff..." name="query">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>


<div style="padding: 30px;">


</div>
@endsection
