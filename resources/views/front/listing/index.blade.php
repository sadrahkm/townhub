@extends('layouts.mainPage')
@section('content')
    <!-- wrapper-->
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!-- Map -->
            <div class="map-container column-map right-pos-map fix-map hid-mob-map">
                <div id="map-main"></div>
                <ul class="mapnavigation no-list-style">
                    <li><a href="#" class="prevmap-nav mapnavbtn"><span><i class="fas fa-caret-left"></i></span></a>
                    </li>
                    <li><a href="#" class="nextmap-nav mapnavbtn"><span><i class="fas fa-caret-right"></i></span></a>
                    </li>
                </ul>
                <div class="scrollContorl mapnavbtn tolt" data-microtip-position="top-left"
                     data-tooltip="Enable Scrolling">
                    <span><i class="fal fa-unlock"></i></span></div>
                <div class="location-btn geoLocation tolt" data-microtip-position="top-left"
                     data-tooltip="Your location">
                    <span><i class="fal fa-location"></i></span></div>
                <div class="map-close"><i class="fas fa-times"></i></div>
            </div>
            <!-- Map end -->
            <div class="col-list-wrap novis_to-top">
                <!-- list-main-wrap-header-->
                <div class="list-main-wrap-header fl-wrap fixed-listing-header">
                    <div class="container">
                        <!-- list-main-wrap-title-->
                        <div class="list-main-wrap-title">
                            <h2>Results For : <span>New York </span></h2>
                        </div>
                        <!-- list-main-wrap-title end-->
                        <!-- list-main-wrap-opt-->
                        <div class="list-main-wrap-opt">
                            <!-- price-opt-->
                            <div class="price-opt">
                                <span class="price-opt-title">Sort   by:</span>
                                <div class="listsearch-input-item">
                                    <select data-placeholder="Popularity" class="chosen-select no-search-select">
                                        <option>Popularity</option>
                                        <option>Average rating</option>
                                        <option>Price: low to high</option>
                                        <option>Price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <!-- price-opt end-->
                            <!-- price-opt-->
                            <div class="grid-opt">
                                <ul class="no-list-style">
                                    <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt"
                                                                   data-microtip-position="bottom"
                                                                   data-tooltip="Grid View"><i
                                                class="fal fa-th"></i></span></li>
                                    <li class="grid-opt_act"><span class="one-col-grid tolt"
                                                                   data-microtip-position="bottom"
                                                                   data-tooltip="List View"><i
                                                class="fal fa-list"></i></span></li>
                                </ul>
                            </div>
                            <!-- price-opt end-->
                        </div>
                        <!-- list-main-wrap-opt end-->
                    </div>
                    <a class="custom-scroll-link back-to-filters clbtg" href="#lisfw"><i class="fal fa-search"></i></a>
                </div>
                <!-- list-main-wrap-header end-->
                <div class="clearfix"></div>
                <div class="container">
                    <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search fl-wrap"><i
                            class="fal fa-filter"></i> Filters
                    </div>
                    <div class="mob-nav-content-btn mncb_half color2-bg schm  fl-wrap"><i
                            class="fal fa-map-marker-alt"></i>
                        View on map
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- listsearch-input-wrap-->
                <div class="listsearch-input-wrap lws_mobile fl-wrap tabs-act" id="lisfw">
                    <div class="listsearch-input-wrap_contrl fl-wrap">
                        <div class="container">
                            <ul class="tabs-menu fl-wrap no-list-style">
                                <li class="current"><a href="#filters-search"> <i class="fal fa-sliders-h"></i> Filters
                                    </a>
                                </li>
                                <li><a href="#category-search"> <i class="fal fa-image"></i>Categories </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="container">
                        <!--tabs -->
                        <div class="tabs-container fl-wrap">
                            <!--tab -->
                            <div class="tab">
                                <div id="filters-search" class="tab-content  first-tab ">
                                    <div class="fl-wrap">
                                        <div class="row">
                                            <!-- listsearch-input-item-->
                                            <div class="col-md-4">
                                                <div class="listsearch-input-item">
                                                    <span class="iconn-dec"><i class="far fa-bookmark"></i></span>
                                                    <input type="text" placeholder="What are you looking for ?"
                                                           value=""/>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->
                                            <!-- listsearch-input-item-->
                                            <div class="col-md-4">
                                                <div class="listsearch-input-item">
                                                    <select data-placeholder="Location"
                                                            class="chosen-select no-search-select">
                                                        <option>All Categories</option>
                                                        <option>Shops</option>
                                                        <option>Hotels</option>
                                                        <option>Restaurants</option>
                                                        <option>Fitness</option>
                                                        <option>Events</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->
                                            <!-- listsearch-input-item-->
                                            <div class="col-md-4">
                                                <div class="listsearch-input-item">
                                                    <select data-placeholder="City/Location"
                                                            class="chosen-select no-search-select">
                                                        <option>All Cities</option>
                                                        <option>New York</option>
                                                        <option>Chicago</option>
                                                        <option>Los Angeles</option>
                                                        <option>Washington</option>
                                                        <option>Boston</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->
                                            <!-- listsearch-input-item-->
                                            <div class="col-md-9">
                                                <div class="listsearch-input-item location autocomplete-container">
                                                    <span class="iconn-dec"><i class="far fa-map-marker"></i></span>
                                                    <input type="text" placeholder="Where to look?"
                                                           class="autocomplete-input" id="autocompleteid3" value=""/>
                                                    <a href="#"><i class="fal fa-location"></i></a>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->
                                            <!-- listsearch-input-item-->
                                            <div class="col-md-3">
                                                <div class="listsearch-input-item">
                                                    <button class="header-search-button color-bg"
                                                            onclick="window.location.href='listing.html'"><i
                                                            class="far fa-search"></i><span>Search</span></button>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->
                                        </div>
                                        <!-- hidden-listing-filter -->
                                        <div class="hidden-listing-filter fl-wrap">
                                            <div class="listsearch-input-wrap-header fl-wrap"><i
                                                    class="fal fa-tasks"></i>More
                                                Filters
                                            </div>
                                            <div class="fl-wrap mar-btoom">
                                                <div class="row">
                                                    <!-- listsearch-input-item-->
                                                    <div class="col-md-3">
                                                        <div class="listsearch-input-item">
                                                            <button class="toggle-filter-btn tsb_act "><i
                                                                    class="fal fa-clock"></i> <span>Open Now</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- listsearch-input-end-->
                                                    <!-- listsearch-input-item-->
                                                    <div class="col-md-3">
                                                        <div class="listsearch-input-item clact date-container">
                                                            <span class="iconn-dec"><i
                                                                    class="fal fa-calendar"></i></span>
                                                            <input type="text" placeholder="Event Date"
                                                                   name="datepicker-here" value=""/>
                                                            <span class="clear-singleinput"><i
                                                                    class="fal fa-times"></i></span>
                                                        </div>
                                                    </div>
                                                    <!-- listsearch-input-end-->
                                                    <!-- listsearch-input-item-->
                                                    <div class="col-md-6">
                                                        <div class="listsearch-input-item">
                                                            <div class="price-rage-wrap fl-wrap">
                                                                <div class="price-rage-wrap-title"><i
                                                                        class="fal fa-hand-holding-usd"></i> Price :
                                                                </div>
                                                                <div class="price-rage-item fl-wrap">
                                                                    <input type="text" class="price-range" data-min="0"
                                                                           data-max="4" name="price-range1"
                                                                           data-step="1"
                                                                           value="$$">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- listsearch-input-end-->
                                                </div>
                                            </div>
                                            <div class="listsearch-input-wrap-header fl-wrap"><i
                                                    class="fal fa-tags"></i>Facilities
                                            </div>
                                            <!-- listsearch-input-item-->
                                            <div class="listsearch-input-item">
                                                <div class=" fl-wrap filter-tags">
                                                    <ul class="no-list-style">
                                                        <li>
                                                            <input id="check-aa" type="checkbox" name="check">
                                                            <label for="check-aa">Elevator in building</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-b" type="checkbox" name="check">
                                                            <label for="check-b">Friendly workspace</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-c" type="checkbox" name="check" checked>
                                                            <label for="check-c">Instant Book</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-d" type="checkbox" name="check">
                                                            <label for="check-d">Wireless Internet</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-d2" type="checkbox" name="check" checked>
                                                            <label for="check-d2">Free WiFi</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-d3" type="checkbox" name="check" checked>
                                                            <label for="check-d3">Free Parking</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-d4" type="checkbox" name="check">
                                                            <label for="check-d4">Smoking Allowed</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->
                                        </div>
                                        <!-- hidden-listing-filter end -->
                                        <div class="more-filter-option-wrap">
                                            <div class="more-filter-option-btn act-hiddenpanel"><i
                                                    class="far fa-plus"></i>
                                                <span>More Options</span></div>
                                            <div class="clear-filter-btn color"><i class="far fa-redo"></i> Reset
                                                Filters
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--tab end-->
                            <!--tab -->
                            <div class="tab">
                                <div id="category-search" class="tab-content">
                                    <!-- category-carousel-wrap -->
                                    <div class="category-carousel-wrap fl-wrap">
                                        <div class="category-carousel fl-wrap full-height">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    @foreach($categories as $category)
                                                    <!-- category-carousel-item -->
                                                    <div class="swiper-slide">
                                                        <a class="category-carousel-item fl-wrap full-height checket-cat"
                                                           href="#">
                                                            <img src="{{ $category->image }}" alt="{{ $category->name }}">
                                                            <div class="category-carousel-item-icon red-bg"><i
                                                                    class="fal fa-cheeseburger"></i></div>
                                                            <div class="category-carousel-item-container">
                                                                <div class="category-carousel-item-title">{{ $category->name }}
                                                                </div>
                                                                <div class="category-carousel-item-counter">{{ $category->events_count }} listings
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!-- category-carousel-item end -->
                                                        @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!-- category-carousel-wrap end-->
                                    </div>
                                    <div class="catcar-scrollbar fl-wrap">
                                        <div class="hs_init"></div>
                                        <div class="cc-contorl">
                                            <div class="cc-contrl-item cc-prev"><i class="fal fa-angle-left"></i></div>
                                            <div class="cc-contrl-item cc-next"><i class="fal fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--tab end-->
                        </div>
                        <!--tabs end-->
                    </div>
                </div>
                <!-- listsearch-input-wrap end-->
                <!-- listing-item-container -->
                <div class="listing-item-container init-grid-items fl-wrap">
                    <div class="container">
                    @foreach($events as $event)
                        <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">

                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            @if($event->hasSaved)
                                                <a data-token="{{ csrf_token() }}" data-id="{{ $event->id }}"
                                                   class="wishlist"
                                                   href="{{ route('front.wishlist.delete') }}">
                                                    <div class="geodir-js-favorite_btn"><i
                                                            class="fal fa-heart-broken"></i><span>Remove</span>
                                                    </div>
                                                </a>
                                            @else
                                                <a data-token="{{ csrf_token() }}" data-id="{{ $event->id }}"
                                                   class="wishlist"
                                                   href="{{ route('front.wishlist.store') }}">
                                                    <div class="geodir-js-favorite_btn"><i
                                                            class="fal fa-heart"></i><span>Save</span>
                                                    </div>
                                                </a>
                                            @endif
                                        @endif
                                        <a href="{{ route('front.event.show',$event->id) }}"
                                           class="geodir-category-img-wrap fl-wrap">
                                            <img src="{{ $event->thumbnail['url']}}" alt="{{ $event->title }}">
                                        </a>
                                        <div class="listing-avatar"><a
                                                href="{{ route('front.profile.index',$event->user->id) }}"><img
                                                    src="{{ $event->user->avatar_name }}"
                                                    alt="{{ $event->user->fullname }}"></a>
                                            <span
                                                class="avatar-tooltip">Added By  <strong>{{ $event->user->fullname }}</strong></span>
                                        </div>
                                        <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open
                                            Now
                                        </div>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <div class="review-score">4.8</div>
                                                <div class="listing-rating card-popup-rainingvis"
                                                     data-starrating2="5"></div>
                                                <br>
                                                <div class="reviews-count">{{ $event->comments_count }} reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a
                                                        href="{{ route('front.event.show',$event->id) }}">{{ $event->title }}</a><span
                                                        class="verified-badge"><i
                                                            class="fal fa-check"></i></span>
                                                </h3>
                                                <div class="geodir-category-location fl-wrap"><a href="#5"
                                                                                                 class="map-item"><i
                                                            class="fas fa-map-marker-alt"></i>{{ $event->address }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">{!! $event->description !!}</p>
                                            @if($event->features()->exists())

                                                <div class="facilities-list fl-wrap">
                                                    <div class="facilities-list-title">Facilities :</div>
                                                    <ul class="no-list-style">
                                                        @foreach($event->features->first()->content as $text => $icon)
                                                            <li class="tolt" data-microtip-position="top"
                                                                data-tooltip="{{ $text }}">
                                                                <i
                                                                    class="fal {{ $icon }}"></i></li>
                                                        @endforeach
                                                </div>
                                            @endif
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <div class="listing-item-category red-bg"><i
                                                        class="fal fa-cheeseburger"></i>
                                                </div>
                                                <span>{{ $event->category->name }}</span>
                                            </a>
                                            <div class="geodir-opt-list">
                                                <ul class="no-list-style">
                                                    <li><a href="#" class="show_gcc"><i
                                                                class="fal fa-envelope"></i><span
                                                                class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                    <li><a href="#1" class="map-item"><i
                                                                class="fal fa-map-marker-alt"></i><span
                                                                class="geodir-opt-tooltip">On the map <strong>1</strong></span>
                                                        </a></li>
                                                    <li>
                                                        <div class="dynamic-gal gdop-list-link"
                                                             data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/24.jpg'}, {'src': 'images/all/12.jpg'}]">
                                                            <i class="fal fa-search-plus"></i><span
                                                                class="geodir-opt-tooltip">Gallery</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price-level geodir-category_price">
                                                <span class="price-level-item" data-pricerating="3"></span>
                                                <span class="price-name-tooltip">Pricey</span>
                                            </div>
                                            <div class="geodir-category_contacts">
                                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-phone"></i> Call : </span><a href="{{ $event->phone }}">{{ $event->phone }}</a>
                                                    </li>
                                                    <li><span><i class="fal fa-envelope"></i> Write : </span><a
                                                            href="{{ $event->email }}">{{ $event->email }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                        @endforeach
                        {{ $events->links() }}
                    </div>
                </div>
                <!-- listing-item-container end -->
                <!--<div class="avatar-img" data-srcav="http://citybook.kwst.net/images/avatar/4.jpg"></div>-->
            </div>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>
    <!-- wrapper end-->
@endsection
@section('scripts')
    @parent
    <script src="/front/js/map-plugins.js"></script>
    <script src="/front/js/map-listing.js"></script>
@endsection
