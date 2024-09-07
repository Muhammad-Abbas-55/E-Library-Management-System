@extends("admin.layouts.layout")
@section("title","Books")


@section("content")
<?php 

// use DB;
use App\Models\Auther;
use App\Models\Book;
use App\Models\Authorbook;
?>

<section class="content-header">
	<h1>
		Books List
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 30px;">
	
	<div class="row">
		<div class="col-md-6"> 
			<a href="{{ route('book.create') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Add New Book
				</button>
			</a>
			<a href="{{ route('book.exportexcel') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Export via Excel
				</button>
			</a>
			<a href="{{ route('book.exportcsv') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Export via CSV
				</button>
			</a>
			<a href="{{ route('book.imp') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Import Books
				</button>
			</a>
		</div>

		<div class="col-md-1">
			<a href="{{ route('book.index') }}">
				<button class="button button2" type="submit" style="font-size: 16px; float: left; margin-top: 3.5px; width: 70px; padding: -5px -9px; border-radius: 60%">ALL</button>
			</a>
		</div>

		<div class="col-md-12">		
			<form class="example" action="{{ route('book.search') }}" style="margin:auto;max-width:700px;margin-top: 10px;">
				<label class="sr-only" for="query">Search by Book Title</label>
		 		 <select name="query" id="query" style="width: 80%%;">
                        <option></option>
                            @foreach($book as $bkss)
                        	     <option value="{{ $bkss->b_title }}">{{ $bkss->b_title }}</option>
                            @endforeach
                </select>
		 		 <button style="height:27px; padding: 5px; float: right;" type="submit">Search</button>
			</form>
		</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#query").select2({
            placeholder: "Search Book...",
            allowClear: true
        });
