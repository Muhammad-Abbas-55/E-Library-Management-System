
        <!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="{{ route('index') }}">
                                                <img src="images/unilogo.png" alt="LIBRARY" />
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="topbar-info">
                                                <a href="tel:{{ $contact->phone  }}"><i class="fa fa-phone"></i>{{ $contact->phone}}</a>
                                                <span>/</span>
                                                <a href="mailto:{{ $contact->gmail }}"><i class="fa fa-envelope"></i>{{ $contact->gmail}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown active">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('index') }}">Home</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{route('ebookindex')}}">E-Books &amp; Media</a>
                                            <ul class="dropdown-menu">
                                               <li><a href="{{route('ebookindex')}}">View E-Books</a></li>
                                                <li><a href="{{route('audiobookindex')}}">View Audio Books</a></li>
                                                <li><a href="{{route('papersindex')}}">View Research Paper</a></li>
                                                <li><a href="{{route('magazineindex')}}">View Magazine </a></li>
                                                <li><a href="{{route('videobookindex')}}">View Video Media</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('bookindex') }}">Books in Library</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('bookindex') }}">View Books in Library</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('news.events') }}">News &amp; Events</a>
                                        </li>
                                        
                                        <li><a href="{{ route('followus') }}">Follow Us</a></li>
                                       <!--  <li class="dropdown">
                                           
                                               <form method="POST" action="{{ route('stdf.logout') }}" >
                                                   @csrf
                                                   <x-jet-responsive-nav-link href="{{ route('stdf.logout') }}" class="btn btn-default btn-flat"
                                                       onclick="event.preventDefault();
                                                       this.closest('form').submit();">
                                                       {{ __('Logout') }}
                                                   </x-jet-responsive-nav-link>
                                                </form>
                                         
                                        </li> -->
                                        <li><a href="{{ route('feedback.create') }}">Feedback</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                            <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ebookindex') }}">E-Books &amp; Media</a>
                                        <ul>
                                            <li><a href="{{route('ebookindex')}}">View E-Books</a></li>
                                            <li><a href="{{route('audiobookindex')}}">View Audio Books</a></li>
                                            <li><a href="{{route('papersindex')}}">View Research Paper</a></li>
                                            <li><a href="{{route('magazineindex')}}">View Magazine </a></li>
                                             <li><a href="{{route('videobookindex')}}">View Video Media</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="">BOOKS in LIBRARY</a>
                                        <ul>
                                            <li><a href="{{ route('bookindex') }}">View Books in Library</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('news.events') }}">News &amp; Events</a>
                                    </li>
                                    <li>
                                        <ul>
                                            <form method="POST" action="{{ route('stdf.logout') }}" >
                                               @csrf
                                               <x-jet-responsive-nav-link href="{{ route('stdf.logout') }}" class="btn btn-default btn-flat"
                                                   onclick="event.preventDefault();
                                                   this.closest('form').submit();">
                                                   {{ __('Logout') }}
                                               </x-jet-responsive-nav-link>
                                            </form>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('followus') }}">Follow Us</a></li>
                                    <li><a href="{{ route('feedback.create') }}">Feedback</a></li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->
        
        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <!-- <img alt="Home Slide" src="{{asset('images/header-slider/home-v1/header-slide.jpg')}}" /> -->

                         <img style="height: 825px"; alt="Home Slide" src="{{asset($about->a_image)}}"/>

                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <img style="width: 10%; height: 10%; margin-right: -20px; float: left" src="{{asset('images/header-slider/home-v1/unilogo.png')}}" />
                            <h2 style="color:green; font-size:50px; text-shadow: 2px 2px #fff">UOBS E-Library Management System</h2>
                            <p>{{ $about->intro }}</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="{{ route('news.events') }}" class="btn btn-primary">Read More</a>
                                <!-- <a href="#" class="btn btn-default">Purchase</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <!-- <img alt="Home Slide" src="{{asset('images/header-slider/home-v1/header-slide.jpg')}}" /> -->
                         <img style="height: 825px"; alt="Home Slide" src="{{asset($about->a_image)}}"/>
                          

                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <img style="width: 10%; height: 10%; margin-right: -20px; float: left" src="{{asset('images/header-slider/home-v1/unilogo.png')}}" />
                            <h2 style="color:green; font-size:50px; text-shadow: 2px 2px #fff">UOBS E-Library Management System</h2>
                            <p>{{ $about->intro }}</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="{{ route('news.events') }}" class="btn btn-primary">Read More</a>
                                <!-- <a href="#" class="btn btn-default">Purchase</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                         <img style="height: 825px"; alt="Home Slide" src="{{asset($about->a_image)}}"/>

                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <img style="width: 10%; height: 10%; margin-right: -20px; float: left" src="{{asset('images/header-slider/home-v1/unilogo.png')}}" />
                            <h2 style="color:green; font-size:50px; text-shadow: 2px 2px #fff">UOBS E-Library  Management System</h2>
                            <p>{{ $about->intro }}</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="{{ route('news.events') }}" class="btn btn-primary">Read More</a>
                                <!-- <a href="#" class="btn btn-default">Purchase</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
            <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
        </div>
        <!-- End: Slider Section -->
        