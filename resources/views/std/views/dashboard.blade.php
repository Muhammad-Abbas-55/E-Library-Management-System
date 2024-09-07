@extends("std.layouts.layout")
@section("title","Dashboard")

@section("content")

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<!-- Start: Search Section -->
<section class="search-filters">
    <div class="container">
        <div class="filter-box">
            <h3>What are you looking for at the library?</h3>           
        </div>
    </div>
</section>
                        <div class="container">
                            <div class="booksmedia-detail-box">
                              <div class="table-tabs" id="responsiveTabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><b class="arrow-up"></b><a data-toggle="tab" href="#sectionA">Search Books Available At Library</a></li>
                                        <li><b class="arrow-up"></b><a data-toggle="tab" href="#sectionB">Search E-Books</a></li>
                                    </ul>
                                <div class="tab-content">
                                    <div id="sectionA" class="tab-pane fade in active">
                                    <div class="container">
                                        <div class="filter-box">
                                            <h3>Search Books Available At Library</h3>
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
                                                            @foreach($auther as $aut)
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

                        <div class="container">
                            <div class="row"><br>
                                <div class="col-md-8">
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                            <h4 class="widget-title" data-control>Related Searches</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Search By Category</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li>
                                                                @foreach($category as $cat)<br>
                                                                    <a href="{{route('bookcategory',$cat->id)}}"> {{$cat->c_name}} <span>(--)</span></a>
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
                    </div>
                </div> 
            </div>
                                <div id="sectionB" class="tab-pane fade in">
                                    <div class="container">
                                        <div class="filter-box">
                                            <h3>Search E-Books</h3>
                                            @foreach($category as $cat)
                                            @endforeach
                                                <form action="{{ route('e_book.search') }}" method="get">
                                                <div class="col-md-8 col-sm-6">
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
                                                        <input class="form-control" style="height:30px; padding: 5px; margin-top: 35%; " type="submit" value="Search">
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
                                                            @foreach($auther as $aut)
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">             
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                            <h4 class="widget-title" data-control>Related Searches</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Search By Category</h5>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>    
<!-- End: Search Section -->
                    
                                   

<!-- Start: Welcome Section -->
<section class="welcome-section">
        <div class="row">
            <div class="col-md-5">
                <div class="welcome-wrap">
                    <div class="welcome-text" style="margin-left: 15%">
                        <h2 class="section-title">Welcome to the UOBS library</h2>
                        <span class="underline left"></span>
                        <p class="lead">{{ $about->intro }}</p>
                        <p> 
                            
                         </br> {{ $about->description }}
                            


                        </p>
                        <a class="btn btn-primary" href="{{ route('news.events') }}">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="facts-counter">
                    <ul>
                        <li class="bg-red">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="magazine"></i>
                                </div>
                                <span>Books<strong class="fact-counter">{{$book->count()}}</strong></span>
                            </div>
                        </li>
                        <li class="bg-light-green">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="ebook"></i>
                                </div>
                                <span>eBooks<strong class="fact-counter">{{$pdfbook->count()}}</strong></span>
                            </div>
                        </li>

                        <li class="bg-red">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="magazine"></i>
                                </div>
                                <span>Research Paper<strong class="fact-counter">{{$papers->count()}}</strong></span>
                            </div>
                        </li>
                        <li class="bg-green">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="eaudio"></i>
                                </div>
                                <span>eAudio<strong class="fact-counter">{{$audiobook->count()}}</strong></span>
                            </div>
                        </li>
                        <li class="bg-red">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="magazine"></i>
                                </div>
                                <span>Magazine<strong class="fact-counter">{{$magazine->count()}}</strong></span>
                            </div>
                        </li>
                        <li class="bg-blue">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="videos"></i>
                                </div>
                                <span>Videos<strong class="fact-counter">{{$videobook->count()}}</strong></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <img style="height: 289px;" style="height: 700px;margin-top: 80px"; src="{{asset($about->a_image)}}"/>
            </div>
        </div>
    

</section>
<!-- End: Welcome Section -->

