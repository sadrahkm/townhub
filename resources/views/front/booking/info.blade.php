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
                                    <li><span class="tolt" data-microtip-position="top" data-tooltip="Billing Address">02.</span>
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
                                                            <h3>Your personal Information</h3>
                                                        </div>
                                                        <div class="log-massage">Existing Customer? <a href="#"
                                                                                                       class="modal-open">Click
                                                                here to login</a></div>
                                                        <div class="log-separator fl-wrap"><span>or</span></div>
                                                        <div class="soc-log fl-wrap">
                                                            <p>For faster login or register use your social account.</p>
                                                            <a href="#" class="facebook-log"> Connect with Facebook</a>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--   list-single-main-item end -->
                                </div>
                            </div>
                            <x-payment-sidebar/>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--content end-->
    </div>
    <!-- wrapper end-->
@endsection
