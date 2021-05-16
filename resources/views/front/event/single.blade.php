@extends('layouts.mainPage')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            @if($event->header_media['type'] == 'single')
                <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
                    <div class="bg-parallax-wrap">
                        <div class="bg par-elem " data-bg="{{ $event->header_media['url'] }}"
                             data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                    </div>
                    <div class="container">
                        <div class="list-single-header-item  fl-wrap">
                            <div class="row">
                                <div class="col-md-9">
                                    <h1>{{ $event->title }}<span class="verified-badge"><i
                                                class="fal fa-check"></i></span></h1>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i>{{ $event->address }}</a> <a
                                            href="#"> <i class="fal fa-phone"></i>{{ $event->phone }}</a> <a href="#"><i
                                                class="fal fa-envelope"></i>{{ $event->email }}</a></div>
                                </div>
                                <div class="col-md-3">
                                    <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec5">
                                        <div class="listing-rating-count-wrap single-list-count">
                                            <div class="review-score">4.1</div>
                                            <div class="listing-rating card-popup-rainingvis"
                                                 data-starrating2="4"></div>
                                            <br>
                                            <div class="reviews-count">2 reviews</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="list-single-header_bottom fl-wrap">
                            <a class="listing-item-category-wrap" href="#">
                                <div class="listing-item-category  red-bg"><i class="fal fa-cheeseburger"></i></div>
                                <span>{{ $category->name }}</span>
                            </a>
                            <div class="list-single-author"><a href="author-single.html"><span
                                        class="author_avatar"> <img
                                            alt='{{ $author->fullname }}'
                                            src='{{ $author->avatar_name }}'>  </span>By {{ ucwords($author->fullname) }}
                                </a>
                            </div>
                            <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                            <div class="list-single-stats">
                                <ul class="no-list-style">
                                    <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed - {{ $event->views }} </span>
                                    </li>
                                    <li><span class="bookmark-counter"><i
                                                class="fas fa-heart"></i> Bookmark - {{ $wishlist_count }} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            @elseif($event->header_media['type'] == 'carousel')
                <div class="listing-carousel-wrap fl-wrap" id="sec1">
                    <div class="listing-carousel fl-wrap full-height lightgallery">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                            @foreach($event->header_media['url'] as $url)
                                <!-- swiper-slide-->
                                    <div class="swiper-slide hov_zoom">
                                        <img src="{{ $url }}" alt="">
                                        <a href="{{ $url }}" class="box-media-zoom popup-image"><i
                                                class="fal fa-search"></i></a>
                                    </div>
                                    <!-- swiper-slide end-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="listing-carousel_pagination">
                        <div class="listing-carousel_pagination-wrap"></div>
                    </div>
                    <div class="listing-carousel-button listing-carousel-button-next"><i class="fas fa-caret-right"></i>
                    </div>
                    <div class="listing-carousel-button listing-carousel-button-prev"><i class="fas fa-caret-left"></i>
                    </div>
                </div>
        @endif

        <!-- scroll-nav-wrapper-->
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul class="no-list-style">
                            <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Top</a></li>
                            <li><a href="#sec2"><i class="fal fa-info"></i>Details</a></li>
                            <li><a href="#sec3"><i class="fal fa-image"></i>Gallery</a></li>
                            <li><a href="#sec4"><i class="fal fa-utensils"></i>Menu</a></li>
                            <li><a href="#sec5"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                        </ul>
                    </nav>
                    <div class="scroll-nav-wrapper-opt">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if($isSavedEvent)
                                <a data-id="{{ $event->id }}" href="{{ route('front.wishlist.delete') }}"
                                   class="scroll-nav-wrapper-opt-btn wishlist"> <i
                                        class="fas fa-heart-broken"></i> Remove From Wishlist </a>
                            @else
                                <a data-id="{{ $event->id }}" href="{{ route('front.wishlist.store') }}"
                                   class="scroll-nav-wrapper-opt-btn wishlist"> <i
                                        class="fas fa-heart"></i> Save </a>
                            @endif
                        @endif
                        <a href="#" class="scroll-nav-wrapper-opt-btn showshare"> <i class="fas fa-share"></i> Share
                        </a>
                        <div class="share-holder hid-share">
                            <div class="share-container  isShare"></div>
                        </div>
                        <div class="show-more-snopt"><i class="fal fa-ellipsis-h"></i></div>
                        <div class="show-more-snopt-tooltip">
                            <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                            <a href="#"> <i class="fas fa-flag-alt"></i> Report </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- scroll-nav-wrapper end-->
            <section class="gray-bg no-top-padding">
                <div class="container">
                    <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                        <a href="#">Home</a><a href="#">Listings</a><a href="#">New York</a><span>Listing Single</span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- list-single-main-wrapper-col -->
                        <div class="col-md-8">
                            <!-- list-single-main-wrapper -->
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                @if($event->thumbnail['status'])
                                    <div class="list-single-main-media fl-wrap">
                                        <img src="{{ $event->thumbnail['url'] }}" class="respimg"
                                             alt="{{ $event->name }}">
                                        <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i
                                                class="fal fa-video"></i><span>Promo Video</span></a>
                                    </div>
                                @endif
                            <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Description</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        {!! $event->description !!}
                                        @if(!empty($event->website))
                                            <a href="{{ $event->website }}" class="btn color2-bg    float-btn">Visit
                                                Website<i
                                                    class="fal fa-chevron-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                @if(key_exists('facility',$features))
                                <!-- list-single-main-item -->
                                    <div class="list-single-main-item fl-wrap block_box">
                                        <div class="list-single-main-item-title">
                                            <h3>Listing Features</h3>
                                        </div>
                                        <div class="list-single-main-item_content fl-wrap">
                                            <div class="listing-features fl-wrap">
                                                <ul class="no-list-style">
                                                    @foreach($features['facility'] as $content => $icon)
                                                        <li><a href="#"><i class="fa {{ $icon }}"></i>{{ $content }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- list-single-main-item end -->
                                @endif
                                @if(key_exists('accordion',$features))
                                <!-- accordion-->
                                    <div class="accordion mar-top" id="sec3">
                                        @foreach($features['accordion'] as $item)
                                            <a class="toggle" href="#">{{ $item['title'] }}<span></span></a>
                                            <div class="accordion-inner">
                                                {!! $item['content'] !!}
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- accordion end -->
                                @endif
                            <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec3">
                                    <div class="list-single-main-item-title">
                                        <h3>Gallery / Photos</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="single-carousel-wrap fl-wrap lightgallery">
                                            <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i>
                                            </div>
                                            <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i>
                                            </div>
                                            <div class="single-carousel fl-wrap full-height">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                        <!-- swiper-slide-->
                                                        <div class="swiper-slide">
                                                            <div class="box-item">
                                                                <img src="images/all/12.jpg" alt="">
                                                                <a href="images/all/12.jpg"
                                                                   class="gal-link popup-image"><i
                                                                        class="fa fa-search"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- swiper-slide end-->
                                                        <!-- swiper-slide-->
                                                        <div class="swiper-slide">
                                                            <div class="box-item">
                                                                <img src="images/all/24.jpg" alt="">
                                                                <a href="images/all/24.jpg"
                                                                   class="gal-link popup-image"><i
                                                                        class="fa fa-search"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- swiper-slide end-->
                                                        <!-- swiper-slide-->
                                                        <div class="swiper-slide">
                                                            <div class="box-item">
                                                                <img src="images/all/21.jpg" alt="">
                                                                <a href="images/all/21.jpg"
                                                                   class="gal-link popup-image"><i
                                                                        class="fa fa-search"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- swiper-slide end-->
                                                        <!-- swiper-slide-->
                                                        <div class="swiper-slide">
                                                            <div class="box-item">
                                                                <img src="images/all/47.jpg" alt="">
                                                                <a href="images/all/47.jpg"
                                                                   class="gal-link popup-image"><i
                                                                        class="fa fa-search"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- swiper-slide end-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-facts -->
                                <div class="list-single-facts fl-wrap">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap gradient-bg ">
                                                <div class="inline-facts">
                                                    <i class="fal fa-smile-plus"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="245">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>New Visiters Every Week</h6>
                                                </div>
                                                <div class="stat-wave">
                                                    <svg viewbox="0 0 100 25">
                                                        <path fill="#fff" d="M0 30 V12 Q30 17 55 2 T100 11 V30z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap gradient-bg ">
                                                <div class="inline-facts">
                                                    <i class="fal fa-users"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="2557">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Happy customers every year</h6>
                                                </div>
                                                <div class="stat-wave">
                                                    <svg viewbox="0 0 100 25">
                                                        <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap gradient-bg ">
                                                <div class="inline-facts">
                                                    <i class="fal fa-award"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="25">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Won Awards</h6>
                                                </div>
                                                <div class="stat-wave">
                                                    <svg viewbox="0 0 100 25">
                                                        <path fill="#fff" d="M0 30 V12 Q30 12 55 5 T100 11 V30z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-facts end -->
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec4">
                                    <div class="list-single-main-item-title">
                                        <h3>Restaurant Menu</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="menu-filters">
                                            <a href="#" class="gallery-filter  menu-filters-active"
                                               data-filter="*">All</a>
                                            <a href="#" class="gallery-filter" data-filter=".main">Main</a>
                                            <a href="#" class="gallery-filter" data-filter=".dessert">Dessert</a>
                                            <a href="#" class="gallery-filter" data-filter=".lunch">Lunch</a>
                                        </div>
                                        <div class="restor-menu-widget fl-wrap">
                                            <!--restmenu-item-->
                                            <div class="restmenu-item main">
                                                <a href="images/all/menu/1.jpg" class="restmenu-item-img image-popup">
                                                    <img src="images/all/menu/1.jpg" alt="">
                                                </a>
                                                <div class="restmenu-item-det">
                                                    <div class="restmenu-item-det-header fl-wrap">
                                                        <h4>Calabrian Black Sausage</h4>
                                                        <div class="restmenu-item-det-price">$28.00</div>
                                                    </div>
                                                    <p>Netus et malesuada fames ac turpis egestas.</p>
                                                </div>
                                            </div>
                                            <!--restmenu-item end-->
                                            <!--restmenu-item-->
                                            <div class="restmenu-item dessert">
                                                <a href="images/all/menu/2.jpg" class="restmenu-item-img image-popup">
                                                    <img src="images/all/menu/2.jpg" alt="">
                                                </a>
                                                <div class="restmenu-item-det">
                                                    <div class="restmenu-item-det-header fl-wrap">
                                                        <h4>Grilled Filet of Cod</h4>
                                                        <div class="restmenu-item-det-price">$38.10</div>
                                                    </div>
                                                    <p>Aliquam at vestibulum urna, vitae tincidunt</p>
                                                </div>
                                            </div>
                                            <!--restmenu-item end-->
                                            <!--restmenu-item-->
                                            <div class="restmenu-item main">
                                                <a href="images/all/menu/3.jpg" class="restmenu-item-img image-popup">
                                                    <img src="images/all/menu/3.jpg" alt="">
                                                </a>
                                                <div class="restmenu-item-det">
                                                    <div class="restmenu-item-det-header fl-wrap">
                                                        <h4>Saute Filet of Seabass</h4>
                                                        <div class="restmenu-item-det-price">$12.70</div>
                                                    </div>
                                                    <p>Fusce vitae dui iaculis leo porta ultrices.</p>
                                                </div>
                                            </div>
                                            <!--restmenu-item end-->
                                            <!--restmenu-item-->
                                            <div class="restmenu-item main lunch">
                                                <a href="images/all/menu/4.jpg" class="restmenu-item-img image-popup">
                                                    <img src="images/all/menu/4.jpg" alt="">
                                                </a>
                                                <div class="restmenu-item-det">
                                                    <div class="restmenu-item-det-header fl-wrap">
                                                        <h4>Saute Crispy Goats</h4>
                                                        <div class="restmenu-item-det-price">$8.00</div>
                                                    </div>
                                                    <p>Etiam fermentum justo nec auctor pretium.</p>
                                                </div>
                                            </div>
                                            <!--restmenu-item end-->
                                            <!--restmenu-item-->
                                            <div class="restmenu-item lunch">
                                                <a href="images/all/menu/5.jpg" class="restmenu-item-img image-popup">
                                                    <img src="images/all/menu/5.jpg" alt="">
                                                </a>
                                                <div class="restmenu-item-det">
                                                    <div class="restmenu-item-det-header fl-wrap">
                                                        <h4>La Fromagerie</h4>
                                                        <div class="restmenu-item-det-price">$18.20</div>
                                                    </div>
                                                    <p>Pellentesque placerat turpis turpis eget.</p>
                                                </div>
                                            </div>
                                            <!--restmenu-item end-->
                                            <!--restmenu-item-->
                                            <div class="restmenu-item dessert">
                                                <a href="images/all/menu/6.jpg" class="restmenu-item-img image-popup">
                                                    <img src="images/all/menu/6.jpg" alt="">
                                                </a>
                                                <div class="restmenu-item-det">
                                                    <div class="restmenu-item-det-header fl-wrap">
                                                        <h4>Warm Chocolate Pudding</h4>
                                                        <div class="restmenu-item-det-price">$9.30</div>
                                                    </div>
                                                    <p>Pellentesque habitant morbi tristique.</p>
                                                </div>
                                            </div>
                                            <!--restmenu-item end-->
                                        </div>
                                        <a href="#" class="btn color2-bg   float-btn">Download PDF<i
                                                class="fal fa-file-pdf"></i></a>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box" id="sec5">
                                    <div class="list-single-main-item-title">
                                        <h3>Item Reviews - <span> </span></h3>
                                    </div>
                                    <!--reviews-score-wrap-->
                                    <div class="reviews-score-wrap fl-wrap">
                                        <div class="review-score-total">
                                                    <span class="review-score-total-item">
                                                    4.1
                                                    </span>
                                            <div class="listing-rating card-popup-rainingvis"
                                                 data-starrating2="5"></div>
                                        </div>
                                        <div class="review-score-detail">
                                            <!-- review-score-detail-list-->
                                            <div class="review-score-detail-list">
                                                <!-- rate item-->
                                                <div class="rate-item">
                                                    <div class="rate-item-title"><span>Quality</span></div>
                                                    <div class="rate-item-bg" data-percent="100%">
                                                        <div class="rate-item-line gradient-bg"></div>
                                                    </div>
                                                    <div class="rate-item-percent">5.0</div>
                                                </div>
                                                <!-- rate item end-->
                                                <!-- rate item-->
                                                <div class="rate-item">
                                                    <div class="rate-item-title"><span>Location</span></div>
                                                    <div class="rate-item-bg" data-percent="90%">
                                                        <div class="rate-item-line gradient-bg"></div>
                                                    </div>
                                                    <div class="rate-item-percent">4.0</div>
                                                </div>
                                                <!-- rate item end-->
                                                <!-- rate item-->
                                                <div class="rate-item">
                                                    <div class="rate-item-title"><span>Price</span></div>
                                                    <div class="rate-item-bg" data-percent="60%">
                                                        <div class="rate-item-line gradient-bg"></div>
                                                    </div>
                                                    <div class="rate-item-percent">3.0</div>
                                                </div>
                                                <!-- rate item end-->
                                                <!-- rate item-->
                                                <div class="rate-item">
                                                    <div class="rate-item-title"><span>Service</span></div>
                                                    <div class="rate-item-bg" data-percent="80%">
                                                        <div class="rate-item-line gradient-bg"></div>
                                                    </div>
                                                    <div class="rate-item-percent">4.0</div>
                                                </div>
                                                <!-- rate item end-->
                                            </div>
                                            <!-- review-score-detail-list end-->
                                        </div>
                                    </div>
                                    <!-- reviews-score-wrap end -->
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                        @foreach($comments as $comment)
                                            <!-- reviews-comments-item -->
                                                <!-- reviews-comments-item -->
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="{{ $comment->user->avatar_name }}"
                                                             alt="{{ $comment->user->fullname }}">

                                                    </div>
                                                    <div class="reviews-comments-item-text fl-wrap">
                                                        <div class="reviews-comments-header fl-wrap">
                                                            <h4>
                                                                <a href="{{ route('front.profile.index',$comment->user->id) }}">{{ $comment->user->fullname }}</a>
                                                                <h5 class="username">{{ '@' . $comment->user->username }}</h5>

                                                            </h4>
                                                            <div class="review-score-user">
                                                                <span
                                                                    class="review-score-user_item">{{ $comment->point['average'] }}</span>
                                                                <div class="listing-rating card-popup-rainingvis"
                                                                     data-starrating2="4"></div>
                                                            </div>
                                                        </div>
                                                        <p>{!! nl2br($comment->description) !!}</p>
                                                        @if(!empty($comment->gallery))
                                                            <div class="review-images ">
                                                                @foreach($comment->gallery as $image)
                                                                    <a href="{{ $image }}" class="image-popup"><img
                                                                            src="{{ $image }}" alt=""></a>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        <div class="reviews-comments-item-footer fl-wrap">
                                                            <div class="reviews-comments-item-date"><span><i
                                                                        class="far fa-calendar-check"></i>{{ $comment->created_at }}</span>
                                                            </div>
                                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                                @if(\Illuminate\Support\Facades\DB::table('rates')->where('user_id', \Illuminate\Support\Facades\Auth::id())->where('comment_id',$comment->id)->exists())
                                                                    <a href="{{ route('front.event.comment.rate') }}"
                                                                       data-id="{{ $comment->id }}" class="rate-review"><i
                                                                            class="fal fa-thumbs-down color-red"></i> Remove Like
                                                                        <span>{{ $comment->likes }}</span> </a>
                                                                @else
                                                                    <a href="{{ route('front.event.comment.rate') }}"
                                                                       data-id="{{ $comment->id }}" class="rate-review"><i
                                                                            class="fal fa-thumbs-up"></i> Helpful Review
                                                                        <span>{{ $comment->likes }}</span> </a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--reviews-comments-item end-->
                                                <!--reviews-comments-item end-->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                        <div class="list-single-main-item-title fl-wrap">
                                            <h3>Add Review</h3>
                                        </div>
                                        <!-- Add Review Box -->
                                        <div id="add-review" class="add-review-box">
                                            <!-- Review Comment -->
                                            <form action="{{ route('front.event.comment.store',$event->id) }}"
                                                  id="add-comment" class="add-comment  custom-form" method="post"
                                                  name="rangeCalc"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <fieldset>
                                                    <div class="review-score-form fl-wrap">
                                                        <div class="review-range-container">
                                                            <!-- review-range-item-->
                                                            <div class="review-range-item">
                                                                <div class="range-slider-title">Cleanliness</div>
                                                                <div class="range-slider-wrap ">
                                                                    <input type="text" class="rate-range" data-min="0"
                                                                           data-max="5" name="clean" data-step="1"
                                                                           value="0">
                                                                </div>
                                                            </div>
                                                            <!-- review-range-item end -->
                                                            <!-- review-range-item-->
                                                            <div class="review-range-item">
                                                                <div class="range-slider-title">Comfort</div>
                                                                <div class="range-slider-wrap ">
                                                                    <input type="text" class="rate-range" data-min="0"
                                                                           data-max="5" name="comfort" data-step="1"
                                                                           value="0">
                                                                </div>
                                                            </div>
                                                            <!-- review-range-item end -->
                                                            <!-- review-range-item-->
                                                            <div class="review-range-item">
                                                                <div class="range-slider-title">Staff</div>
                                                                <div class="range-slider-wrap ">
                                                                    <input type="text" class="rate-range" data-min="0"
                                                                           data-max="5" name="staff" data-step="1"
                                                                           value="0">
                                                                </div>
                                                            </div>
                                                            <!-- review-range-item end -->
                                                            <!-- review-range-item-->
                                                            <div class="review-range-item">
                                                                <div class="range-slider-title">Facilities</div>
                                                                <div class="range-slider-wrap">
                                                                    <input type="text" class="rate-range" data-min="0"
                                                                           data-max="5" name="facility" data-step="1"
                                                                           value="0">
                                                                </div>
                                                            </div>
                                                            <!-- review-range-item end -->
                                                        </div>
                                                        <div class="review-total">
                                                        <span><input type="text" name="rg_total"
                                                                     value="0" disabled></span>
                                                            <strong>Your Score</strong>
                                                        </div>
                                                    </div>
                                                    <div class="list-single-main-item_content fl-wrap">
                                                        @include('partials.errors')
                                                        <textarea cols="40" id="comment_review" name="description"
                                                                  rows="3"
                                                                  placeholder="Your Review:"></textarea>
                                                        <div class="clearfix"></div>
                                                        <div class="photoUpload">
                                                        <span><i
                                                                class="fal fa-image"></i> <strong>Add Photos</strong></span>
                                                            <input type="file" class="upload" name="pictures[]"
                                                                   multiple>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <button class="btn  color2-bg  float-btn">Submit Review <i
                                                                class="fal fa-paper-plane"></i></button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <!-- Add Review Box / End -->
                                    </div>
                                    <!-- list-single-main-item end -->
                                @endif
                            </div>
                        </div>
                        <!-- list-single-main-wrapper-col end -->
                        <!-- list-single-sidebar -->
                        <div class="col-md-4">
                        @if(key_exists('workingHours',$features))
                            <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget-item-header">
                                        <h3>Working Hours</h3>
                                    </div>
                                    <div class="box-widget opening-hours fl-wrap">
                                        <div class="box-widget-content">
                                            <ul class="no-list-style">
                                                @foreach($features['workingHours'] as $item)
                                                    <li class="sun"><span
                                                            class="opening-hours-day">{{ ucwords($item['day']) }} </span><span
                                                            class="opening-hours-time">{{ strtoupper($item['hour']) }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                        @endif
                        <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Book a Table</h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        @include('partials.errors')
                                        <form class="add-comment custom-form"
                                              action="{{ route('front.booking.store_id') }}" method="post">
                                            @csrf
                                            <fieldset>
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <div class="quantity fl-wrap">
                                                    <span><i class="fal fa-user-plus"></i>Persons : </span>
                                                    <div class="quantity-item">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" name="quantity" title="Qty"
                                                               class="qty color-bg" data-min="1" data-max="3"
                                                               data-step="1" value="1">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </div>
                                                @if(key_exists('booking',$features))
                                                    @if(key_exists('date',$features['booking']))
                                                        <div class="listsearch-input-item clact date-container2">
                                                            <label><i class="fal fa-calendar"></i></label>
                                                            <input name="date-time" type="text"
                                                                   placeholder="Date / Time"
                                                                   id="datepicker-here-time" value=""/>
                                                            <span class="clear-singleinput"><i class="fal fa-times"></i></span>
                                                        </div>
                                                    @endif
                                                    @if(key_exists('options',$features['booking']))
                                                        <div class="listsearch-input-item clact date-container">
                                                            <select name="option" data-placeholder="booking_options"
                                                                    class="chosen-select no-search-select">
                                                                @foreach($features['booking']['options'] as $option)
                                                                    <option>{{ $option }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                @endif
                                            </fieldset>
                                            <button type="submit" class="btn color2-bg float-btn">Book Table Now <i
                                                    class="fal fa-bookmark"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Location / Contacts </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <div id="singleMap" data-latitude="40.7427837"
                                             data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
                                    </div>
                                    <div class="box-widget-content bwc-nopad">
                                        <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                            <ul class="no-list-style">
                                                <li><span><i class="fal fa-map-marker"></i> Address :</span> <a
                                                        href="#">{{ $event->address }}</a></li>
                                                <li><span><i class="fal fa-phone"></i> Phone :</span> <a
                                                        href="#">{{ $event->phone }}</a>
                                                </li>
                                                <li><span><i class="fal fa-envelope"></i> Mail :</span> <a
                                                        href="{{ $event->email }}<">{{ $event->email }}</a>
                                                </li>
                                                @if(!empty($event->website))
                                                    <li><span><i class="fal fa-browser"></i> Website :</span> <a
                                                            href="{{ $event->website }}">{{ $event->website }}</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                            <ul class="no-list-style">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                            <div class="bottom-bcw-box_link"><a href="#"
                                                                                class="show-single-contactform tolt"
                                                                                data-microtip-position="top"
                                                                                data-tooltip="Write Message"><i
                                                        class="fal fa-envelope"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3> Price Range </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <div class="claim-price-wdget fl-wrap">
                                            <div class="claim-price-wdget-content fl-wrap">
                                                <div class="pricerange fl-wrap"><span>Price : </span>{{ $event->price }}
                                                </div>
                                                <div class="claim-widget-link fl-wrap"><span>Own or work here?</span><a
                                                        href="#">Claim Now!</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3> Instagram </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <div class='jr-insta-thumb' id="insta-content"
                                             data-instatoken="3075034521.5d9aa6a.284ff8339f694dbfac8f265bf3e93c8a"></div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Hosted by : </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-author fl-wrap">
                                        <div class="box-widget-author-title">
                                            <div class="box-widget-author-title-img">
                                                <img src="{{ $author->avatar_name }}" alt="{{ $author->fullname }}">
                                            </div>
                                            <div class="box-widget-author-title_content">
                                                <a href="{{ route('front.profile.index',$author->id) }}">{{ ucwords($author->fullname) }}</a>
                                                <h5 class="username">{{ '@' . $author->username }}</h5>
                                                <span>4 Places Hosted</span>
                                            </div>
                                            <div class="box-widget-author-title_opt">
                                                <a href="{{ route('front.profile.index',$author->id) }}"
                                                   class="tolt green-bg"
                                                   data-microtip-position="top" data-tooltip="View Profile"><i
                                                        class="fas fa-user"></i></a>
                                                <a href="#" class="tolt color-bg cwb" data-microtip-position="top"
                                                   data-tooltip="Chat With Owner"><i
                                                        class="fas fa-comments-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Similar listings :</h3>
                                </div>
                                <div class="box-widget  fl-wrap">
                                    <div class="box-widget-content">
                                        <!--widget-posts-->
                                        <div class="widget-posts  fl-wrap">
                                            <ul class="no-list-style">
                                                <li>
                                                    <div class="widget-posts-img"><a href="listing-single.html"><img
                                                                src="images/gallery/thumbnail/1.png" alt=""></a>
                                                    </div>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">Iconic Cafe</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                                    class="fas fa-map-marker-alt"></i> 40 Journal Square
                                                                Plaza, NJ, USA</a></div>
                                                        <div class="widget-posts-descr-link"><a href="listing.html">Restaurants </a>
                                                            <a href="listing.html">Cafe</a></div>
                                                        <div class="widget-posts-descr-score">4.1</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="widget-posts-img"><a href="listing-single.html"><img
                                                                src="images/gallery/thumbnail/2.png" alt=""></a>
                                                    </div>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">MontePlaza Hotel</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                                    class="fas fa-map-marker-alt"></i> 70 Bright St New
                                                                York, USA </a></div>
                                                        <div class="widget-posts-descr-link"><a href="listing.html">Hotels </a>
                                                        </div>
                                                        <div class="widget-posts-descr-score">5.0</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="widget-posts-img"><a href="listing-single.html"><img
                                                                src="images/gallery/thumbnail/3.png" alt=""></a>
                                                    </div>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">Rocko Band in Marquee Club</a>
                                                        </h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                                    class="fas fa-map-marker-alt"></i>75 Prince St, NY,
                                                                USA</a></div>
                                                        <div class="widget-posts-descr-link"><a href="listing.html">Events</a>
                                                        </div>
                                                        <div class="widget-posts-descr-score">4.2</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="widget-posts-img"><a href="listing-single.html"><img
                                                                src="images/gallery/thumbnail/4.png" alt=""></a>
                                                    </div>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">Premium Fitness Gym</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                                    class="fas fa-map-marker-alt"></i> W 85th St, New
                                                                York, USA</a></div>
                                                        <div class="widget-posts-descr-link"><a href="listing.html">Fitness</a>
                                                            <a href="listing.html">Gym</a></div>
                                                        <div class="widget-posts-descr-score">5.0</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- widget-posts end-->
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Tags</h3>
                                </div>
                                <div class="box-widget opening-hours fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="list-single-tags tags-stylwrap">
                                            <a href="#">Hotel</a>
                                            <a href="#">Hostel</a>
                                            <a href="#">Room</a>
                                            <a href="#">Spa</a>
                                            <a href="#">Restourant</a>
                                            <a href="#">Parking</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                        </div>
                        <!-- list-single-sidebar end -->
                    </div>
                </div>
            </section>
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--content end-->
    </div>
@endsection
