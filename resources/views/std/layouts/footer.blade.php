
<!-- Start: Social Network -->
<section class="social-network section-padding">
    <div class="container">
        <div class="center-content">
            <h2 class="section-title">Follow Us</h2>
            <span class="underline center"></span>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <ul>
            
            <li>
                <a class="facebook" href="{{ $contact->fb}}"  target="_blank">
                    <span>
                        <i class="fa fa-facebook-f"></i>
                    </span>
                </a>
            </li>
           

            <li>
                <a class="twitter" href="{{ $contact->twit}}" target="_blank">
                    <span>
                        <i class="fa fa-twitter"></i>
                    </span>
                </a>
            </li>
            <li>
                <a class="google" href="{{ $contact->gmail}}" target="_blank">
                    <span>
                        <i class="fa fa-google-plus"></i>
                    </span>
                </a>
            </li>
            <li>
                <a class="rss" href="tel:{{ $contact->phone}}" target="_blank">
                    <span>
                        <i class="fa fa-phone"></i>
                    </span>
                </a>
            </li>
            <li>
             <a class="linkedin" href="{{ $contact->instagram}}" target="_blank">
                 <span>
                   <i class="fa fa-linkedin"></i>
               </span>
           </a>
       </li>
       <li>
        <a class="youtube" href="{{ $contact->youtube}}" target="_blank">
            <span>
                <i class="fa fa-youtube"></i>
            </span>
        </a>
    </li>
</ul>
</div>
</section>
<!-- End: Social Network -->


        <!-- Start: Footer -->
        <footer class="site-footer">
            <div class="container">
                <div id="footer-widgets">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 widget-container">
                            <div id="text-2" class="widget widget_text">
                                <h3 class="footer-widget-title">About Library</h3>
                                <span class="underline left"></span>
                                <div class="textwidget">
                                </div>
                                <address>
                                    <div class="info">
                                        <i class="fa fa-facebook-f"></i>
                                        <span>Welcome to UOBS Library </span></a>
                                    </div>
                                    <div class="info">
                                        <i class="fa fa-facebook-f"></i>
                                        <span><a href="{{ $contact->fb}}">{{ $contact->fb}}</span></a>
                                    </div>
                                    <div class="info">
                                        <i class="fa fa-envelope"></i>
                                        <span><a href="mailto:{{ $contact->gmail}}">{{ $contact->gmail}}</a></span>
                                    </div>
                                    <div class="info">
                                        <i class="fa fa-phone"></i>
                                        <span><a href="tel:{{ $contact->phone}}">{{ $contact->phone}}</a></span>
                                    </div>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 widget-container">
                          <!--   <div id="nav_menu-2" class="widget widget_nav_menu">
                                <h3 class="footer-widget-title">Quick Links</h3>
                                <span class="underline left"></span>
                                <div class="menu-quick-links-container">
                                    <ul id="menu-quick-links" class="menu">
                                        <li><a href="#">Library News</a></li>
                                        <li><a href="#">History</a></li>
                                        <li><a href="#">Meet Our Staff</a></li>
                                        <li><a href="#">Board of Trustees</a></li>
                                        <li><a href="#">Budget</a></li>
                                        <li><a href="#">Annual Report</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <a href="{{ route('index') }}">
                                <img src="{{asset('images/unilogo.png')}}" style=" width: 400px; margin-top: 40px" alt="LIBRARY" />
                            </a>
                        </div>
                        <div class="clearfix hidden-lg hidden-md hidden-xs tablet-margin-bottom"></div>
                    </div>
                </div>                
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-text col-md-3">
                            <p hidden><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                            <p>University Of Baltistan Skardu</p>
                        </div>
                        <div class="col-md-9 pull-right">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{route('ebookindex')}}">E-Books &amp; Media</a></li>
                                <li><a href="{{ route('bookindex') }}">Books In Library</a></li>
                                <li><a href="{{ route('news.events') }}">News & Events</a></li>
                                <li><a href="{{ route('feedback.create') }}">FeedBack</a></li>
                                <li><a href="{{ route('followus') }}">Follow Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End: Footer -->