</script>

	</div>


	<div class="row">
		<div class="col-md-12 text-center"> 
			{{session('msg')}}  
			<br/>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Book Title</th>
						<th>Edition</th>
						<th>Price</th>
						<th>ISBN No</th>
						<th>Serial No</th>
						<!-- <th>Description</th> -->
						<th>Book Length</th>
						<th>Author Name</th>
						<th>Book Category</th>
						<th>Shelf No</th>
						<th>Total Copies</th>
						<th>Available Copies</th>
						<th>Publisher Name</th>
						<th>Publish Date</th>
						<th>Publish Country</th>
						<th>Action</th>
					</tr>
					<?php $no=1; ?>
					
					@foreach($books as $book)
                       <?php

                           $bk = Book::where('id',$book->id)->first();
                           $authorbooks =array();
                           if(isset($bk->b_title))
                           {
		                       $authorbooks =DB::table('authorbooks')  
		                         ->join('authers','authorbooks.auther_id','=','authers.id')
		                         ->join('books','authorbooks.book_id','=','books.id')
		                         ->where('authorbooks.book_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($authorbooks);
                             }

                           $shelfbooks =array();
                           if(isset($bk->b_title))
                           {
		                       $shelfbooks =DB::table('shelfbooks')  
		                         ->join('shelves','shelfbooks.shelf_id','=','shelves.id')
		                         ->join('books','shelfbooks.book_id','=','books.id')
		                         ->where('shelfbooks.book_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($shelfbooks);
                             }

                            $serialNo =array();
                           if(isset($bk->b_title))
                           {
		                       $serialNo =DB::table('book_serials')
		                         ->join('books','book_serials.book_id','=','books.id')
		                         ->where('book_serials.book_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($shelfbooks);
                            } 

                           $bookpublishers =array();
                           if(isset($bk->b_title))
                           {
		                       $bookpublishers =DB::table('bookpublishers')  
		                         ->join('publishers','bookpublishers.publisher_id','=','publishers.id')
		                         ->join('books','bookpublishers.book_id','=','books.id')
		                         ->where('bookpublishers.book_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($bookpublishers);
                             } 
				         ?>

					<tr>
						<td>{{ $no++ }}</td>
						<td><img src="{{asset($book->b_image)}}" width="80px" height="80px"></td>
						<td>{{$book->b_title}}</td>
						<td>{{$book->b_edition}}</td>
						<td>{{$book->b_price}}</td>
						<td>{{$book->b_isbn}}</td>
						<td>
							@foreach($serialNo as $serial)
                               {{$serial->serial_no}},<br>
							@endforeach
						</td>
						<!-- <td><textarea>{{$book->description}}</textarea></td> -->
						<td>{{$book->length}}</td>

						<td>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}, <br>
                            @endforeach
						</td>
					
						<td>{{$book->category->c_name}}</td>
						<td>
							@foreach($shelfbooks as $shfbook)
                            	{{$shfbook->s_no}},<br>
                            @endforeach
						</td>
						<td>{{$book->total_copies}}</td>
						<td>{{$book->avalible_copies}}</td>
						<td>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}},<br>
                            @endforeach
						</td>
						<td>{{$book->p_date}}</td>
						<td>{{$book->country->country}}</td>
						<td style="padding: 0%; width: 17%;">
						<a href="book_show/{{ $book->id }}">
							<button class="button button2"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="book_edit/{{ $book->id }}/edit">
							<button class="button button"><i class="fa fa-edit" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>
						<a href="book_delete/{{ $book->id }}">
							<button class="button button3"><i class="fa fa-trash" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
						</a>       
						</td>
					</tr>
					@endforeach
				</table>
			</div>			
		</div>
	</div>


<!-- 	<div class="row">
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
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Sr No </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Image </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Category </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Book Title</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Length</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Auther Name </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publisher Name </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Shelf No </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publish Date </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Publish Country </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Edition </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Total Copies </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Available Copies</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Price </th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">ISBN No </th>
					</tr>
					<?php $no=1; ?>


					@foreach ($cat->books as $book)
					   <?php

                           $bk = Book::where('id',$book->id)->first();
                           $authorbooks =array();
                           if(isset($bk->b_title))
                           {
		                       $authorbooks =DB::table('authorbooks')  
		                         ->join('authers','authorbooks.auther_id','=','authers.id')
		                         ->join('books','authorbooks.book_id','=','books.id')
		                         ->where('authorbooks.book_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($authorbooks);
                             }

                           $shelfbooks =array();
                           if(isset($bk->b_title))
                           {
		                       $shelfbooks =DB::table('shelfbooks')  
		                         ->join('shelves','shelfbooks.shelf_id','=','shelves.id')
		                         ->join('books','shelfbooks.book_id','=','books.id')
		                         ->where('shelfbooks.book_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($shelfbooks);
                             }

                           $bookpublishers =array();
                           if(isset($bk->b_title))
                           {
		                       $bookpublishers =DB::table('bookpublishers')  
		                         ->join('publishers','bookpublishers.publisher_id','=','publishers.id')
		                         ->join('books','bookpublishers.book_id','=','books.id')
		                         ->where('bookpublishers.book_id',$bk->id)
		                         ->select('*')
		                         ->get();
		                         // dd($bookpublishers);
                             } 
				         ?>

					<tr>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $no++ }}</td>
						<td style="font-size: 16px; border: 1px solid green;">
							<img src="{{asset($book->b_image)}}" width="80px" height="80px">
						</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_title }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $cat->c_name }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->length }}</td>
						<td style="font-size: 16px; border: 1px solid green;">
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}}<br>
                            @endforeach
						</td>					
						<td style="font-size: 16px; border: 1px solid green;">
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}}<br>
                            @endforeach
						</td>
						<td style="font-size: 16px; border: 1px solid green;">
							@foreach($shelfbooks as $shfbook)
                            	{{$shfbook->s_no}}<br>
                            @endforeach
						</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->p_date}}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->country->country}}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_edition }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->total_copies }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->avalible_copies }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_price }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_isbn }}</td>
					</tr>
					@endforeach
				</table>
				</div>
				@endforeach
			</div>
		</div>
	</div>

 -->
</div>
@endsection
