<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from townhub.kwst.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Feb 2020 16:38:18 GMT -->
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Townhub - Directory Listing Template</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="/front/css/reset.css">
    <link type="text/css" rel="stylesheet" href="/front/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="/front/css/style.css">
    <link type="text/css" rel="stylesheet" href="/front/css/dashboard-style.css">
    <link type="text/css" rel="stylesheet" href="/front/css/color.css">
    <link type="text/css" rel="stylesheet" href="/front/css/custom.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="/front/images/favicon.ico">
</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="loader-inner">
        <div class="loader-inner-cirle"></div>
    </div>
</div>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!-- header -->
    <header class="main-header">
        <!-- logo-->
        <a href="index.html" class="logo-holder"><img src="/front/images/logo.png" alt=""></a>
        <!-- logo end-->
        <!-- header-search_btn-->
        <div class="header-search_btn show-search-button"><i class="fal fa-search"></i><span>Search</span></div>
        <!-- header-search_btn end-->
        <!-- header opt -->
        @if(Auth::check())
            <div class="cart-btn   show-header-modal" data-microtip-position="bottom" role="tooltip"
                 aria-label="Your Wishlist"><i class="fal fa-heart"></i><span class="cart-counter green-bg"></span>
            </div>
            <div class="header-user-menu">
                <div class="header-user-name">
                    <span><img src="{{ \Illuminate\Support\Facades\Auth::user()->avatar_name }}" alt=""></span>
                    Hello , {{ \Illuminate\Support\Facades\Auth::user()->fullname }}
                </div>
                <ul>
                    <li><a href="{{ route('front.dashboard.profile.edit') }}"> Edit profile</a></li>
                    <li><a href="{{ route('front.dashboard.listing.index') }}"> My Listings</a></li>
                    <li><a href="dashboard-bookings.html"> Bookings </a></li>
                    <li><a href="{{ route('front.dashboard.review.index') }}"> Reviews </a></li>
                    <li><a data-token="{{ csrf_token() }}" id="logout" href="{{ route('logout') }}">Log Out</a></li>
                </ul>
            </div>
        @else
            <div class="show-reg-form modal-open avatar-img" data-srcav="/front/images/avatar/3.jpg"><i
                    class="fal fa-user"></i>Sign In
            </div>
    @endif
    <!-- header opt end-->
        <!-- lang-wrap-->
        <div class="lang-wrap">
            <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i
                    class="fa fa-caret-down arrlan"></i></div>
            <ul class="lang-tooltip lang-action no-list-style">
                <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                <li><a href="#" data-lantext="Fr">Franais</a></li>
                <li><a href="#" data-lantext="Es">Espaol</a></li>
                <li><a href="#" data-lantext="De">Deutsch</a></li>
            </ul>
        </div>
        <!-- lang-wrap end-->
        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul class="no-list-style">
                    <li>
                        <a href="#" class="act-link">Home <i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="index.html">Parallax Image</a></li>
                            <li><a href="index2.html">Slider</a></li>
                            <li><a href="index3.html">Slideshow</a></li>
                            <li><a href="index4.html">Video</a></li>
                            <li><a href="index5.html">Map</a></li>
                        </ul>
                        <!--second level end-->
                    </li>
                    <li>
                        <a href="#">Listings <i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="{{ route('front.listing.index') }}">Column map</a></li>
                            <li><a href="listing2.html">Column map 2</a></li>
                            <li><a href="listing3.html">Fullwidth Map</a></li>
                            <li><a href="listing4.html">Fullwidth Map 2</a></li>
                            <li><a href="listing5.html">Without Map</a></li>
                            <li><a href="listing6.html">Without Map 2</a></li>
                            <li>
                                <a href="#">Single <i class="fa fa-caret-down"></i></a>
                                <!--third  level  -->
                                <ul>
                                    <li><a href="listing-single.html">Style 1</a></li>
                                    <li><a href="listing-single2.html">Style 2</a></li>
                                    <li><a href="listing-single3.html">Style 3</a></li>
                                    <li><a href="listing-single4.html">Style 4</a></li>
                                </ul>
                                <!--third  level end-->
                            </li>
                        </ul>
                        <!--second level end-->
                    </li>
                    <li>
                        <a href="blog.html">News</a>
                    </li>
                    <li>
                        <a href="#">Pages <i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li>
                                <a href="#">Shop<i class="fa fa-caret-down"></i></a>
                                <!--third  level  -->
                                <ul>
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-single.html">Product single</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                </ul>
                                <!--third  level end-->
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="author-single.html">User single</a></li>
                            <li><a href="help.html">How it Works</a></li>
                            <li><a href="booking.html">Booking</a></li>
                            <li><a href="pricing-tables.html">Pricing</a></li>
                            <li><a href="dashboard.html">User Dasboard</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                            <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="404.html">404</a></li>
                        </ul>
                        <!--second level end-->
                    </li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
        <!-- header-search_container -->
        <div class="header-search_container header-search vis-search">
            <div class="container small-container">
                <div class="header-search-input-wrap fl-wrap">
                    <!-- header-search-input -->
                    <div class="header-search-input">
                        <label><i class="fal fa-keyboard"></i></label>
                        <input type="text" placeholder="What are you looking for ?" value=""/>
                    </div>
                    <!-- header-search-input end -->
                    <!-- header-search-input -->
                    <div class="header-search-input location autocomplete-container">
                        <label><i class="fal fa-map-marker"></i></label>
                        <input type="text" placeholder="Location..." class="autocomplete-input" id="autocompleteid2"
                               value=""/>
                        <a href="#"><i class="fal fa-dot-circle"></i></a>
                    </div>
                    <!-- header-search-input end -->
                    <!-- header-search-input -->
                    <div class="header-search-input header-search_selectinpt ">
                        <select data-placeholder="Category" class="chosen-select no-radius">
                            <option>All Categories</option>
                            <option>All Categories</option>
                            <option>Shops</option>
                            <option>Hotels</option>
                            <option>Restaurants</option>
                            <option>Fitness</option>
                            <option>Events</option>
                        </select>
                    </div>
                    <!-- header-search-input end -->
                    <button class="header-search-button green-bg" onclick="window.location.href='listing.html'"><i
                            class="far fa-search"></i> Search
                    </button>
                </div>
                <div class="header-search_close color-bg"><i class="fal fa-long-arrow-up"></i></div>
            </div>
        </div>
        <!-- header-search_container  end -->
        <!-- wishlist-wrap-->
        <div class="header-modal novis_wishlist">
            <!-- header-modal-container-->
            <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                <!--widget-posts-->
                <div class="widget-posts  fl-wrap">
                    <ul class="no-list-style">
                        @foreach(\Illuminate\Support\Facades\Auth::user()->wishlist as $event)
                            <li>
                                <div class="widget-posts-img"><a href="{{ route('front.event.show',$event->id) }}"><img
                                            src="{{ $event->thumbnail['url'] }}" alt="{{ $event->title }}"></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="{{ route('front.event.show',$event->id) }}">{{ $event->title }}</a>
                                    </h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i>{{ $event->address }}</a></div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Fitness</a> <a
                                            href="listing.html">Gym</a></div>
                                    <div class="widget-posts-descr-score">5.0</div>
                                    <a class="wishlist" data-id="{{ $event->id }}"
                                       href="{{ route('front.wishlist.delete') }}">
                                        <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- widget-posts end-->
            </div>
            <!-- header-modal-container end-->
            <div class="header-modal-top fl-wrap">
                <h4>Your Wishlist : <span><strong></strong> Locations</span></h4>
                <div class="close-header-modal"><i class="far fa-times"></i></div>
            </div>
        </div>
        <!--wishlist-wrap end -->
    </header>
    <!-- header end-->
    <!-- wrapper-->
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!--  section  -->
            <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
                <div class="container">
                    <div class="dashboard-breadcrumbs breadcrumbs"><a href="#">Home</a>
                        @section('navBar')
                        @show
                    </div>
                    <!--Tariff Plan menu-->
                    <div class="tfp-btn"><span>Tariff Plan : </span> <strong>Extended</strong></div>
                    <div class="tfp-det">
                        <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                        <a href="#" class="tfp-det-btn color2-bg">Details</a>
                    </div>
                    <!--Tariff Plan menu end-->
                    <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                        <h1>Welcome : <span>{{ ucwords(\Illuminate\Support\Facades\Auth::user()->fullname) }}</span>
                        </h1>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="dashboard-header fl-wrap">
                    <div class="container">
                        <div class="dashboard-header_conatiner fl-wrap">
                            <div class="dashboard-header-avatar">
                                <img src="{{ \Illuminate\Support\Facades\Auth::user()->avatar_name }}" alt="">
                                <a href="dashboard-myprofile.html" class="color-bg edit-prof_btn"><i
                                        class="fal fa-edit"></i></a>
                            </div>
                            <div class="dashboard-header-stats-wrap">
                                <div class="dashboard-header-stats">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!--  dashboard-header-stats-item -->
                                            <div class="swiper-slide">
                                                <div class="dashboard-header-stats-item">
                                                    <i class="fal fa-map-marked"></i>
                                                    Active Listings
                                                    <span>21</span>
                                                </div>
                                            </div>
                                            <!--  dashboard-header-stats-item end -->
                                            <!--  dashboard-header-stats-item -->
                                            <div class="swiper-slide">
                                                <div class="dashboard-header-stats-item">
                                                    <i class="fal fa-chart-bar"></i>
                                                    Listing Views
                                                    <span>1054</span>
                                                </div>
                                            </div>
                                            <!--  dashboard-header-stats-item end -->
                                            <!--  dashboard-header-stats-item -->
                                            <div class="swiper-slide">
                                                <div class="dashboard-header-stats-item">
                                                    <i class="fal fa-comments-alt"></i>
                                                    Total Reviews
                                                    <span>79</span>
                                                </div>
                                            </div>
                                            <!--  dashboard-header-stats-item end -->
                                            <!--  dashboard-header-stats-item -->
                                            <div class="swiper-slide">
                                                <div class="dashboard-header-stats-item">
                                                    <i class="fal fa-heart"></i>
                                                    Times Bookmarked
                                                    <span>654</span>
                                                </div>
                                            </div>
                                            <!--  dashboard-header-stats-item end -->
                                        </div>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats  end -->
                                <div class="dhs-controls">
                                    <div class="dhs dhs-prev"><i class="fal fa-angle-left"></i></div>
                                    <div class="dhs dhs-next"><i class="fal fa-angle-right"></i></div>
                                </div>
                            </div>
                            <!--  dashboard-header-stats-wrap end -->
                            <a href="{{ route('front.dashboard.listing.create') }}" class="add_new-dashboard">Add
                                Listing <i class="fal fa-layer-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
                <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
                <div class="circle-wrap" style="left:120px;bottom:120px;"
                     data-scrollax="properties: { translateY: '-200px' }">
                    <div class="circle_bg-bal circle_bg-bal_small"></div>
                </div>
                <div class="circle-wrap" style="right:420px;bottom:-70px;"
                     data-scrollax="properties: { translateY: '150px' }">
                    <div class="circle_bg-bal circle_bg-bal_big"></div>
                </div>
                <div class="circle-wrap" style="left:420px;top:-70px;"
                     data-scrollax="properties: { translateY: '100px' }">
                    <div class="circle_bg-bal circle_bg-bal_big"></div>
                </div>
                <div class="circle-wrap" style="left:40%;bottom:-70px;">
                    <div class="circle_bg-bal circle_bg-bal_middle"></div>
                </div>
                <div class="circle-wrap" style="right:40%;top:-10px;">
                    <div class="circle_bg-bal circle_bg-bal_versmall"
                         data-scrollax="properties: { translateY: '-350px' }"></div>
                </div>
                <div class="circle-wrap" style="right:55%;top:90px;">
                    <div class="circle_bg-bal circle_bg-bal_versmall"
                         data-scrollax="properties: { translateY: '-350px' }"></div>
                </div>
            </section>
            <!--  section  end-->
            <!--  section  -->
            <section class="gray-bg main-dashboard-sec" id="sec1">
                <div class="container">
                    @yield('content')
                </div>
            </section>
            <!--  section  end-->
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>
    <!-- wrapper end-->
    <!--footer -->
    <footer class="main-footer fl-wrap">
        <!-- footer-header-->
        <div class="footer-header fl-wrap grad ient-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="subscribe-header">
                            <h3>Subscribe For a <span>Newsletter</span></h3>
                            <p>Want to be notified about new locations ? Just sign up.</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="subscribe-widget">
                            <div class="subcribe-form">
                                <form id="subscribe">
                                    <input class="enteremail fl-wrap" name="email" id="subscribe-email"
                                           placeholder="Enter Your Email" spellcheck="false" type="text">
                                    <button type="submit" id="subscribe-button" class="subscribe-button"><i
                                            class="fal fa-envelope"></i></button>
                                    <label for="subscribe-email" class="subscribe-message"></label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-header end-->
        <!--footer-inner-->
        <div class="footer-inner   fl-wrap">
            <div class="container">
                <div class="row">
                    <!-- footer-widget-->
                    <div class="col-md-4">
                        <div class="footer-widget fl-wrap">
                            <div class="footer-logo"><a href="index.html"><img src="/front/images/logo.png" alt=""></a>
                            </div>
                            <div class="footer-contacts-widget fl-wrap">
                                <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus.
                                    Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                <ul class="footer-contacts fl-wrap no-list-style">
                                    <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">yourmail@domain.com</a>
                                    </li>
                                    <li><span><i class="fal fa-map-marker"></i> Adress :</span><a href="#"
                                                                                                  target="_blank">USA
                                            27TH Brooklyn NY</a></li>
                                    <li><span><i class="fal fa-phone"></i> Phone :</span><a
                                            href="#">+7(111)123456789</a></li>
                                </ul>
                                <div class="footer-social">
                                    <span>Find  us on: </span>
                                    <ul class="no-list-style">
                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget end-->
                    <!-- footer-widget-->
                    <div class="col-md-4">
                        <div class="footer-widget fl-wrap">
                            <h3>Our Last News</h3>
                            <div class="footer-widget-posts fl-wrap">
                                <ul class="no-list-style">
                                    <li class="clearfix">
                                        <a href="#" class="widget-posts-img"><img src="/front/images/all/4.jpg"
                                                                                  class="respimg" alt=""></a>
                                        <div class="widget-posts-descr">
                                            <a href="#" title="">Vivamus dapibus rutrum</a>
                                            <span class="widget-posts-date"><i class="fal fa-calendar"></i> 21 Mar 09.05 </span>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <a href="#" class="widget-posts-img"><img src="/front/images/all/2.jpg"
                                                                                  class="respimg" alt=""></a>
                                        <div class="widget-posts-descr">
                                            <a href="#" title=""> In hac habitasse platea</a>
                                            <span class="widget-posts-date"><i class="fal fa-calendar"></i> 7 Mar 18.21 </span>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <a href="#" class="widget-posts-img"><img src="/front/images/all/7.jpg"
                                                                                  class="respimg" alt=""></a>
                                        <div class="widget-posts-descr">
                                            <a href="#" title="">Tortor tempor in porta</a>
                                            <span class="widget-posts-date"><i class="fal fa-calendar"></i> 7 Mar 16.42 </span>
                                        </div>
                                    </li>
                                </ul>
                                <a href="blog.html" class="footer-link">Read all <i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget end-->
                    <!-- footer-widget  -->
                    <div class="col-md-4">
                        <div class="footer-widget fl-wrap ">
                            <h3>Our Twitter</h3>
                            <div class="twitter-holder fl-wrap scrollbar-inner2" data-simplebar
                                 data-simplebar-auto-hide="false">
                                <div id="footer-twiit"></div>
                            </div>
                            <a href="#" class="footer-link twitter-link" target="_blank">Follow us <i
                                    class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- footer-widget end-->
                </div>
            </div>
            <!-- footer bg-->
            <div class="footer-bg" data-ran="4"></div>
            <div class="footer-wave">
                <svg viewbox="0 0 100 25">
                    <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"/>
                </svg>
            </div>
            <!-- footer bg  end-->
        </div>
        <!--footer-inner end -->
        <!--sub-footer-->
        <div class="sub-footer  fl-wrap">
            <div class="container">
                <div class="copyright"> &#169; Townhub 2019 . All rights reserved.</div>
                <div class="lang-wrap">
                    <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i
                            class="fa fa-caret-down arrlan"></i></div>
                    <ul class="lang-tooltip lang-action no-list-style">
                        <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                        <li><a href="#" data-lantext="Fr">Franais</a></li>
                        <li><a href="#" data-lantext="Es">Espaol</a></li>
                        <li><a href="#" data-lantext="De">Deutsch</a></li>
                    </ul>
                </div>
                <div class="subfooter-nav">
                    <ul class="no-list-style">
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--sub-footer end -->
    </footer>
    <!--footer end -->
    <!--map-modal -->
    <div class="map-modal-wrap">
        <div class="map-modal-wrap-overlay"></div>
        <div class="map-modal-item">
            <div class="map-modal-container fl-wrap">
                <div class="map-modal fl-wrap">
                    <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                </div>
                <h3><span>Location for : </span><a href="#">Listing Title</a></h3>
                <div class="map-modal-close"><i class="fal fa-times"></i></div>
            </div>
        </div>
    </div>
    <!--map-modal end -->
    <!--register form -->
    <div class="main-register-wrap modal">
        <div class="reg-overlay"></div>
        <div class="main-register-holder tabs-act">
            <div class="main-register fl-wrap  modal_main">
                <div class="main-register_title">Welcome to <span><strong>Town</strong>Hub<strong>.</strong></span>
                </div>
                <div class="close-reg"><i class="fal fa-times"></i></div>
                <ul class="tabs-menu fl-wrap no-list-style">
                    <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                    <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                </ul>
                <!-- Validation Errors -->
            @include('partials.errors')
            <!-- End Validation Errors -->
                <!--tabs -->
                <div class="tabs-container">
                    <div class="tab">
                        <!--tab -->
                        <div id="tab-1" class="tab-content first-tab">
                            <div class="custom-form">
                                <form method="post" name="registerform" action="">
                                    <label>Username or Email Address <span>*</span> </label>
                                    <input name="email" type="text" onClick="this.select()" value="">
                                    <label>Password <span>*</span> </label>
                                    <input name="password" type="password" onClick="this.select()" value="">
                                    <button type="submit" class="btn float-btn color2-bg"> Log In <i
                                            class="fas fa-caret-right"></i></button>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <input id="check-a3" type="checkbox" name="check">
                                        <label for="check-a3">Remember me</label>
                                    </div>
                                </form>
                                <div class="lost_password">
                                    <a href="#">Lost Your Password?</a>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-2" class="tab-content">
                                <div class="custom-form">
                                    <form method="post" action="{{ route('register') }}" name="registerform"
                                          class="main-register-form" id="main-register-form2">
                                        {{ csrf_field() }}
                                        <label>Full Name <span>*</span> </label>
                                        <input name="fullname" type="text" onClick="this.select()" value="">
                                        <label>User Name <span>*</span> </label>
                                        <input name="username" type="text" onClick="this.select()" value="">
                                        <label>Phone <span>*</span> </label>
                                        <input name="phone" type="text" onClick="this.select()">
                                        <label>Email Address <span>*</span></label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password <span>*</span></label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <div class="filter-tags ft-list">
                                            <input id="check-a2" type="checkbox" name="check">
                                            <label for="check-a2">I agree to the <a href="#">Privacy Policy</a></label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button type="submit" class="btn float-btn color2-bg"> Register <i
                                                class="fas fa-caret-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                    <div class="log-separator fl-wrap"><span>or</span></div>
                    <div class="soc-log fl-wrap">
                        <p>For faster login or register use your social account.</p>
                        <a href="#" class="facebook-log"> Facebook</a>
                    </div>
                    <div class="wave-bg">
                        <div class='wave -one'></div>
                        <div class='wave -two'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--register form end -->
    <a class="to-top"><i class="fas fa-caret-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script src="/front/js/jquery.min.js"></script>
<script src="/front/js/plugins.js"></script>
<script src="/front/js/scripts.js"></script>
<script src="/front/js/charts.js"></script>
<script src="/front/js/dashboard.js"></script>
<script src="/front/js/custom.js"></script>
@section('scripts')
@show
</body>
</html>