<!-- Start: Category Filter -->
<section class="category-filter section-padding">
    <div class="container">
        <div class="center-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="section-title">Check Out The New Releases</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
            </div>
        </div>
        <div class="filter-buttons">
            <div class="filter btn" data-filter="all">All Releases</div>
            <div class="filter btn" data-filter=".books">Books</div>
            <div class="filter btn" data-filter=".papers">Research Paper</div>
            <div class="filter btn" data-filter=".ebooks">E-Books</div>
            <div class="filter btn" data-filter=".audio">Audio</div>
            <div class="filter btn" data-filter=".magazines">Magazines</div>
            <div class="filter btn" data-filter=".video">Video</div>
        </div>
    </div>
    <div id="category-filter">
        <ul class="category-list">


        @foreach($bk as $bok)
            <li class="category-item books"  style="border-color: orange; border-style: solid;">
                <figure>
                    <img style="height: 289px;" src="{{asset('images/category-filter/home-v1/b1.jpg')}}" alt="New Releaase" />
                    <figcaption class="bg-orange">                       
                        <div class="info-block">
                            <h4>{{ $bok->b_title }}</h4>
                            <span class="author"><strong>Edition:</strong>{{$bok->b_edition}}</span>
                            <span class="author"><strong>Category:</strong>{{$bok->category->c_name}}</span>
                            <span class="author"><strong>Type:</strong>Book</span>
                            <p>Latest Book</p>
                            <a href="bookdetails/{{ $bok->id }}">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </figcaption>
                </figure>
            </li>
        @endforeach
   

        @foreach($pap as $pa)
            <li class="category-item papers"  style="border-color: orange; border-style: solid;">
                <figure>
                    <img style="height: 289px;"  src="{{asset('images/category-filter/home-v1/b3.jpg')}}" alt="New Releaase" />
                    <figcaption class="bg-orange">                       
                        <div class="info-block">
                            <h4>{{ $pa->title }}</h4>
                            <span class="author"><strong>Edition:</strong>{{$pa->edition}}</span>
                            <span class="author"><strong>Category:</strong>{{$pa->category->c_name}}</span>
                            <span class="author"><strong>Type:</strong>Research Paper</span>
                            <p>Latest Research Paper</p>
                            <a href="read_ebook/{{ $pa->id }}">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </figcaption>
                </figure>
            </li>
        @endforeach     

        @foreach($pdf as $pd)
            <li class="category-item ebooks"  style="border-color: orange; border-style: solid;">
                <figure>
                    <img style="height: 289px;" src="{{asset('images/category-filter/home-v1/category-filter-img-07.jpg')}}" alt="New Releaase" />
                    <figcaption class="bg-orange">                       
                        <div class="info-block">
                            <h4>{{ $pd->title }}</h4>
                            <span class="author"><strong>Edition:</strong>{{$pd->edition}}</span>
                            <span class="author"><strong>Category:</strong>{{$pd->category->c_name}}</span>
                            <span class="author"><strong>Type:</strong>E-Book</span>
                            <p>Latest E-Book</p>
                            <a href="read_ebook/{{ $pd->id }}">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </figcaption>
                </figure>
            </li>
        @endforeach

        @foreach($aud as $au)
            <li class="category-item audio"  style="border-color: orange; border-style: solid;">
                <figure>
                    <img style="height: 289px;" src="{{asset('images/category-filter/home-v1/b2.jpg')}}" alt="New Releaase" />
                    <figcaption class="bg-orange">                       
                        <div class="info-block">
                            <h4>{{ $au->title }}</h4>
                            <span class="author"><strong>Instructure:</strong>{{$au->inst}}</span>
                            <span class="author"><strong>Category:</strong>{{$au->category->c_name}}</span>
                            <span class="author"><strong>Type:</strong>Audio</span>
                            <p>Latest Audio</p>
                            <a href="read_ebook/{{ $au->id }}">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </figcaption>
                </figure>
            </li>
        @endforeach


        @foreach($mag as $ma)
            <li class="category-item magazines"  style="border-color: orange; border-style: solid;">
                <figure>
                    <img style="height: 289px;" src="{{asset('images/category-filter/home-v1/category-filter-img-08.jpg')}}" alt="New Releaase" />
                    <figcaption class="bg-orange">                       
                        <div class="info-block">
                            <h4>{{ $ma->title }}</h4>
                            <span class="author"><strong>Edition:</strong>{{$ma->edition}}</span>
                            <span class="author"><strong>Category:</strong>{{$ma->category->c_name}}</span>
                            <span class="author"><strong>Type:</strong>Magazine</span>
                            <p>Latest Magazine</p>
                            <a href="read_ebook/{{ $ma->id }}">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </figcaption>
                </figure>
            </li>
        @endforeach

                @foreach($vid as $vi)
            <li class="category-item video"  style="border-color: orange; border-style: solid;">
                <figure>
                    <img style="height: 289px;" src="{{asset('images/category-filter/home-v1/category-filter-img-04.jpg')}}" alt="New Releaase" />
                    <figcaption class="bg-orange">                       
                        <div class="info-block">
                            <h4>{{ $vi->title }}</h4>
                            <span class="author"><strong>Instructure:</strong>{{$vi->instructure}}</span>
                            <span class="author"><strong>Category:</strong>{{$vi->category->c_name}}</span>
                            <span class="author"><strong>Type:</strong>Video</span>
                            <p>Latest Video</p>
                            <a href="read_ebook/{{ $vi->id }}">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </figcaption>
                </figure>
            </li>
        @endforeach

        </ul>
        <div class="center-content">
            <a href="#" class="btn btn-primary">View More</a>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Start: Category Filter -->

