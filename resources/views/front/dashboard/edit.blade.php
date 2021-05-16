@extends('layouts.dashboard')
@section('navBar')
    @parent
    <a href="#">Dashboard</a><span>Edit Profile</span>
@endsection
@section('content')
    <!--  dashboard-menu-->
    <x-dashboard.sidebar tab="dashboard"/>
    <!-- dashboard-menu  end-->
    <!-- Edit Profile content-->
    <div class="col-md-9">
        <div class="dashboard-title fl-wrap">
            <h3>Your Profile</h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                @include('partials.errors')
                <form action="{{ route('front.dashboard.profile.update') }}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Full Name <i class="fal fa-user"></i></label>
                            <input type="text" name="fullname" placeholder="Jessie"
                                   value="{{ old('fullname',isset($user->fullname) ? $user->fullname : '') }}"/>
                        </div>
                        <div class="col-sm-6">
                            <label>User Name <i class="fal fa-user"></i></label>
                            <input type="text" name="username" placeholder="jessie213"
                                   value="{{ old('username',isset($user->username) ? $user->username : '') }}"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Email Address<i class="far fa-envelope"></i> </label>
                            <input type="text" name="email" placeholder="JessieManrty@domain.com"
                                   value="{{ old('email',isset($user->email) ? $user->email : '') }}"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Phone<i class="far fa-phone"></i> </label>
                            <input type="text" name="phone" placeholder="+7(123)987654"
                                   value="{{ old('phone',isset($user->phone) ? $user->phone : '') }}"/>
                        </div>
                        <div class="col-sm-6">
                            <label> Website <i class="far fa-globe"></i> </label>
                            <input type="text" name="website" placeholder="themeforest.net"
                                   value="{{ old('website',isset($user->website) ? $user->website : '') }}"/>
                        </div>
                        <div class="col-sm-6">
                            <label> Company <i class="far fa-analytics"></i> </label>
                            <input type="text" name="company" placeholder="Benz"
                                   value="{{ old('company',isset($user->company) ? $user->company : '') }}"/>
                        </div>
                    </div>
                    <label> Notes</label>
                    <textarea cols="40" rows="3" name="notes" placeholder="About Me"
                              style="margin-bottom:20px;">{{ old('notes',isset($user->notes) ? $user->notes : '') }}</textarea>
                    <label>Change Avatar</label>
                    <div class="photoUpload">
                        <span><i class="fal fa-image"></i> <strong>Add Photo</strong></span>
                        <input type="file" name="avatar" class="upload">
                    </div>
                    <label>Change Header Background</label>
                    <div class="photoUpload">
                        <span><i class="fal fa-image"></i> <strong>Add Photo</strong></span>
                        <input type="file" name="header_background" class="upload">
                    </div>
                    <button type="submit" class="btn color2-bg float-btn">Save Changes<i class="fal fa-save"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- profile-edit-container end-->
        <div class="dashboard-title fl-wrap">
            <h3>Your Delivery Information</h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                @include('partials.errors')
                <form action="{{ route('front.dashboard.profile.delivery') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="vis-label">City <i
                                    class="fal fa-globe-asia"></i></label>
                            <input type="text" name="city" placeholder="Your city" value="{{ old('city', isset($user->delivery->city) ? $user->delivery->city : '') }}"/>
                        </div>
                        <div class="col-sm-6">
                            <label class="vis-label">Country </label>
                            <div class="listsearch-input-item ">
                                <select name="country" data-placeholder="Your Country"
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
                            <input type="text" name="address" placeholder="Your Street" value="{{ old('address', isset($user->delivery->address) ? $user->delivery->address : '') }}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <label class="vis-label">State<i
                                    class="fal fa-street-view"></i></label>
                            <input type="text" name="state" placeholder="Your State" value="{{ old('state', isset($user->delivery->state) ? $user->delivery->state : '') }}"/>
                        </div>
                        <div class="col-sm-4">
                            <label class="vis-label">Postal code<i
                                    class="fal fa-barcode"></i> </label>
                            <input type="text" name="postal_code" placeholder="123456" value="{{ old('postal_code', isset($user->delivery->postal_code) ? $user->delivery->postal_code : '') }}"/>
                        </div>
                    </div>
                    <button type="submit" class="btn color2-bg float-btn">Save Changes<i class="fal fa-save"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- profile-edit-container end-->
        <div class="dashboard-title dt-inbox fl-wrap">
            <h3>Your Socials</h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <form class="custom-form" action="{{ route('front.dashboard.profile.updateSocial',$user->id) }}"
                  method="post">
                @method('PUT')
                @csrf
                <label>Facebook <i class="fab fa-facebook"></i></label>
                <input name="fb" type="text" placeholder="https://www.facebook.com/" value=""/>
                <label>Twitter<i class="fab fa-twitter"></i> </label>
                <input name="tw" type="text" placeholder="https://twitter.com/" value=""/>
                <label>Telegram<i class="fab fa-telegram"></i> </label>
                <input name="tl" type="text" placeholder="https://telegram.me" value=""/>
                <label> Instagram <i class="fab fa-instagram"></i> </label>
                <input name="insta" type="text" placeholder="https://www.instagram.com/" value=""/>
                <button type="submit" class="btn color2-bg  float-btn">Save Changes<i class="fal fa-save"></i></button>
            </form>
        </div>
        <!-- profile-edit-container end-->
    </div>
@endsection
<!-- Edit Profile content end-->
