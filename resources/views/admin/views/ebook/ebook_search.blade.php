@extends("admin.layouts.layout")
@section("title","E-Books List")


@section("content")
<?php 

// use DB;
use App\Models\Ebook;
?>

<section class="content-header">
	<h1>
		E-Books List
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 30px;">

	<div class="row">
		<div class="col-md-2">
			<a href="{{ route('ebook.create') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Add New E-Book
				</button>
			</a>
		</div>
		
		<div class="col-md-9">		
			<form class="example" action="{{ route('ebook.search') }}" style="margin:auto;max-width:700px;margin-top: 10px;">
				<label class="sr-only" for="query">Search by Book Title</label>
		 		 <select name="query" id="query" style="width: 80%%;">
                        <option></option>
                            @foreach($ebook as $bkss)
                        	     <option value="{{ $bkss->title }}">{{ $bkss->title }}</option>
                            @endforeach
                </select>
		 		 <button style="height:27px; padding: 5px; float: right;" type="submit">Search</button>
			</form>
		</div>
		<div class="col-md-1">
			<a href="{{ route('ebook.index') }}">
				<button class="button button2" type="submit" style="font-size: 16px; float: left; margin-top: 3.5px; width: 70px; padding: -5px -9px; border-radius: 60%">ALL</button>
			</a>
		</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#query").select2({
            placeholder: "Search E-Books by Title...",
            allowClear: true
        });
