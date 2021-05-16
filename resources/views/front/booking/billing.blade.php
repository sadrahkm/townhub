@extends('layouts.mainPage')
@section('content')
    <!-- wrapper-->
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <section class="gray-bg no-top-padding-sec" id="sec1">
                <div class="container">
                    <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                        <a href="#">Home</a><a href="#">Pages</a> <span>Booking Form</span>
                    </div>
                    <div class="list-main-wrap-title single-main-wrap-title fl-wrap">
                        <h2>Booking form for : <span>Iconic Cafe</span></h2>
                    </div>
                    <div class="fl-wrap ">
                        <div class="row">
                            <div class="col-md-8">
                                <ul id="progressbar" class="no-list-style">
                                    <li class="active"><span class="tolt" data-microtip-position="top"
                                                             data-tooltip="Personal Info">01.</span></li>
                                    <li class="active"><span class="tolt" data-microtip-position="top"
                                                             data-tooltip="Billing Address">02.</span>
                                    </li>
                                    <li><span class="tolt" data-microtip-position="top" data-tooltip="Payment Method">03.</span>
                                    </li>
                                    <li><span class="tolt" data-microtip-position="top"
                                              data-tooltip="Confirm">04.</span></li>
                                </ul>
                                <div class="bookiing-form-wrap block_box fl-wrap">
                                    <!--   list-single-main-item -->
                                    <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                        <div class="profile-edit-container">
                                            <div class="custom-form">
                                                <form>
                                                    <fieldset class="fl-wrap">
                                                        <div class="list-single-main-item-title fl-wrap">
                                                            <h3>Billing Address</h3>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label class="vis-label">City <i
                                                                        class="fal fa-globe-asia"></i></label>
                                                                <input name="city" type="text" placeholder="Your city"
                                                                       value="{{ old('city',isset($user->delivery->city) ? $user->delivery->city : '') }}"/>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="vis-label">Country </label>
                                                                <div class="listsearch-input-item ">
                                                                    <select data-placeholder="Your Country"
                                                                            class="chosen-select no-search-select">
                                                                        <option>United states</option>
                                                                        <option>Asia</option>
                                                                        <option>Australia</option>
                                                                        <option>Europe</option>
                                                                        <option>South America</option>
                                                                        <option>Africa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label class="vis-label">Address <i
                                                                        class="fal fa-road"></i> </label>
                                                                <input name="address" type="text"
                                                                       placeholder="Your Street"
                                                                       value="{{ old('address',isset($user->delivery->address) ? $user->delivery->address : '') }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <label class="vis-label">State<i
                                                                        class="fal fa-street-view"></i></label>
                                                                <input name="state" type="text" placeholder="Your State"
                                                                       value="{{ old('state',isset($user->delivery->state) ? $user->delivery->state : '') }}"/>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="vis-label">Postal code<i
                                                                        class="fal fa-barcode"></i> </label>
                                                                <input name="postal_code" type="text"
                                                                       placeholder="Your Postal Code"
                                                                       value="{{ old('postal_code',isset($user->delivery->postal_code) ? $user->delivery->postal_code : '') }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="list-single-main-item-title fl-wrap">
                                                            <h3>Addtional Notes</h3>
                                                        </div>
                                                        <textarea cols="40" rows="3" placeholder="Notes"></textarea>
                                                        <span class="fw-separator"></span>
                                                        <a href="#"
                                                           class="previous-form action-button back-form   color2-bg">Back</a>
                                                        <a href="{{ route('front.booking.paymentMethod') }}"
                                                           style="float: right" class="action-button color-bg">Payment
                                                            Step</a>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--   list-single-main-item end -->
                                </div>
                            </div>
                            <x-payment-sidebar :event="$event"/>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--content end-->
    </div>
    <!-- wrapper end-->
@endsection
