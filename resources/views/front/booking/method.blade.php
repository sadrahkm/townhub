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
                                    <li class="active"><span class="tolt" data-microtip-position="top"
                                                             data-tooltip="Payment Method">03.</span>
                                    </li>
                                    <li><span class="tolt" data-microtip-position="top"
                                              data-tooltip="Confirm">04.</span></li>
                                </ul>
                                <div class="bookiing-form-wrap block_box fl-wrap">
                                    <!--   list-single-main-item -->
                                    <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                        <div class="profile-edit-container">
                                            <div class="custom-form">
                                                <form action="{{ route('front.payment.doPayment') }}" method="post">
                                                    @csrf
                                                    <fieldset class="fl-wrap">
                                                        <div class="list-single-main-item-title fl-wrap">
                                                            <h3>Payment method</h3>
                                                        </div>
                                                        <div class="soc-log fl-wrap">
                                                            @if(session('message'))
                                                                <div class="alert error">
                                                                    {{ session('message') }}
                                                                </div>
                                                                @endif
                                                            <p>Select Other Payment Method</p>
                                                            <input type="radio" class="payment_methods_input"
                                                                   name="method" id="paypal" value="paypal">
                                                            <label for="paypal" class="payment_methods">
                                                                <span class="paypal-log"> Pay With Paypal</span>
                                                            </label>
                                                        </div>
                                                        <span class="fw-separator"></span>
                                                        <a href="{{ route('front.booking.billing') }}"
                                                               class="previous-form action-button color2-bg">Back</a>
                                                        <input type="submit" style="float: right"
                                                               class="payment-submit action-button color-bg" value="Confirm and Pay" disabled>
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
