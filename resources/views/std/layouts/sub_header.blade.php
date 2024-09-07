        <!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="{{ route('index') }}">
                                                <img src="{{asset('images/unilogo.png')}}" alt="LIBRARIA" />
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
                                                <a href="tel:{{ $contact->phone }}"><i class="fa fa-phone"></i>{{ $contact->phone }}</a>
                                                <span>/</span>
                                                <a href="mailto:{{ $contact->gmail }}"><i class="fa fa-envelope"></i>{{ $contact->gmail }}</a>
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
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('bookindex') }}">Library in Library</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('bookindex') }}"> View Books in Library</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('news.events') }}">News &amp; Events</a>
                                        </li>
                                        <li><a href="{{ route('followus') }}">Follow Us</a></li>
                                    <li><a href="{{ route('feedback.create') }}">Feedback</a></li>
                                        

<!--                                         <li class="dropdown">
                                           
                                               <form method="POST" action="{{ route('stdf.logout') }}" >
                                                   @csrf
                                                   <x-jet-responsive-nav-link href="{{ route('stdf.logout') }}" class="btn btn-default btn-flat"
                                                       onclick="event.preventDefault();
                                                       this.closest('form').submit();">
                                                       {{ __('Logout') }}
                                                   </x-jet-responsive-nav-link>
                                                </form>
                                          -->
                                        </li>
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
                                        <a href="">LIBRARY & BOOKS</a>
                                        <ul>
                                            <li><a href="{{ route('bookindex') }}">Library Books List View</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('news.events') }}">News & Events</a></li>
                                    <li><a href="{{ route('followus') }}">Follow Us</a></li>
                                    <li><a href="{{ route('feedback.create') }}">Feedback</a></li>
<!--                                     <li class="dropdown">
                                           
                                               <form method="POST" action="{{ route('stdf.logout') }}" >
                                                   @csrf
                                                   <x-jet-responsive-nav-link href="{{ route('stdf.logout') }}" class="btn btn-default btn-flat"
                                                       onclick="event.preventDefault();
                                                       this.closest('form').submit();">
                                                       {{ __('Logout') }}
                                                   </x-jet-responsive-nav-link>
                                                </form>
                 
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->

        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>@yield("tophead")</h2>
                    <span class="underline center"></span>
                    <p class="lead">Welcome to UOBS E-Library System</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>@yield("head")</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->
