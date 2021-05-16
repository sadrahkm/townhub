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
                            <div class="col-md-12">
                                <ul id="progressbar" class="no-list-style">
                                    <li class="active"><span class="tolt" data-microtip-position="top"
                                                             data-tooltip="Personal Info">01.</span></li>
                                    <li class="active"><span class="tolt" data-microtip-position="top"
                                                             data-tooltip="Billing Address">02.</span>
                                    </li>
                                    <li class="active"><span class="tolt" data-microtip-position="top"
                                                             data-tooltip="Payment Method">03.</span>
                                    </li>
                                    <li class="active"><span class="tolt" data-microtip-position="top"
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
                                                            <h3>Confirmation</h3>
                                                        </div>
                                                        <div class="success-table-container">
                                                            <div class="success-table-header fl-wrap">
                                                                <i class="fal fa-pause-circle decsth {{ !session('status') ? 'color-red' : '' }}"></i>
                                                                <h4>{{ !empty(session('message')) ? session('message') : 'Nothing :)' }}</h4>
                                                                <div class="clearfix"></div>
                                                                @if(session('status'))
                                                                    <p>Your payment has been processed successfully.</p>

                                                                    <a href="invoice.html" target="_blank"
                                                                       class="color-bg">View
                                                                        Invoice</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <span class="fw-separator"></span>
                                                        <a href="#"
                                                           class="previous-form action-button  back-form color2-bg">Back</a>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--   list-single-main-item end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--content end-->
    </div>
    <!-- wrapper end-->
@endsection
