@extends('layouts.dashboard')
@section('navBar')
    @parent
    <a href="#">Dashboard</a><span>Add New List</span>
@endsection
@section('content')
    <!--  dashboard-menu-->
    <x-dashboard.sidebar tab="dashboard"/>
    <!-- dashboard-menu  end-->
    <!-- dashboard content-->
    <div class="col-md-9">
        <form action="{{ route('front.dashboard.listing.store') }}" method="post" enctype="multipart/form-data">
            @include('partials.errors')
            @csrf
            <div class="dashboard-title   fl-wrap">
                <h3>Add Listing</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <label>Listing Title <i class="fal fa-briefcase"></i></label>
                    <input type="text" name="title" placeholder="Name of your business" value=""/>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Type / Category</label>
                            <div class="listsearch-input-item">
                                <select name="categories" data-placeholder="Apartments"
                                        class="chosen-select no-search-select">
                                    <option>All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Keywords <i class="fal fa-key"></i></label>
                            <input name="tags" type="text" placeholder="Maximum 15 , should be separated by commas"
                                   value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Location / Contacts</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Longitude (Drag marker on the map)<i class="fal fa-long-arrow-alt-right"></i>
                            </label>
                            <input type="text" name="x-map" placeholder="Map Longitude" id="long" value=""/>
                        </div>
                        <div class="col-md-6">
                            <label>Latitude (Drag marker on the map) <i class="fal fa-long-arrow-alt-down"></i> </label>
                            <input name="y-map" type="text" placeholder="Map Latitude" id="lat" value=""/>
                        </div>
                    </div>
                    <div class="map-container">
                        <div id="singleMap" class="drag-map" data-latitude="40.7427837"
                             data-longitude="-73.11445617675781"></div>
                    </div>
                    <label>City / Location</label>
                    <div class="listsearch-input-item">
                        <select data-placeholder="City" name="city" class="chosen-select no-search-select">
                            <option>All Cities</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Address<i class="fal fa-map-marker"></i></label>
                            <input type="text" name="address" placeholder="Address of your business" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <label>Email Address<i class="far fa-envelope"></i> </label>
                            <input type="text" name="email" placeholder="JessieManrty@domain.com" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <label>Phone<i class="far fa-phone"></i> </label>
                            <input type="text" name="phone" placeholder="+7(123)987654" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <label> Website <i class="far fa-globe"></i> </label>
                            <input type="text" name="website" placeholder="themeforest.net" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Header Media</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <!--col -->
                        <div class="col-md-4">
                            <div class="add-list-media-header" style="margin-bottom:20px">
                                <label class="radio inline">
                                    <input type="radio" name="header_media" value="image" checked>
                                    <span>Background image</span>
                                </label>
                            </div>
                            <div class="add-list-media-wrap">
                                <div class="add-list-media-wrap">
                                    <div class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="fal fa-image"></i> Click here or drop files to upload</span>
                                        </div>
                                        <input name="headerOneImage" type="file" class="upload"
                                               id="header_image_background_input">
                                        <img class="uploadImagesOnline" id="header_image_background_image" alt>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--col end-->
                        <!--col -->
                        <div class="col-md-4">
                            <div class="add-list-media-header" style="margin-bottom:20px">
                                <label class="radio inline">
                                    <input type="radio" name="header_media" value="carousel">
                                    <span>Carousel</span>
                                </label>
                            </div>
                            <div class="add-list-media-wrap">
                                <div class="fuzone">
                                    <div class="fu-text">
                                        <span><i class="fal fa-image"></i> Click here or drop files to upload</span>
                                    </div>
                                    <input name="carouselImages[]" type="file" class="upload"
                                           id="header_image_carousel_input"
                                           multiple>
                                </div>
                            </div>
                        </div>
                        <!--col end-->
                        <!--col -->
                        <div class="col-md-4">
                            <div class="add-list-media-header" style="margin-bottom:20px">
                                <label class="radio inline">
                                    <input type="radio" name="header_media" value="url">
                                    <span>Video</span>
                                </label>
                            </div>
                            <div class="add-list-media-wrap">
                                <label>Youtube <i class="fab fa-youtube"></i></label>
                                <input type="text" name="headerImageUrl" placeholder="https://www.youtube.com/"
                                       value=""/>
                                <label>Vimeo <i class="fab fa-vimeo-v"></i></label>
                                <input type="text" name="headerImageUrl" placeholder="https://vimeo.com/" value=""/>
                            </div>
                        </div>
                        <!--col end-->
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Main Thumbnail</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <!--col -->
                        <div class="col-md-12">
                            <div class="act-widget fl-wrap">
                                <div class="add-list-media-wrap">
                                    <label for="thumbnail_image">Upload Thumbnail</label>
                                    <div class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="fal fa-image"></i> Click here or drop files to upload</span>
                                        </div>
                                        <input type="file" name="thumbnail_image" class="upload"
                                               id="thumbnail_image_input">
                                        <img class="uploadImagesOnline" id="thumbnail_image_img" alt="">
                                    </div>
                                </div>
                                <div class="act-widget-header">
                                    <h4>Show Thumbnail in Single Page of Event</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="show_thumbnail_single_page"
                                               class="onoffswitch-checkbox"
                                               id="showThumbnailSinglePage" checked>
                                        <label class="onoffswitch-label" for="showThumbnailSinglePage">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--col end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Details</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">

                <div class="custom-form">
                    <label>Text</label>
                    <textarea cols="40" rows="3" name="description" placeholder="Datails"></textarea>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Facilities</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <!-- Checkboxes -->
                    <ul class="fl-wrap filter-tags no-list-style ds-tg">
                    </ul>
                    <!-- Checkboxes end -->
                    <div class="custom-form">
                        <div class="col-sm-5">
                            <label for="facilities_icon"><i class="fa fa-icons"></i>Icon</label>
                            <input type="text" id="facilities_icon"
                                   placeholder="FontAwesome Icon ( Example: fa-clock )">
                        </div>
                        <div class="col-sm-4">
                            <label for="facilities_text"><i class="fa fa-text"></i>Content</label>
                            <input type="text" id="facilities_text" placeholder="Content">
                        </div>
                        <button id="addFacilitiesBtn" style="margin-top: 25px;" class="btn color-bg float-btn">Add <i
                                class="fa fa-plus color-white"></i></button>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Content Widgets</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- act-widget-->
                            <div class="act-widget fl-wrap">
                                <div class="act-widget-header">
                                    <h4>1. Promo video</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="promovideo" class="onoffswitch-checkbox"
                                               id="myonoffswitch5">
                                        <label class="onoffswitch-label" for="myonoffswitch5">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="add-list-media-wrap">
                                    <label>Video url : <i class="fab fa-youtube"></i></label>
                                    <input type="text" placeholder="https://www.youtube.com/" value=""/>
                                </div>
                            </div>
                            <!-- act-widget end-->
                        </div>
                        <div class="col-md-4">
                            <!-- act-widget-->
                            <div class="act-widget fl-wrap">
                                <div class="act-widget-header">
                                    <h4>2. Gallery Thumbnails</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                               id="myonoffswitch6">
                                        <label class="onoffswitch-label" for="myonoffswitch6">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="add-list-media-wrap">
                                    <div class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="fal fa-image"></i> Click here or drop files to upload</span>
                                        </div>
                                        <input type="file" class="upload">
                                    </div>
                                </div>
                            </div>
                            <!-- act-widget end-->
                        </div>
                        <div class="col-md-4">
                            <!-- act-widget-->
                            <div class="act-widget fl-wrap">
                                <div class="act-widget-header">
                                    <h4>3. Slider</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                               id="myonoffswitch7">
                                        <label class="onoffswitch-label" for="myonoffswitch7">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="add-list-media-wrap">
                                    <div class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="fal fa-image"></i> Click here or drop files to upload</span>
                                        </div>
                                        <input type="file" class="upload">
                                    </div>
                                </div>
                            </div>
                            <!-- act-widget end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Accordion Menu</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- act-widget-->
                            <div class="act-widget fl-wrap">
                                <div class="act-widget-header">
                                    <h4>Accordion Menu</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="accordion_menu" class="onoffswitch-checkbox"
                                               id="accordion_menu">
                                        <label class="onoffswitch-label" for="accordion_menu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                    <div class="custom-form">
                                        <div class="col-sm-6">
                                            <label for="accordion_title-1">Title:<i class="fa fa-text"></i></label>
                                            <input type="text" id="title-1"/>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="accordion_content-1">Content: <i class="fa fa-text"></i></label>
                                            <textarea name="accordion_content-1" id="accordion_content-1" cols="30"
                                                      rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- act-widget end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Sidebar Widgets</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <!-- act-widget-->
                    <div class="act-widget fl-wrap">
                        <div class="act-widget-header">
                            <h4>1. Working Hours</h4>
                            <div class="onoffswitch">
                                <input type="checkbox" id="working_hours" name="onWorkingHours"
                                       class="onoffswitch-checkbox">
                                <label class="onoffswitch-label" for="working_hours">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- act-widget end-->
                    <!-- act-widget-->
                    <div class="act-widget fl-wrap">
                        <div class="act-widget-header">
                            <h4>2. Price Range </h4>
                            <div class="onoffswitch">
                                <input type="checkbox" id="price_range" name="onPriceRange"
                                       class="onoffswitch-checkbox">
                                <label class="onoffswitch-label" for="price_range">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- act-widget end-->
                    <!-- act-widget-->
                    <div class="act-widget fl-wrap">
                        <div class="act-widget-header">
                            <h4>2. Booking Form </h4>
                            <div class="custom-form add_booking_form">
                                <label for="onDateTime" class="inline">
                                    <input type="checkbox" name="booking_date" id="onDateTime">
                                    <span>Enable Date Time Option</span>
                                </label>
                                <label for="onBookingSelect" class="inline">
                                    <input type="checkbox" name="booking_select" id="onBookingSelect">
                                    <span>Enable Option Selector</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- act-widget end-->
                    <!-- act-widget-->
                    <div class="act-widget fl-wrap">
                        <div class="act-widget-header">
                            <h4>3. instagram</h4>
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                       id="">
                                <label class="onoffswitch-label" for="">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                        <label>Api key<i class="fab fa-mixcloud"></i></label>
                        <input type="text" placeholder="Api key" value=""/>
                    </div>
                    <!-- act-widget end-->
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Your Socials</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <label>Facebook <i class="fab fa-facebook"></i></label>
                    <input type="text" placeholder="https://www.facebook.com/" value=""/>
                    <label>Twitter<i class="fab fa-twitter"></i> </label>
                    <input type="text" placeholder="https://twitter.com/" value=""/>
                    <label>Vkontakte<i class="fab fa-vk"></i> </label>
                    <input type="text" placeholder="https://vk.com" value=""/>
                    <label> Instagram <i class="fab fa-instagram"></i> </label>
                    <input type="text" placeholder="https://www.instagram.com/" value=""/>
                </div>
            </div>
            <button type="submit" class="btn color2-bg  float-btn">Send Listing<i
                    class="fal fa-paper-plane"></i></button>
            <!-- profile-edit-container end-->
        </form>
    </div>
    <!-- end dashboard content-->
@endsection
@section('scripts')
    @parent
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places&amp;callback=initAutocomplete"></script>
    <script src="/front/js/map-add.js"></script>
@endsection
