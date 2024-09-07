@extends("std.layouts.sub_layout")
@section("title","E-Book Index")

@section("tophead")
    E-Books
@endsection

@section("head")
    <li><a href="{{ route('ebookindex') }}">E-Book Search</a></li>Search
    
@endsection


@section("content")
<?php

// use DB;
use App\Models\Auther;
use App\Models\Ebook;
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
                                           
                                    <form action="{{ route('e_book.search') }}" method="get">
                                        <div class="col-md-8 col-sm-6">
                                            <h4 style="text-align: left">Search E-Books</h4>

                                                    <select name="queryy" id="queryy" style="width: 100%" class="form-control">
                                                         <option></option>
                                                            @foreach($ebook as $ebkss)
                                                                 <option value="{{ $ebkss->title }}">{{ $ebkss->title }}</option>

                                                            @endforeach
                                                    </select><br><br><br>
                                            <!-- <label class="" for="queryy">Search by Book Title</label> -->

                                               </div>
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" style="height:30px; padding: 5px; margin-top: 48%; " type="submit" value="Search">
                                                    </div>
                                                </div>
                                            </form>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#queryy").select2({
            placeholder: " Search E-Books By Title",
            allowClear: true
        });
</script>


                                            <form action="{{ route('a_search.ebook') }}" method="get">
                                                <div class="col-md-8 col-sm-6">
                                                    <div class="form-group">
                                                        <!-- <label class="sr-only" for="aa_query">Search by Auther Name</label> -->
                                                    <select name="aa_query" id="aa_query" style="width: 100%" class="form-control">
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

      $("#aa_query").select2({
            placeholder: "Search E-Books by Auther Name...",
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
                                                                    <a href="{{route('ebookcategory',$cat->id)}}"> {{$cat->c_name}} <span>(09)</span></a>
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
                                                <h5>E-Books</h5>
                                            <table class="table table-bordered">
                                               <tr>
                                                   <th>ID</th>
                                                   <th>E-Book Title</th>
                                                   <th>View</th>
                                                   <th>Download</th>
                                                   <th>Edition</th>
                                                   <th>Category</th>
                                                   <th>Author Name</th>
                                                   <th>Publisher Name</th>
                                                   <th>Publish Country</th>
                                                   <th>Publish Date</th>
                                                   <th>PDF Book</th>
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
                        <td>
                        <a href="read_ebook/{{ $ebook->id }}">
                            <button class="button button2" style="background: #008CBA"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a></td>
                        <td>
                        <a href="file_ebook/download/{{ $ebook->pdfbook }}">
                            <button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a>
                        </td>
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
                        

                        @endif
                    @endforeach
                       </table>
                            </div>




                            <div class="table-responsive" style="overflow-x:auto;">

                                            <h5>Research Paper</h5>
                                            <table class="table table-bordered">         
                                               <tr>
                                                    <th>ID</th>
                                                    <th>Paper Title</th>
                                                    <th>View</th>
                                                    <th>Download</th>
                                                    <th>Edition</th>
                                                    <th>Category</th>
                                                    <th>Author Name</th>
                                                    <th>Publisher Name</th>
                                                    <th>Publish Country</th>
                                                    <th>Publish Date</th>
                                                    <th>Research Paper</th>
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
                        <td>
                        <a href="read_ebook/{{ $ebook->id }}">
                            <button class="button button2" style="background: #008CBA"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a></td>
                        <td>
                        <a href="file_ebook/download/{{ $ebook->papers }}">
                            <button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a>
                        </td>
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
                        

                        @endif
                    @endforeach
                       </table>
                            </div>


                            <div class="table-responsive" style="overflow-x:auto;">

                                            <h5>Audio Books</h5>
                                            <table class="table table-bordered">         
                                               <tr>
                                                    <th>ID</th>
                                                    <th>E-Book Title</th>
                                                    <th>View</th>
                                                    <th>Download</th>
                                                    <th>Instructure</th>
                                                    <th>Edition</th>
                                                    <th>Category</th>
                                                    <th>Author Name</th>
                                                    <th>Publisher Name</th>
                                                    <th>Publish Country</th>
                                                    <th>Publish Date</th>
                                                    <th>Audio Book</th>
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
                        <td>
                        <a href="read_ebook/{{ $ebook->id }}">
                            <button class="button button2" style="background: #008CBA"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a></td>
                        <td>
                        <a href="file_ebook/download/{{ $ebook->audiobook }}">
                            <button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a>
                        </td>
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
                        

                        @endif
                    @endforeach
                       </table>
                            </div>




                            <h5>Magazines</h5>
                                             <div  class="table-responsive" style="overflow-x:auto;">
                                            <table class="table table-bordered">         
                                               <tr>
                                                    <th>ID</th>
                                                    <th>Magazine Title</th>
                                                    <th>View</th>
                                                    <th>Download</th>
                                                    <th>Edition</th>
                                                    <th>Category</th>
                                                    <th>Author Name</th>
                                                    <th>Publisher Name</th>
                                                    <th>Publish Country</th>
                                                    <th>Publish Date</th>
                                                    <th>Magazine</th>
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
                        <td>
                        <a href="read_ebook/{{ $ebook->id }}">
                            <button class="button button2" style="background: #008CBA"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a></td>
                        <td>
                        <a href="file_ebook/download/{{ $ebook->magazine }}">
                            <button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a>
                        </td>
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
                        
                        @endif
                    @endforeach
                       </table>
                            </div>



                            <h5>Videos</h5>
                                            <div  class="table-responsive" style="overflow-x:auto;">
                                            <table class="table table-bordered">         
                                               <tr>
                                                 <th>ID</th>
                                                 <th>Video Title</th>
                                                 <th>View</th>
                                                 <th>Download</th>
                                                 <th>Instructure</th>
                                                 <th>Edition</th>
                                                 <th>Category</th>
                                                 <th>Author Name</th>
                                                 <th>Publisher Name</th>
                                                 <th>Publish Country</th>
                                                 <th>Publish Date</th>
                                                 <th>Video Book</th>
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
                        <td>
                        <a href="read_ebook/{{ $ebook->id }}">
                            <button class="button button2" style="background: #008CBA"><i class="fa fa-eye" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a></td>
                        <td>
                        <a href="file_ebook/download/{{ $ebook->videobook }}">
                            <button class="button button2"  style="background: orange"><i class="fa fa-download" style="font-size: 16px; padding: -5px -9px; margin: -2px -3px;" ></i></button>
                        </a>
                        </td>
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
                        
                        @endif
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
        <!-- End: Products Section -->






@endsection


