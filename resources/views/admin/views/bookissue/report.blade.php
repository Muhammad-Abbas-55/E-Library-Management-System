@extends("admin.layouts.layout")
@section("title","Report")

@section("content")


<section class="content-header">
	<h1>
		Report
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 30px;">
	
	<div class="row">
		<div class="col-md-12"> 

		</div>
	</div>		


	<div class="row">
		<div class="col-md-12 text-center"> 
				<h2>View Reports</h2>
			<div class="table-responsive" style="overflow-x:auto;">
				<div class="col-md-6 text-center" style="text-align: right;">
					<a href="{{ route('daily.report') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Book Issued Daily Report
						</button>
					</a>
				</div>
				<div class="col-md-6 text-center" style="text-align: left">
					<a href="{{ route('issue.report') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Generate Book Issue Report
						</button>
					</a>
				</div>
			</div>			
		</div>


		<div class="col-md-12 text-center">
			<div class="table-responsive" style="overflow-x:auto;">
				<div class="col-md-6 text-center" style="text-align: right;">
					<a href="{{ route('daily.reportt') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Book Returned Daily Report
						</button>
					</a>
				</div>
				<div class="col-md-6 text-center" style="text-align: left">
					<a href="{{ route('return.report') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Generate Book Returned Report
						</button>
					</a>
				</div>
			</div>			
		</div>


		<div class="col-md-12 text-center">
			<div class="table-responsive" style="overflow-x:auto;">
				<div class="col-md-6 text-center" style="text-align: right;">
					<a href="{{ route('bookissue.reportstd') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Specific Student Book Issued Report
						</button>
					</a>
				</div>
				<div class="col-md-6 text-center" style="text-align: left">
					<a href="{{ route('bookissue.reportstf') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Specific Staff Book Issued Report
						</button>
					</a>
				</div>
			</div>			
		</div>


		<div class="col-md-12 text-center">
			<div class="table-responsive" style="overflow-x:auto;">
				<div class="col-md-6 text-center" style="text-align: right;">
					<a href="{{ route('bweekly.report') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Books Weekly Report
						</button>
					</a>
				</div>
				<div class="col-md-6 text-center" style="text-align: left">
					<a href="{{ route('b.report') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8%; color: white; border-radius: 1%;">Generate Books Report
						</button>
					</a>
				</div>
			</div>			
		</div>



		<div class="col-md-12 text-center">
			<div class="table-responsive" style="overflow-x:auto;">
				<div class="col-md-12 text-center" style="text-align: right;">
					<a href="{{ route('cat.report') }}">
						<button class="button button2" style="width: 200px; height: 190px; background-color: #008CBA; margin-right: 42%; text-decoration: none; font-size: 15px; margin-left:  padding: 2%; color: white; border-radius: 100%; ">Category Wice Book Lising
						</button>
					</a>
				</div>
			</div>			
		</div>
	</div>





</div>
@endsection
