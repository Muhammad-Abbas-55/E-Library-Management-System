@extends("admin.layouts.layout")
@section("title","Monthely Report")

@section("content")
<?php 

 // use DB;
use App\Models\Auther;
use App\Models\Book;
use App\Models\Authorbook;
?>

<section class="content-header">
	<h1>
		Generate Books Report
		<small>Page</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
	<a target="_blank" onclick="window.print()" style="float: right" class="btn btn-default"><i class="fa fa-print">Print</i> Preview</a>

	
<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="{{ route('b.reportt') }}">
      @csrf
      
        <div class="col-md-5">
          <label for="fname">Start Date</label>
          <input type="date" name="fromDate" id="fname" value="{{ old('fromDate')}}">
        </div>

      
        <div class="col-md-5">
          <label for="fname">End Date</label>
          <input type="date" name="toDate" id="fname" value="{{ old('toDate')}}">
      	</div>

      	<div class="col-md-2">
      	<button type="submit">Search</button>
      	</div>


    </form>
  </div>    
</div>
</section></br>


<div style="padding: 30px;">

	<div class="row">
		<div class="col-md-12 text-center"> 
			 
			<br/>
			<div class="table-responsive" style="overflow-x:auto;">
				<table class="table" id="customers">
					<tr>
						<th>ID</th>
						<!-- <th>Image</th> -->
						<th>Book Title</th>
						<th>Edition</th>
						<!-- <th>Price</th> -->
						<th>ISBN No</th>
						<th>Accession No</th>
						<!-- <th>Description</th> -->
						<!-- <th>Book Length</th> -->
						<th>Author Name</th>
						<th>Book Category</th>
						<!-- <th>Shelf No</th> -->
						<th>Total Copies</th>
						<!-- <th>Available Copies</th> -->
						<th>Publisher Name</th>
						<!-- <th>Publish Date</th> -->
						<!-- <th>Publish Country</th> -->
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


                         //   $shelfbooks =array();
                         //   if(isset($bk->b_title))
                         //   {
		                       // $shelfbooks =DB::table('shelfbooks')  
		                       //   ->join('shelves','shelfbooks.shelf_id','=','shelves.id')
		                       //   ->join('books','shelfbooks.book_id','=','books.id')
		                       //   ->where('shelfbooks.book_id',$bk->id)
		                       //   ->select('*')
		                       //   ->get();
		                       //   // dd($shelfbooks);
                         //    }


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
						<!-- <td><img src="{{asset($book->b_image)}}" width="80px" height="80px"></td> -->
						<td>{{$book->b_title}}</td>
						<td>{{$book->b_edition}}</td>
						<!-- <td>{{$book->b_price}}</td> -->
						<td>{{$book->b_isbn}}</td>
						<td>
							@foreach($serialNo as $serial)
                               {{$serial->serial_no}},<br>
							@endforeach

						</td>
						<!-- <td><textarea>{{$book->description}}</textarea></td> -->
						<!-- <td>{{$book->length}}</td> -->
					
						<td>
							@foreach($authorbooks as $aubook)
                            	{{$aubook->a_name}},<br>
                            @endforeach
						</td>
					
						<td>{{$book->category->c_name}}</td>

						

						<td>{{$book->total_copies}}</td>
						<!-- <td>{{$book->avalible_copies}}</td> -->
						<td>
							@foreach($bookpublishers as $pub)
                            	{{$pub->p_name}},<br>
                            @endforeach
						</td>
						<!-- <td>{{$book->p_date}}</td> -->
						<!-- <td>{{$book->country->country}}</td> -->
					</tr>
					@endforeach
				</table>
			</div>			
		</div>
	</div>
</div>
@endsection
