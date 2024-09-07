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
<?php 


use App\Models\Auther;
use App\Models\Book;
use App\Models\Authorbook;
?>
        <!-- Start: Products Section -->
            
</br></br></br></br>
					

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="booksmedia-detail-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="booksmedia-detail-box">
                                    	@foreach($book as $bkk)
                                        <div class="single-book-box">                                                
                                            <div class="post-thumbnail">
                                                <div class="book-list-icon yellow-icon"></div>
                                                <img alt="Book" style=" width: 350px; height: 562px" src="{{asset($bkk->b_image)}}"/>                                                    
                                            </div>
                                            <div class="post-detail">
                                    <header class="entry-header">
                                        <h2 class="entry-title">{{ $bkk->b_title }}</h2>
                                            <ul>      
                                               <li><strong>Book Title :</strong> {{ $bkk->b_title }}</li>
                                               <li><strong>Book Edition :</strong> {{ $bkk->b_edition }}</li>
                                               <li><strong>Book ISBN No :</strong> {{ $bkk->b_isbn }}</li>
 				@foreach($book as $books)
                       <?php

                           $bk = Book::where('id',$bkk->id)->first();
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
                            } 
                         ?>
                @endforeach

                                              <li><strong>Book Author :</strong>
                                                     @foreach($authorbooks as $aubook)
                                                          {{$aubook->a_name}},
                                                      @endforeach
                                              <li>
                                              <li><strong>Book Publisher :</strong>
                                                      @foreach($bookpublishers as $pub)
                                                          {{$pub->p_name}},
                                                      @endforeach
                                              <li>
                                              <li><strong>Shelf No :</strong>
                                                      @foreach($shelfbooks as $shfbook)
                                                          {{$shfbook->s_no}},
                                                       @endforeach
                                               <li>

                                               <li><strong>Publish Date :</strong> {{ $bkk->p_date }}</li>
                                               <li><strong>Publisher Country :</strong> {{ $bkk->country->country }}</li>
                                               <li><strong>Book Category :</strong> {{ $bkk->category->c_name }}</li>
                                               <li><strong>Total Copies :</strong> {{ $bkk->total_copies }}</li>
                                               <li><strong>Available Copies :</strong> {{ $bkk->avalible_copies }}</li>
                                               <li><strong>Book Price :</strong> {{ $bkk->b_price }}</li>

                                        </ul>
                                    </header>
                                                <div class="entry-content post-buttons">
                                                    <a href="#." class="btn btn-dark-gray">Place a Hold</a>
                                                    <a href="#." class="btn btn-dark-gray">View sample</a>
                                                    <a href="#." class="btn btn-dark-gray">Find Similar Titles</a>
                                                </div>            
                                            </div>
                                        </div>
                                        <p><strong>Summary:</strong> {{ $bkk->description }} </p>
                                        <ul class="detail-page-listing">
                                            <li><strong>Length:</strong> {{ $bkk->length }} Pages</li>
                                        </ul>
                                        

                                    @endforeach
                                    </div>
                                </div>

                               <div class="col-md-3 col-md-pull-9">
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                        <div class="widget widget_related_search open" data-accordion>
                                            <h4 class="widget-title" data-control>View About</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Authors</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li>
                                                                @foreach($author as $auth)<br>
                                                                  {{$auth->a_name }}<br>
                                                                @endforeach
                                                            </li> 
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Categories</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li>
                                                                @foreach($category as $cat)<br>
                                                                    <!-- <a href="{{route('bookcategory',$cat->id)}}">  -->{{$cat->c_name}}<!-- </a> --><br>
                                                                @endforeach
                                                            </li>    
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Publishers</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li>
                                                                @foreach($publisher as $pub)<br>
                                                                  {{$pub->p_name}}<br>
                                                                @endforeach
                                                            </li>  
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="widget widget_recent_releases">
                                            <h4 class="widget-title">E-Books & Media</h4>
                                            <ul>
                                                <li><a href="{{route('bookindex')}}">Books</a></li>
                                                <li><a href="{{route('ebookindex')}}">eBooks</a></li>
                                                <li><a href="{{route('magazineindex')}}">Magazines</a></li>
                                                <li><a href="{{route('videobookindex')}}">DVDS</a></li>
                                                <li><a href="{{route('audiobookindex')}}">eAudio</a></li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->


@endsection
