@extends('layouts.dashboard')
@section('navBar')
    @parent
    <a href="#">Dashboard</a><span>My Listings</span>
@endsection
@section('content')
    <!--  dashboard-menu-->
    <x-dashboard.sidebar tab="dashboard"/>
    <!-- dashboard-menu  end-->
    <div class="col-md-9">
        <div class="dashboard-title   fl-wrap">
            <h3>Your Listings</h3>
        </div>
        <!-- dashboard-list-box-->
        <div class="dashboard-list-box  fl-wrap">

            @foreach($events as $event)
                <div class="dashboard-list fl-wrap">
                    <div class="dashboard-message">
                        <div class="booking-list-contr">
                            <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i
                                    class="fal fa-edit"></i></a>
                            <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i
                                    class="fal fa-trash"></i></a>
                        </div>
                        <div class="dashboard-message-text">
                            <img src="{{ $event->thumbnail['url'] }}" alt="{{ $event->title }}">
                            <h4><a href="{{ route('front.event.show',$event->id) }}">{{ $event->title }}</a></h4>
                            <div class="geodir-category-location clearfix"><a href="#">{{ $event->address }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- dashboard-list-box end-->
        {{ $events->links() }}
    </div>
@endsection