</script>
	</div>


	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}
			<br/>
				<h2>PDF Books</h2>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>E-Book Title</th>
						<th>Edition</th>
						<th>Category</th>
						<th>Author Name</th>
						<th>Publisher Name</th>
						<th>Publish Country</th>
						<th>Publish Date</th>
						<th>PDF Book</th>
						<th>View / Download</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>

					@foreach($ebooks as $ebook)
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
					

					@if(isset($ebook->pdfbook))
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$ebook->title}}</td>
						<td>{{$ebook->edition}}</td>
						<td>{{$ebook->category->c_name}}</td>
						<td>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}<br>
                            @endforeach
						</td>

						<td>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}}<br>
                            @endforeach
						</td>
						<td>{{$ebook->country->country}}</td>
						<td>{{$ebook->p_date}}</td>
						<td>{{$ebook->pdfbook}}</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_read/{{ $ebook->id }}">
							<button class="button button2" style="background: skyblue"><i class="fa fa-play" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_file/download/{{ $ebook->pdfbook }}">
							<button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_show/{{ $ebook->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_edit/{{ $ebook->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_delete/{{ $ebook->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>

					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>




	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
				<h2>Audio Books</h2>

			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>E-Book Title</th>
						<th>Instructure</th>
						<th>Edition</th>
						<th>Category</th>
						<th>Author Name</th>
						<th>Publisher Name</th>
						<th>Publish Country</th>
						<th>Publish Date</th>
						<th>Audio Book</th>
						<th>View / Download</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>


					@foreach($ebooks as $ebook)
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
					

					@if(isset($ebook->audiobook))
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$ebook->title}}</td>
						<td>{{$ebook->inst}}</td>
						<td>{{$ebook->edition}}</td>
						<td>{{$ebook->category->c_name}}</td>
						<td>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}<br>
                            @endforeach
						</td>
						<td>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}}<br>
                            @endforeach
						</td>
						<td>{{$ebook->country->country}}</td>
						<td>{{$ebook->p_date}}</td>
						<td>{{$ebook->audiobook}}</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_read/{{ $ebook->id }}">
							<button class="button button2" style="background: skyblue"><i class="fa fa-play" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_file/download/{{ $ebook->audiobook }}">
							<button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_show/{{ $ebook->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_edit/{{ $ebook->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_delete/{{ $ebook->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>





	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
				<h2>Magazines</h2>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>E-Book Title</th>
						<th>Edition</th>
						<th>Category</th>
						<th>Author Name</th>
						<th>Publisher Name</th>
						<th>Publish Country</th>
						<th>Publish Date</th>
						<th>Magazine</th>
						<th>View / Download</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>



					@foreach($ebooks as $ebook)
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
					

					@if(isset($ebook->magazine))
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$ebook->title}}</td>
						<td>{{$ebook->edition}}</td>
						<td>{{$ebook->category->c_name}}</td>
						<td>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}<br>
                            @endforeach
						</td>
						<td>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}}<br>
                            @endforeach
						</td>
						<td>{{$ebook->country->country}}</td>
						<td>{{$ebook->p_date}}</td>
						<td>{{$ebook->magazine}}</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_read/{{ $ebook->id }}">
							<button class="button button2" style="background: skyblue"><i class="fa fa-play" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_file/download/{{ $ebook->magazine }}">
							<button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_show/{{ $ebook->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_edit/{{ $ebook->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_delete/{{ $ebook->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>








	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
				<h2>Research Papers</h2>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Research Paper</th>
						<th>Edition</th>
						<th>Category</th>
						<th>Author Name</th>
						<th>Publisher Name</th>
						<th>Publish Country</th>
						<th>Publish Date</th>
						<th>Magazine</th>
						<th>View / Download</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>



					@foreach($ebooks as $ebook)
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
					

					@if(isset($ebook->papers))
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$ebook->title}}</td>
						<td>{{$ebook->edition}}</td>
						<td>{{$ebook->category->c_name}}</td>
						<td>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}<br>
                            @endforeach
						</td>
						<td>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}}<br>
                            @endforeach
						</td>
						<td>{{$ebook->country->country}}</td>
						<td>{{$ebook->p_date}}</td>
						<td>{{$ebook->papers}}</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_read/{{ $ebook->id }}">
							<button class="button button2" style="background: skyblue"><i class="fa fa-play" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_file/download/{{ $ebook->papers }}">
							<button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_show/{{ $ebook->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_edit/{{ $ebook->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_delete/{{ $ebook->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>






	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
				<h2>Video Books</h2>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>E-Book Title</th>
						<th>Instructure</th>
						<th>Edition</th>
						<th>Category</th>
						<th>Author Name</th>
						<th>Publisher Name</th>
						<th>Publish Country</th>
						<th>Publish Date</th>
						<th>Video Book</th>
						<th>View / Download</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>


					@foreach($ebooks as $ebook)
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
					

					@if(isset($ebook->videobook))
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$ebook->title}}</td>
						<td>{{$ebook->instructure}}</td>
						<td>{{$ebook->edition}}</td>
						<td>{{$ebook->category->c_name}}</td>
						<td>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}<br>
                            @endforeach
						</td>
						<td>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}}<br>
                            @endforeach
						</td>
						<td>{{$ebook->country->country}}</td>
						<td>{{$ebook->p_date}}</td>
						<td>{{$ebook->videobook}}</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_read/{{ $ebook->id }}">
							<button class="button button2" style="background: skyblue"><i class="fa fa-play" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_file/download/{{ $ebook->videobook }}">
							<button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						</td>
						<td style="padding: 0%; width: 17%;">
						<a href="ebook_show/{{ $ebook->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_edit/{{ $ebook->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="ebook_delete/{{ $ebook->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endif
					@endforeach
				</table>
			</div>			
		</div>
	</div>









	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}
			<br/>
			<div class="table-responsive">
				<h2>Category Wise Book Listing</h2>
				@foreach ($category as $cat)
				<div class="table-responsive">
				<table class="table" id="" border="1px">
					 <p style="background: #4169e1;  margin-bottom: -5px; color: #fff; font-size: 18px; text-align: center; padding: 12px">{{ $cat->c_name }} Books </p>
					
					<tr>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Category </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Book Title</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Edition </th>
						<!-- <th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Auther </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publisher </th> -->
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publish Country </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">PDF Book </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Audio Book </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Magazin Book </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Video Book </th>
					</tr>
					@foreach ($cat->ebooks as $book)
					<tr>
						<td style="font-size: 16px; border: 1px solid green;">  {{ $cat->c_name }}</td>
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->title }}</td>
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->edition }}</td><!-- 
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->auther }}</td> -->
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->country->country}}</td>
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->pdfbook }}</td>
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->audiobook }}</td>
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->magazine }}</td>
						<td style="font-size: 16px; border: 1px solid green;">  {{ $book->videobook }}</td>
					</tr>
					@endforeach
				</table>
				</div>
				@endforeach
			</div>
		</div>
	</div>

</div>
@endsection
