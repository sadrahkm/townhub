@extends('layouts.dashboard')
@section('navBar')
    @parent
    <a href="#">Dashboard</a><span>Change Password</span>
@endsection
@section('content')
    <!--  dashboard-menu-->
    <x-dashboard.sidebar tab="dashboard"/>
    <!-- dashboard-menu  end-->
    <!-- dashboard content-->
    <div class="col-md-9">
        <div class="dashboard-title   fl-wrap">
            <h3>Change Password</h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            @include('partials.errors')
            @if(session('success'))
                <div class="alert successful">{{ session('message') }}</div>
            @elseif(session('error'))
                <div class="alert error">{{ session('message') }}</div>
            @endif
            <form class="custom-form" method="post" action="{{ route('front.dashboard.password.update') }}">
                @method('put')
                @csrf
                <div class="pass-input-wrap fl-wrap">
                    <label>Current Password</label>
                    <input type="password" name="cpass" class="pass-input" placeholder="" value=""/>
                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                </div>
                <div class="pass-input-wrap fl-wrap">
                    <label>New Password</label>
                    <input type="password" name="password" class="pass-input" placeholder="" value=""/>
                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                </div>
                <div class="pass-input-wrap fl-wrap">
                    <label>Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="pass-input" placeholder="" value=""/>
                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                </div>
                <button class="btn    color2-bg  float-btn">Save Changes<i class="fal fa-save"></i></button>
            </form>
        </div>
        <!-- profile-edit-container end-->
    </div>

@endsection
