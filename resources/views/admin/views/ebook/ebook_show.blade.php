@extends("admin.layouts.layout")
@section("title","View " . $ebook->title)

@section("content")
<?php 

// use DB;
use App\Models\Ebook;
?>

<section class="content-header">
	<h1>
		Details of {{ $ebook->title }}
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
			<br/>

				@foreach($ebook as $ebooks)
                       <?php

                           $bk = Ebook::where('id',$ebook->id)->first();
                           $authorbooks =array();
                           if(isset($bk->title))
                           {
		                       $authorbooks =DB::table('authorbooks')  
		                         ->join('authers','authorbooks.auther_id','=','authers.id')
		                         ->join('ebooks','authorbooks.ebook_id','=','ebooks.id')
		                         ->where('authorbooks.ebook_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($authorbooks);
                             }

                              $bookpublishers =array();
                           if(isset($bk->title))
                           {
		                       $bookpublishers =DB::table('bookpublishers')  
		                         ->join('publishers','bookpublishers.publisher_id','=','publishers.id')
		                         ->join('ebooks','bookpublishers.ebook_id','=','ebooks.id')
		                         ->where('bookpublishers.ebook_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($bookpublishers);
                             } 
   
				         ?>
				@endforeach

				
			<div class="table-responsive" style="padding: 5%;  border-radius: 10%; font-size: 17px; background: #4169e1; color: #fff">
					<p>Thank you for visiting this Page</p>
					<p ><strong>E-Book Title :</strong> {{ $ebook->title }}</p>
					<p><strong>E-Book Edition :</strong> {{ $ebook->edition }}</p>
					<p><strong>Book Auther :</strong>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}<br>
                            @endforeach
					</p>
					<p><strong>Book Publisher :</strong>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}}<br>
                            @endforeach
					</p>

					<p><strong>Book Category :</strong> {{ $ebook->category->c_name }}</p>
					<p><strong>Publisher Country :</strong> {{ $ebook->country->country }}</p>
					<p><strong>Publish Date :</strong> {{ $ebook->p_date }}</p>
					<p><strong>PDF Book :</strong> {{ $ebook->pdfbook }}</p>
					<p><strong>Audio Book :</strong> {{ $ebook->audiobook }}</p>
					<p><strong>Research Paper :</strong> {{ $ebook->papers }}</p>
					<p><strong>Magazine :</strong> {{ $ebook->magazine }}</p>
					<p><strong>Video Book :</strong> {{ $ebook->videobook }}</p>
			</div>
					
		</div>
	</div>

</div>
@endsection
