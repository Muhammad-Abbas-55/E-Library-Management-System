@extends("admin.layouts.layout")
@section("title","Category Wice Report")

@section("content")
<?php 

 // use DB;
use App\Models\Auther;
use App\Models\Book;
use App\Models\Authorbook;
?>

<section class="content-header">
	<h1>
		Category Wise Book Report
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>

<div style="padding: 30px;">

	<div class="row">
		<div class="col-md-12 text-center"> 
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
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Book Title</th>
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Category </th>
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
						<th style="background: green; color: #fff; font-size: 16px; text-align: center; padding: 12px">Serial No </th>
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
                            	{{$aubook->a_name}},<br>
                            @endforeach
						</td>					
						<td style="font-size: 16px; border: 1px solid green;">
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}},<br>
                            @endforeach
						</td>
						<td style="font-size: 16px; border: 1px solid green;">
							@foreach($shelfbooks as $shfbook)
                            	{{$shfbook->s_no}},<br>
                            @endforeach
						</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->p_date}}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->country->country}}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_edition }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->total_copies }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->avalible_copies }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_price }}</td>
						<td style="font-size: 16px; border: 1px solid green;"> {{ $book->b_isbn }}</td>
						<td style="font-size: 16px; border: 1px solid green;">
							@foreach($serialNo as $serial)
                               {{$serial->serial_no}},<br>
							@endforeach

						</td>
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
