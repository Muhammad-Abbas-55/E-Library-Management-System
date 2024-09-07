@extends("admin.layouts.layout")
@section("title","Book Issued Report ")

@section("content")
<?php 

use App\Models\Student;
?>

<section class="content-header">
	<h1>
		Book Issued Report 
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol></br>
		<a target="_blank" onclick="window.print()" style="float: right" class="btn btn-default"><i class="fa fa-print">Print</i> Preview</a>
</section>


<div style="padding: 30px;">
	
<!-- 	<div class="row">


		<div class="col-md-5">
			<form type="get" action="{{ route('bookissue.searchstd') }}">	
				<input class="form-control" type="search" name="query" style="; width: 370px; height: 39px;" placeholder="Search Student...">
				<button class="button button" type="submit" style="font-size: 16px; margin-right: 13%; float: right; padding: -5px -9px; ">Search</button>
			</form>
		</div>
	</div> -->


	<div class="row">
		<div class="col-md-12 text-center"> 
			<br/>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Book title</th>
						<th>Book Accession</th>
						<th>Issue Date</th>
						<th>Return Date</th>
						<th>Actual Return Date</th>
						<th>Late Fine</th>
						<th>Lose Fine</th>
						<th>Status</th>
					</tr>
					<?php $no=1; ?>

			@foreach($student as $bookiss)
				<h3>Book Issued to {{$bookiss->name}}</h3>
				<h3>Registration No: {{$bookiss->reg_no}}</h3>

				@foreach($bookiss->bookissues as $issue)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$issue->book->b_title}}</td>
						<td>{{$issue->serials->serial_no}}</td>
						<td>{{$issue->issue_date}}</td>
						<td>{{$issue->return_date}}</td>
						<td>
						@foreach($issue->bookreturn as $return)
							@if(@isset($return->return_date))
							{{$return->return_date}}
							@else
								Not Return
							@endif
						</td>
						<td>
							@if($return->fine == 0)
							None
								@else
								{{$return->fine}}
									
							@endif
						</td>
						<td>
							@if(@isset($return->lose))
								{{$return->lose}}
								@else

								None
							@endif
						</td>
						<td>
							@if(@isset($return->lose))
								{{$return->status}}
								@else
									@if(@isset($return->fine))
										{{$return->status}}
							@endif
							@endif
						</td>
						@endforeach
					</tr>
				@endforeach
			@endforeach



				</table>
			</div>			
		</div>
	</div>
</div>
@endsection
