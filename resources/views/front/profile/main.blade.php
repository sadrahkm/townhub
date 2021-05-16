@extends('layouts.mainPage')
@section('content')
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="gray-bg no-top-padding-sec" id="sec1">
                <div class="container">
                    <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                        <a href="#">Home</a><a href="#">Profiles</a> <span>{{ $user->fullname }}</span>
                    </div>
                    <div class="fl-wrap">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- list-single-main-item -->
                                <div class="user-profile-header fl-wrap">
                                    <div class="user-profile-header_media fl-wrap">
                                        <div class="bg" data-bg="{{ $user->header_background }}"></div>
                                        <div class="user-profile-header_media_title">
                                            <h3>{{ $user->fullname }}</h3>
                                            <h4>{{ !empty($user->company) ? $user->company : '' }}</h4>
                                        </div>
                                        <div class="user-profile-header_stats">
                                            <ul class="no-list-style">
                                                <li><span>{{ $user->events_count }}</span>Places</li>
                                                <li><span>{{ $followers_count }}</span>Followers</li>
                                                <li><span>{{ $followings_count }}</span>Following</li>
                                            </ul>
                                        </div>
                                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() != $user->id)
                                            @if($hasBeenAdded)
                                                <a data-id="{{ $user->id }}" id="unfollowUser"
                                                   href="{{ route('front.profile.doUnfollow') }}">
                                                    <div class="follow-btn color-unfollow-bg">UnFollow <i
                                                            class="fal fa-user-minus" style="color: #fff"></i>
                                                    </div>
                                                </a>
                                            @else
                                                <a data-id="{{ $user->id }}" id="followUser"
                                                   href="{{ route('front.profile.doFollow') }}">
                                                    <div class="follow-btn color2-bg">Follow <i
                                                            class="fal fa-user-plus"></i>
                                                    </div>
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="user-profile-header_content fl-wrap">
                                        <div class="user-profile-header-avatar">
                                            <img src="{{ $user->avatar_name }}" alt="{{ $user->avatar_name }}">
                                        </div>
                                        @if(!empty($user->notes))
                                            {!!   $user->notes !!}
                                        @endif
                                        @if(!empty($user->website))
                                            <a href="{{ $user->website }}" class="btn  float-btn color2-bg">Visit
                                                Website<i
                                                    class="fal fa-chevron-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-main-wrap-header-->
                                <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow">
                                    <!-- list-main-wrap-title-->
                                    <div class="list-main-wrap-title">
                                        <h2>Listings by : <span>{{ $user->name }}</span></h2>
                                    </div>
                                    <!-- list-main-wrap-title end-->
                                    <!-- list-main-wrap-opt-->
                                    <div class="list-main-wrap-opt">
                                        <!-- price-opt-->
                                        <div class="price-opt">
                                            <span class="price-opt-title">Sort   by:</span>
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="Popularity"
                                                        class="chosen-select no-search-select">
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
                                <!-- list-main-wrap-header end-->
                                <!-- listing-item-container -->
                                <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                @foreach($events as $index => $event)
                                    <!-- listing-item  -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <div class="geodir-js-favorite_btn"><i
                                                            class="fal fa-heart"></i><span>Save</span>
                                                    </div>
                                                    <a href="{{ route('front.event.show',$event->id) }}"
                                                       class="geodir-category-img-wrap fl-wrap">
                                                        <img src="{{ $event->thumbnail['url'] }}" alt="">
                                                    </a>
                                                    <div class="listing-avatar"><a href="{{ route('front.profile.index',$user->id) }}"><img
                                                                src="{{ $user->avatar_name }}" alt="{{ $user->fullname }}"></a>
                                                        <span
                                                            class="avatar-tooltip">Added By  <strong>{{ $user->fullname }}</strong></span>
                                                    </div>
                                                    <div class="geodir_status_date gsd_open"><i
                                                            class="fal fa-lock-open"></i>Open Now
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
                                                <div class="geodir-category-content fl-wrap title-sin_item">
                                                    <div class="geodir-category-content-title fl-wrap">
                                                        <div class="geodir-category-content-title-item">
                                                            <h3 class="title-sin_map"><a href="{{ route('front.event.show',$event->id) }}">{{ $event->title }}</a><span class="verified-badge"><i
                                                                        class="fal fa-check"></i></span></h3>
                                                            <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                                        class="fas fa-map-marker-alt"></i> {{ $event->address }}</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="geodir-category-text fl-wrap">
                                                        <p class="small-text">{!! $event->description !!}</p>
                                                        @if($event->features()->exists())
                                                        <div class="facilities-list fl-wrap">
                                                            <div class="facilities-list-title">Facilities :</div>
                                                            <ul class="no-list-style">
                                                                @foreach($event->features->first()->content as $content => $icon)
                                                                <li class="tolt" data-microtip-position="top"
                                                                    data-tooltip="{{ $content }}"><i
                                                                        class="{{ $icon }}"></i></li>
                                                                    @endforeach
                                                            </ul>
                                                        </div>
                                                            @endif
                                                    </div>
                                                    <div class="geodir-category-footer fl-wrap">
                                                        <a class="listing-item-category-wrap">
                                                            <div class="listing-item-category red-bg"><i
                                                                    class="fal fa-cheeseburger"></i></div>
                                                            <span>{{ $event->category->name }}</span>
                                                        </a>
                                                        <div class="geodir-opt-list">
                                                            <ul class="no-list-style">
                                                                <li><a href="#" class="show_gcc"><i
                                                                            class="fal fa-envelope"></i><span
                                                                            class="geodir-opt-tooltip">Contact Info</span></a>
                                                                </li>
                                                                <li><a href="#1" class="single-map-item"
                                                                       data-newlatitude=""
                                                                       data-newlongitude="-73.99726866"><i
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
                                                            <span class="price-level-item" data-pricerating="6"></span>
                                                            <span class="price-name-tooltip">Pricey</span>
                                                        </div>
                                                        <div class="geodir-category_contacts">
                                                            <div class="close_gcc"><i class="fal fa-times-circle"></i>
                                                            </div>
                                                            <ul class="no-list-style">
                                                                <li><span><i class="fal fa-phone"></i> Call : </span><a
                                                                        href="#">{{ $event->phone }}</a></li>
                                                                <li><span><i
                                                                            class="fal fa-envelope"></i> Write : </span><a
                                                                        href="#">{{ $event->email }}</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end -->
                                    @endforeach
                                </div>
                                <!-- listing-item-container end -->
                            </div>
                            <div class="col-md-4">
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget-item-header">
                                        <h3>About Author </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-author fl-wrap">
                                            <div class="box-widget-author-title">
                                                <div class="box-widget-author-title-img">
                                                    <img src="{{ $user->avatar_name }}" alt="{{ $user->fullname }}">
                                                </div>
                                                <div class="box-widget-author-title_content">
                                                    <a href="{{ route('front.profile.index',$user->id) }}">{{ $user->fullname }}</a>
                                                    <span>{{ $user->events_count }} Places Hosted</span>
                                                </div>
                                                <div class="box-widget-author-title_opt">
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
                                        <h3>User Contacts </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-content bwc-nopad">
                                            <div
                                                class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                                <ul class="no-list-style">
                                                    @if(!empty($user->address))
                                                        <li><span><i class="fal fa-map-marker"></i> Address :</span> <a
                                                                href="#">{{ $user->address }}</a></li>
                                                    @endif
                                                    @if(!empty($user->phone))
                                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a
                                                                href="#">{{ $user->phone }}</a>
                                                        </li>
                                                    @endif
                                                    @if(!empty($user->email))
                                                        <li><span><i class="fal fa-envelope"></i> Mail :</span> <a
                                                                href="{{ $user->email }}">{{ $user->email }}</a>
                                                        </li>
                                                    @endif
                                                    @if(!empty($user->website))
                                                        <li><span><i class="fal fa-browser"></i> Website :</span> <a
                                                                href="{{ $user->website }}">{{ $user->website }}</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                                <ul class="no-list-style">
                                                    <li><a href="#" target="_blank"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                                    </li>
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
                                        <h3>Get in Touch </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-content">
                                            <form class="add-comment custom-form">
                                                <fieldset>
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input type="text" placeholder="Your Name *" value=""/>
                                                    <div class="clearfix"></div>
                                                    <label><i class="fal fa-envelope"></i> </label>
                                                    <input type="text" placeholder="Email Address*" value=""/>
                                                    <textarea cols="40" rows="3"
                                                              placeholder="Additional Information:"></textarea>
                                                </fieldset>
                                                <button class="btn float-btn color2-bg">Send Message<i
                                                        class="fal fa-paper-plane"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--content end-->
    </div>
@endsection
