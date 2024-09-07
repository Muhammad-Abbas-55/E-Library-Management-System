@extends("admin.layouts.layout")
@section("title","Detals of " . $book->b_title)

@section("content")
<?php 

// use DB;
use App\Models\Auther;
use App\Models\Book;
use App\Models\Authorbook;
?>
<?php
use Illuminate\Foundation\Auth\User;
 ?>
 {{$role = Auth::User()->role }} 
 @if( $role != '')

<section class="content-header">
	<h1>
		Book Details of {{ $book->b_title }}
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section></br>


<div class="container p-4">
	
	<div class="row">
		@if( $role == "Super Admin")
		<div class="col-md-8"> 
			<a href="{{ route('book.index') }}">
				<button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">Back
				</button>
			</a>
		</div>
		@endif
	</div>		

	<div class="row">
		<div class="col-md-5 text-center">
			<div class="table-responsive" style="  padding: 5%; margin-top: 6%;">
				<img src="{{asset($book->b_image)}}" width="350px">
			</div>	
		</div>

		<div class="col-md-7 text-center">
			<div class="table-responsive" style="padding: 5%;  border-radius: 10%; font-size: 17px; background: #4169e1; color: #fff">

					<p><strong> Thank you for visiting this Page </strong></p>
					<p ><strong>Book Title :</strong> {{ $book->b_title }} </p>
					<p><strong>Book Category :</strong> {{ $book->category->c_name }} </p>
					<p><strong>Book Edition :</strong> {{ $book->b_edition }} </p>
					<p><strong>Book ISBN No :</strong> {{ $book->b_isbn }} </p>
					<p><strong>Book Length :</strong> {{ $book->length }} </p>
					
					@foreach($book as $books)
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
		                         ->get();                             } 
				         ?>
				@endforeach

					<p><strong>Book Serial No :</strong>
							@foreach($serialNo as $serial)
                               {{$serial->serial_no}},
							@endforeach
					</p>
					<p><strong>Book Author :</strong>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}},
                            @endforeach
                    </p>
					<p><strong>Book Publisher :</strong>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}},
                            @endforeach
                    </p>
                    <p><strong>Shelf No :</strong>
							@foreach($shelfbooks as $shfbook)
                            	{{$shfbook->s_no}},
                            @endforeach
                    </p>

					<p><strong>Publish Date :</strong> {{ $book->p_date }}</p>
					<p><strong>Publisher Country :</strong> {{ $book->country->country }}</p>					
					<p><strong>Total Copies :</strong> {{ $book->total_copies }}</p>
					<p><strong>Available Copies :</strong> {{ $book->avalible_copies }}</p>
					<p><strong>Book Price :</strong> {{ $book->b_price }}</p>
					<p><strong>Book Description :<br></strong> {{ $book->description }}</p>
			</div>			
		</div>
	</div>
</div>
</div>
@endif
@endsection
