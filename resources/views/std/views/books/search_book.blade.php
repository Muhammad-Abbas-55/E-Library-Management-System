@extends("std.layouts.sub_layout")
@section("title","Book Index")

@section("tophead")
    Book List
@endsection
@section("head")
    <li><a href="{{ route('bookindex') }}">Book List</a></li>Search
@endsection


@section("content")
<?php 

// use DB;
use App\Models\Auther;
use App\Models\Book;
use App\Models\Authorbook;
use App\Models\Category;

?>
        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="booksmedia-detail-main">
                        <div class="container">
                            <div class="row">
                                <!-- Start: Search Section -->
                                <section class="search-filters">
                                    <div class="container">
                                        <div class="filter-box">
                                            <h3>What are you looking for at the library?</h3>
                                            @foreach($category as $cat)
                                            @endforeach
                                            <form action="{{ route('search.book') }}" method="get">
                                                <div class="col-md-8 col-sm-6">
                                                    <select name="query" id="query" style="width: 100%" class="form-control">
                                                         <option></option>
                                                            @foreach($book as $bkss)
                                                                 <option value="{{ $bkss->b_title }}">{{ $bkss->b_title }}</option>
                                                            @endforeach
                                                    </select><br><br><br>
                                            <!-- <label class="" for="query">Search by Book Title</label> -->

                                               </div>
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" style="height:30px; padding: 5px; margin-top: 35%; " type="submit" value="Search">
                                                    </div>
                                                </div>
                                            </form>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#query").select2({
            placeholder: " Search Books By Title",
            allowClear: true
        });
</script>                                            

                                            <form action="{{ route('a_search.book') }}" method="get">
                                                <div class="col-md-8 col-sm-6">
                                                    <div class="form-group">
                                                        <!-- <label class="sr-only" for="a_query">Search by Auther Name</label> -->
                                                    <select name="a_query" id="a_query" style="width: 100%" class="form-control">
                                                         <option></option>
                                                            @foreach($author as $aut)
                                                                 <option value="{{ $aut->a_name }}">{{ $aut->a_name }}</option>
                                                            @endforeach
                                                    </select><br><br><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" style="height:30px; padding: 5px; margin-top: 35%; " type="submit" value="Search">
                                                    </div>
                                                </div>
                                            </form>
<script type="text/javascript">

      $("#a_query").select2({
            placeholder: "Search Books by Auther Name...",
            allowClear: true
        });
</script> 
                                        </div>
                                    </div>
                                </section>
                                <!-- End: Search Section -->
                            </div>

                   <section class="welcome-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">             
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                            <h4 class="widget-title" data-control>Related Searches</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Categories</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li>
                                                                @foreach($category as $cat)<br>
                                                                    <a href="{{route('bookcategory',$cat->id)}}"> {{$cat->c_name}} <span>(09)</span></a>
                                                                @endforeach
                                                            </li>    
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                    </aside>
                                </div>
                            </div>
                        </div>        
                    </section>


                            <div class="booksmedia-detail-box">
                              <div class="table-tabs" id="responsiveTabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><b class="arrow-up"></b><a data-toggle="tab" href="#sectionA">Search Result</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="sectionA" class="tab-pane fade in active">
                                            <div  class="table-responsive" style="overflow-x:auto;">
                                            <table class="table table-bordered">         
                                               <tr>
                                                   <th>ID</th>
                                                   <th>Image</th>
                                                   <th>Book Title</th>
                                                   <th>Edition</th>
                                                   <th>Price</th>
                                                   <th>ISBN No</th>
                                                   <th>Serial No</th>
                                                   <th>Length</th>
                                                   <th>Auher Name</th>
                                                   <th>Shelf No</th>
                                                   <th>Book Category</th>
                                                   <th>Total Copies</th>
                                                   <th>Available Copies</th>
                                                   <th>Publisher Name</th>
                                                   <th>Publish Date</th>
                                                   <th>Publish Country</th>
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

                                                    <td><a href="bookdetails/{{ $book->id }}"><strong>{{$book->b_title}}</strong></a></td>
                                                    <td>{{$book->b_edition}}</td>
                                                    <td>{{$book->b_price}}</td>
                                                    <td>{{$book->b_isbn}}</td>
                                                    <td>
                                                         @foreach($serialNo as $serial)
                                                            {{$serial->serial_no}},
                                                          @endforeach
                                
                                                    </td>
                                                    <td>{{$book->length}}</td>
                                                    <td>
                                                      @foreach($authorbooks as $aubook)
                                                            {{$aubook->a_name}}<br>
                                                           @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($shelfbooks as $shfbook)
                                                          {{$shfbook->s_no}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>{{$book->category->c_name}}</td>
                                                    <td>{{$book->total_copies}}</td>
                                                    <td>{{$book->avalible_copies}}</td>
                                                    <td>
                                                         @foreach($bookpublishers as $pub)
                                                             {{$pub->p_name}}<br>
                                                         @endforeach
                                                     </td>
                                                    <td>{{$book->p_date}}</td>
                                                    <td>{{$book->country->country}}</td>
                                                 </tr>
                                               @endforeach
                                            </table>
                                            </div>
                                        </div>          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>




@endsection