<!-- Start: Features -->
<section class="features">
                    <h2 class="section-title" style="text-align: center;">Services</h2><br>

    <div class="container">
        <ul>
            <li class="bg-yellow">
                <div class="feature-box">
                    <i class="yellow"></i>
                    <h3>Books</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                    <a class="yellow" href="{{route('bookindex')}}">
                        View Selection <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </li>
           <li class="bg-light-green">
                <div class="feature-box">
                    <i class="light-green"></i>
                    <h3>eBooks</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                    <a class="light-green" href="{{route('ebookindex')}}">
                        View Selection <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </li>
            <li class="bg-red">
                <div class="feature-box">
                    <i class="red"></i>
                    <h3>Research Papers</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                    <a class="light-green" href="{{route('papersindex')}}">
                        View Selection <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </li>
            <li class="bg-blue">
                <div class="feature-box">
                    <i class="blue"></i>
                    <h3>DVDs</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                    <a class="blue" href="{{route('videobookindex')}}">
                        View Selection <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </li>
            <li class="bg-red">
                <div class="feature-box">
                    <i class="red"></i>
                    <h3>Magazines</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                    <a class="red" href="{{route('magazineindex')}}">
                        View Selection <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </li>
            <li class="bg-green">
                <div class="feature-box">
                    <i class="green"></i>
                    <h3>eAudio</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                    <a class="green" href="{{route('audiobookindex')}}">
                        View Selection <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End: Features -->





<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 90%; margin-left: 5%">
    <br>
    <h1 style="text-align: center; background-color: gray; color: white">NEWS & EVENTS</h1><br>
    <h3><marquee behavior="scroll" direction="left">Welcome to library News and Events.</marquee></h3><br>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img style="height: 289px;" style="height: 370px; width: 100%" src="{{asset($news->slider1_image)}}" alt="Los Angeles">
    </div>
    <div class="item">
      <img style="height: 289px;" style="height: 370px; width: 100%" src="{{asset($news->slider2_image)}}" alt="Chicago">
    </div>

    <div class="item">
      <img style="height: 289px;"  style="height: 370px; width: 100%" src="{{asset($news->slider3_image)}}" alt="New York">
    </div>
    <div><br>
      <h3 style="text-align: center;" >{{ $news->e_title }}</h3><br>

                        <ul class="news-event-info" style="text-align: center;" >
                            <li>
                                <!-- <a href="#" target="_blank"> -->
                                    <i class="fa fa-calendar"></i>
                                    {{$news->e_date}}
                                <!-- </a> -->
                            </li>
                            <li>
                                <!-- <a href="#" target="_blank"> -->
                                    <i class="fa fa-clock-o"></i>
                                    {{$news->e_stime}} - {{$news->e_stime}} 
                                <!-- </a> -->
                            </li>
                            <li>
                                <!-- <a href="#" target="_blank"> -->
                                    <i class="fa fa-map-marker"></i>
                                    {{$news->e_location}}
                                <!-- </a> -->
                            </li>
                        </ul>
      <p style="text-align: center;" >{{ $news->e_description }}</p><br>
      </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




@endsection
