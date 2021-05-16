@extends('layouts.dashboard')
@section('navBar')
    @parent
    <a href="#">Dashboard</a><span>Edit Profile</span>
@endsection
@section('content')
    <!--  dashboard-menu-->
    <x-dashboard.sidebar tab="dashboard"/>
    <!-- dashboard-menu  end-->
    <!-- dashboard content-->
    <div class="col-md-9">
        <div class="dashboard-title   fl-wrap">
            <h3>Bookings</h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <!-- booking-list-->
            <div class="booking-list">
                <div class="booking-list-message">
                    <div class="booking-list-contr">
                        <a href="#" class="green-bg tolt" data-microtip-position="left" data-tooltip="Approve"><i
                                class="fal fa-check"></i></a>
                        <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Cancel"><i
                                class="fal fa-trash"></i></a>
                    </div>
                    <div class="booking-list-message-avatar">
                        <img src="images/avatar/3.jpg" alt="">
                    </div>
                    <span class="booking-list-new green-bg">New</span>
                    <div class="booking-list-message-text">
                        <h4>Andy Smith - <span>27 December 2019</span></h4>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Listing Item :</span> :
                            <span class="booking-text"><a href="listing-sinle.html">Premium Plaza Hotel</a></span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Persons :</span>
                            <span class="booking-text">4 Peoples</span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Booking Date :</span>
                            <span class="booking-text">02.03.2019  - 10.03.2019</span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Mail :</span>
                            <span class="booking-text"><a href="#" target="_top">yormail@domain.com</a></span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Phone :</span>
                            <span class="booking-text"><a href="tel:+496170961709"
                                                          target="_top">+496170961709</a></span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Payment State :</span>
                            <span class="booking-text"> <strong class="done-paid">Paid  </strong>  using Paypal</span>
                        </div>
                        <span class="fw-separator"></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non
                            cursus. Cras metus neque, gravida sodales massa ut. </p>
                    </div>
                </div>
            </div>
            <!-- dashboard-list end-->
        </div>
        <!-- profile-edit-container end-->
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <!-- booking-list-->
            <div class="booking-list">
                <div class="booking-list-message">
                    <div class="booking-list-contr">
                        <a href="#" class="green-bg tolt" data-microtip-position="left" data-tooltip="Approve"><i
                                class="fal fa-check"></i></a>
                        <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Cancel"><i
                                class="fal fa-trash"></i></a>
                    </div>
                    <div class="booking-list-message-avatar">
                        <img src="images/avatar/2.jpg" alt="">
                    </div>
                    <div class="booking-list-message-text">
                        <h4>Adam Forser - <span>17 october 2018</span></h4>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Listing Item :</span> :
                            <span class="booking-text"><a href="listing-sinle.html">Luxary Resaturant</a></span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Persons :</span>
                            <span class="booking-text">2 Peoples</span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Booking Date :</span>
                            <span class="booking-text"> 10.03.2019</span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Mail :</span>
                            <span class="booking-text"><a href="#" target="_top">yormail@domain.com</a></span>
                        </div>
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Phone :</span>
                            <span class="booking-text"><a href="tel:+496170961709"
                                                          target="_top">+496170961709</a></span>
                        </div>
                        <span class="fw-separator"></span>
                        <p> Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                    </div>
                </div>
            </div>
            <!-- dashboard-list end-->
        </div>
        <!-- profile-edit-container end-->
        <div class="pagination">
            <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
            <a href="#">1</a>
            <a href="#" class="current-page">2</a>
            <a href="#">3</a>
            <a href="#">...</a>
            <a href="#">7</a>
            <a href="#" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
        </div>
    </div>
    <!-- dashboard content end-->
@endsection
