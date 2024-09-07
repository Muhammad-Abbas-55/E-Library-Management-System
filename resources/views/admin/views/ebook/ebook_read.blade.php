@extends("admin.layouts.layout")
@section("title","View " . $ebook->title)

@section("content")


<section class="content-header">
	<h1>
		View {{ $ebook->title }}
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
			<a href="{{ route('ebook.index') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Back
				</button>
			</a>
		</div>
	</div>	



	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}
			<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting this Page</p>		 
			</div>
			
	@if(isset($ebook->pdfbook))
	<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
	<h2><strong>E-Book Title :</strong> {{ $ebook->title }}</h2>
	</div>
		<iframe src="{{url('media/ebook/'.$ebook->pdfbook)}}" style="width: 100%; height: 900px; float: center; "></iframe>
		<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
					<h2><strong>More Details About :</strong> {{ $ebook->title }}</h2> 
		</div>
	@endif
    @if(isset($ebook->audiobook))
    <div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
    	<h2><strong>Audio-Book Title :</strong> {{ $ebook->title }}</h2>
	</div>
        <audio controls autoplay src="{{url('media/ebook/'.$ebook->audiobook)}}" style="width: 100%; float: center; ">
        </audio>
        <div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
                    <h2><strong>More Details About :</strong> {{ $ebook->title }}</h2>
                    <p><strong>Instructure Name :</strong> {{ $ebook->inst }}</p>        
        </div>
    @endif
	@if(isset($ebook->magazine))
	<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
	<h2><strong>Magazine Title :</strong> {{ $ebook->title }}</h2>
	</div>
		<iframe src="{{url('media/ebook/'.$ebook->magazine)}}" style="width: 100%; height: 900px; float: center; "></iframe>
		<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
					<h2><strong>More Details About :</strong> {{ $ebook->title }}</h2> 
		</div>

	@endif	
    @if(isset($ebook->videobook))
    <div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
    <h2><strong>Video Title :</strong> {{ $ebook->title }}</h2>
    </div>    
        <video controls autoplay width="100%" loop>
            <source src="{{url('media/ebook/'.$ebook->videobook)}}">
        </video>
        <div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
            
                    <h2><strong>More Details About :</strong> {{ $ebook->title }}</h2>
                    <p><strong>Instructure Name :</strong> {{ $ebook->instructure }}</p>         
        </div>
    @endif

    @if(isset($ebook->papers))
	<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
	<h2><strong>Magazine Title :</strong> {{ $ebook->title }}</h2>
	</div>
		<iframe src="{{url('media/ebook/'.$ebook->papers)}}" style="width: 100%; height: 900px; float: center; "></iframe>
		<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
					<h2><strong>More Details About :</strong> {{ $ebook->title }}</h2> 
		</div>

	@endif
			<!-- <iframe src="{{ asset('storage/'.$ebook->pdfbook) }}" frameborder="0"></iframe> -->
			
			<div class="table-responsive" style="padding: 1%;  border-radius: 0%; font-size: 17px; background: #4169e1; color: #fff">
					<p><strong>E-Book Edition :</strong> {{ $ebook->edition }}</p>
					<p><strong>Book Category :</strong> {{ $ebook->category->c_name }}</p>
					<p><strong>Publisher Country :</strong> {{ $ebook->country->country }}</p>
					<p><strong>Publish Date :</strong> {{ $ebook->p_date }}</p>		 
			</div>
		</div>
	</div>
</div>
@endsection
