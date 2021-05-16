@extends('layouts.dashboard')
@section('navBar')
    @parent
    <a href="#">Dashboard</a><span>Main page</span>
@endsection
@section('content')

<!--  dashboard-menu-->
<x-dashboard.sidebar tab="dashboard"/>
<!-- dashboard-menu  end-->
<!-- dashboard content-->
<div class="col-md-9">
    <div class="dashboard-title fl-wrap">
        <h3>Your Statistics</h3>
    </div>
    <!-- list-single-facts -->
    <div class="list-single-facts fl-wrap">
        <div class="row">
            <div class="col-md-4">
                <!-- inline-facts -->
                <div class="inline-facts-wrap gradient-bg ">
                    <div class="inline-facts">
                        <i class="fal fa-chart-bar"></i>
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="1054">0</div>
                            </div>
                        </div>
                        <h6>Listing Views</h6>
                    </div>
                    <div class="stat-wave">
                        <svg viewbox="0 0 100 25">
                            <path fill="#fff" d="M0 30 V12 Q30 17 55 2 T100 11 V30z"/>
                        </svg>
                    </div>
                </div>
                <!-- inline-facts end -->
            </div>
            <div class="col-md-4">
                <!-- inline-facts  -->
                <div class="inline-facts-wrap gradient-bg ">
                    <div class="inline-facts">
                        <i class="fal fa-comments-alt"></i>
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="2557">0</div>
                            </div>
                        </div>
                        <h6>Total Reviews</h6>
                    </div>
                    <div class="stat-wave">
                        <svg viewbox="0 0 100 25">
                            <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"/>
                        </svg>
                    </div>
                </div>
                <!-- inline-facts end -->
            </div>
            <div class="col-md-4">
                <!-- inline-facts  -->
                <div class="inline-facts-wrap gradient-bg ">
                    <div class="inline-facts">
                        <i class="fal fa-envelope-open-dollar"></i>
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="125">0</div>
                            </div>
                        </div>
                        <h6>Bookings </h6>
                    </div>
                    <div class="stat-wave">
                        <svg viewbox="0 0 100 25">
                            <path fill="#fff" d="M0 30 V12 Q30 12 55 5 T100 11 V30z"/>
                        </svg>
                    </div>
                </div>
                <!-- inline-facts end -->
            </div>
        </div>
    </div>
    <!-- list-single-facts end -->
    <div class="list-single-main-item fl-wrap block_box">
        <!-- chart-wra-->
        <div class="chart-wrap   fl-wrap">
            <div class="chart-header fl-wrap">
                <div class="listsearch-input-item">
                    <select data-placeholder="Week" class="chosen-select no-search-select">
                        <option>Week</option>
                        <option>Month</option>
                        <option>Year</option>
                    </select>
                </div>
                <div id="myChartLegend"></div>
            </div>
            <canvas id="canvas-chart"></canvas>
        </div>
        <!--chart-wrap end-->
    </div>
    <div class="dashboard-title dt-inbox fl-wrap">
        <h3>Recent Activities</h3>
    </div>
    <!-- dashboard-list-box-->
    <div class="dashboard-list-box  fl-wrap">
        <!-- dashboard-list end-->
        <div class="dashboard-list fl-wrap">
            <div class="dashboard-message">
                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                <div class="dashboard-message-text">
                    <i class="far fa-check green-bg"></i>
                    <p>Your listing <a href="#">Park Central</a> has been approved! </p>
                </div>
                <div class="dashboard-message-time"><i class="fal fa-calendar-week"></i> 28 may 2020</div>
            </div>
        </div>
        <!-- dashboard-list end-->
        <!-- dashboard-list end-->
        <div class="dashboard-list fl-wrap">
            <div class="dashboard-message">
                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                <div class="dashboard-message-text">
                    <i class="far fa-heart purp-bg"></i>
                    <p>Someone bookmarked your <a href="#">Holiday Home</a> listing!</p>
                </div>
                <div class="dashboard-message-time"><i class="fal fa-calendar-week"></i> 28 may 2020</div>
            </div>
        </div>
        <!-- dashboard-list end-->
        <!-- dashboard-list end-->
        <div class="dashboard-list fl-wrap">
            <div class="dashboard-message">
                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                <div class="dashboard-message-text">
                    <i class="fal fa-comments-alt red-bg"></i>
                    <p> Someone left a review on <a href="#">Park Central</a> listing!</p>
                </div>
                <div class="dashboard-message-time"><i class="fal fa-calendar-week"></i> 28 may 2020</div>
            </div>
        </div>
        <!-- dashboard-list end-->
        <!-- dashboard-list end-->
        <div class="dashboard-list fl-wrap">
            <div class="dashboard-message">
                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                <div class="dashboard-message-text">
                    <i class="far fa-check green-bg"></i>
                    <p> Your listing <a href="#">Holiday Home</a> has been approved! </p>
                </div>
                <div class="dashboard-message-time"><i class="fal fa-calendar-week"></i> 28 may 2020</div>
            </div>
        </div>
        <!-- dashboard-list end-->
        <!-- dashboard-list end-->
        <div class="dashboard-list fl-wrap">
            <div class="dashboard-message">
                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                <div class="dashboard-message-text">
                    <i class="far fa-heart purp-bg"></i>
                    <p>Someone bookmarked your <a href="#">Moonlight Hotel</a> listing!</p>
                </div>
                <div class="dashboard-message-time"><i class="fal fa-calendar-week"></i> 28 may 2020</div>
            </div>
        </div>
        <!-- dashboard-list end-->
    </div>
    <!-- dashboard-list-box end-->
</div>
@endsection
<!-- dashboard content end-->
