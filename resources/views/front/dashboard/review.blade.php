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
            <h3>Your Reviews </h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
        @foreach($comments as $comment)
            <!-- reviews-comments-item -->
                <div class="reviews-comments-item">
                    <div class="review-comments-avatar">
                        <img src="{{ $comment->user->avatar_name }}" alt="{{ $comment->user->fullname }}">
                        <h3 class="review-fullname">
                            <a href="{{ route('front.profile.index',$comment->user->id) }}">{{ $comment->user->fullname }}</a>
                        </h3>
                    </div>
                    <div class="reviews-comments-item-text fl-wrap">
                        <div class="reviews-comments-header fl-wrap">
                            <h4>
                                <a href="{{ route('front.event.show',$comment->commentable->id) }}">{{ $comment->commentable->title }}</a>
                            </h4>
                            <h6 class="username">{{ '@' . $comment->user->username }}</h6>
                            <div class="review-score-user">
                                <span class="review-score-user_item">{{ $comment->point['average'] }}</span>
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                            </div>
                        </div>
                        <p>
                            {!! nl2br($comment->description) !!}
                        </p>
                        @if(!empty($comment->gallery))
                            <div class="review-images ">
                                @foreach($comment->gallery as $image)
                                    <a href="{{ $image }}" class="image-popup"><img
                                            src="{{ $image }}" alt=""></a>
                                @endforeach
                            </div>
                        @endif
                        <div class="reviews-comments-item-footer fl-wrap">
                            <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>{{ $comment->created_at }}</span>
                            </div>
                            <a href="#" class="rate-review"><i class="fal fa-reply"></i> Reply </a>
                        </div>
                    </div>
                </div>
                <!--reviews-comments-item end-->
            @endforeach
        </div>
        <!-- profile-edit-container end-->
        {{ $comments->links() }}
    </div>
@endsection
