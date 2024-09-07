<?php 
namespace App\Http\Controllers;

use App\Models\Auther;
use App\Models\Book;
use App\Models\Authorbook;
use App\Models\Category;
use DB;

?>
@extends("std.layouts.sub_layout")
@section("title","Category Vice Book Listing Page")

@section("tophead")
Book Details
@endsection

@section("head")
<li><a href="{{ route('bookindex') }}">Book List</a></li>
Book Details
@endsection


@section("content")

<!-- Start: Products Section -->

</br></br></br></br>


@foreach($books as $book)

@endforeach

@foreach($bookauthor as $aubook)<br><br>
  {{ $aubook->book_id }}
  {{ $book->b_title }}
@endforeach




@endsection
