@include("std.layouts.styles")
@include("std.layouts.scripts")


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
                                            <a href="{{ route('logindash') }}">
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
                                                <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>0581578344</a>
                                                <span>/</span>
                                                <a href="mailto:support@libraria.com"><i class="fa fa-envelope"></i>uobs.library@gmail.com</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown active">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('logindash') }}">Home</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{route('student.login')}}">Student Login</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('staff.login') }}">Staff Login</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{route('news.events')}}">News &amp; Events</a>
                                        
                                        <li><a href="{{route('followus')}}">Follow Us</a></li>
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
                                        <a href="{{ route('logindash') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.login') }}">Student Login</a>
                                    </li>
                                    <li>
                                        <a href="staff.login">Staff Login</a>
                                    <li>
                                        <a href="{{ route('news.events') }}">News &amp; Events</a>
                                    </li>
                                    <li><a href="{{route('followus')}}">Follow Us</a></li>
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
                        <img alt="Home Slide" src="{{asset('images/header-slider/home-v1/header-slide.jpg')}}" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <img style="width: 10%; height: 15%; margin-right: -20px; float: left" src="{{asset('images/header-slider/home-v1/unilogo.png')}}" />
                            <h2 style="color:green; font-size:50px; text-shadow: 2px 2px #fff">UOBS E-Library & Management System</h2>
                            <p>{{ $about->intro }}</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="{{asset('images/header-slider/home-v1/header-slide.jpg')}}" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <img style="width: 10%; height: 15%; margin-right: -20px; float: left" src="{{asset('images/header-slider/home-v1/unilogo.png')}}" />
                            <h2 style="color:green; font-size:50px; text-shadow: 2px 2px #fff">UOBS E-Library & Management System</h2>
                            <p>{{ $about->intro }}</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="{{asset('images/header-slider/home-v1/header-slide.jpg')}}" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <img style="width: 10%; height: 15%; margin-right: -20px; float: left" src="{{asset('images/header-slider/home-v1/unilogo.png')}}" />
                            <h2 style="color:green; font-size:50px; text-shadow: 2px 2px #fff">UOBS E-Library & Management System</h2>
                            <p>{{ $about->intro }}</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="#" class="btn btn-primary">Read More</a>
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
        


