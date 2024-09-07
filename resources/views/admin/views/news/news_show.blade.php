@extends("admin.layouts.layout")
@section("title","View News & Events")

@section("content")
<?php 

use App\Models\News;
?>


<section class="content-header">
	<h1>
		View News & Events
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
			<a href="{{ route('news.index') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">View News & Events
				</button>
			</a>
		</div>
	</div>		

	<div class="row">
		<div class="col-md-12 text-center">


<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 90%; margin-left: 5%">
  <!-- Indicators -->
<!--   <ol class="carousel-indicators" >
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol> --><br>
    <h1 style="text-align: center; background-color: gray; color: white">NEWS & EVENTS</h1><br>
    <h3><marquee behavior="scroll" direction="left">Welcome to library News and Events.</marquee></h3><br>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img style="height: 370px; width: 100%" src="{{asset($news->slider1_image)}}" alt="Los Angeles">
    </div>
    <div class="item">
      <img style="height: 370px; width: 100%" src="{{asset($news->slider2_image)}}" alt="Chicago">
    </div>

    <div class="item">
      <img  style="height: 370px; width: 100%" src="{{asset($news->slider3_image)}}" alt="New York">
    </div>
    <div><br>
      <h3 style="text-align: center;" >{{ $news->e_title }}</h3><br>

                        <ul class="news-event-info" style="text-align: center;" >
                            <li>
                                <!-- <a href="#" target="_blank"> -->
                                    <i class="fa fa-calendar"></i>
                                    {{$news->e_date}}
                                <!-- </a> -->
                            </li>
                            <li>
                                <!-- <a href="#" target="_blank"> -->
                                    <i class="fa fa-clock-o"></i>
                                    {{$news->e_stime}} - {{$news->e_stime}} 
                                <!-- </a> -->
                            </li>
                            <li>
                                <!-- <a href="#" target="_blank"> -->
                                    <i class="fa fa-map-marker"></i>
                                    {{$news->e_location}}
                                <!-- </a> -->
                            </li>
                        </ul>
      <p style="text-align: center;" >{{ $news->e_description }}</p><br>
      </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>		
		</div>
	</div>
</div>
@endsection
