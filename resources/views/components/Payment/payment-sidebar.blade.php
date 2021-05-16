<div class="col-md-4">
    <div class="cart-details-wrap fl-wrap">
        <div class="cart-details-item-header">
            <h3> Your Booking Cart</h3>
        </div>
        <!--cart-details  -->
        <div class="cart-details fl-wrap block_box">
            <!--cart-details_header-->
            <div class="cart-details_header">
                <a href="{{ route('front.event.show',$event->id) }}"
                   class="widget-posts-img"><img
                        src="{{ $event->thumbnail['url'] }}"
                        class="respimg" alt="{{ $event->title }}"></a>
                <div class="widget-posts-descr">
                    <h4>
                        <a href="{{ route('front.event.show',$event->id) }}">{{ $event->title }}</a>
                    </h4>
                    <div class="geodir-category-location fl-wrap"><a
                            href="#">{{ $event->address }}</a></div>
                    <div class="widget-posts-descr-link">
                        <a href="listing.html">{{ $event->category->name }}</a>
                        <a href="listing.html">{{ $event->city->name }}</a></div>
                </div>
            </div>
            <!--cart-details_header end-->
            <!--ccart-details_text-->
            <div class="cart-details_text">
                <ul class="cart_list no-list-style">
                    @if(key_exists('date-time',session('booking')))
                        <li>Date - Hour<span>{{ session('booking')['date-time'] }}</span>
                        </li>
                    @endif
                    <li>
                        Guests<span>{{ session('booking')['quantity'] > 1 ? session('booking')['quantity'] . ' Persons' : session('booking')['quantity'] . ' Person'}} </span>
                    </li>
                    @if(key_exists('option',session('booking')))
                        <li>Option<span>{{ session('booking')['option'] }}</span>
                        </li>
                    @endif
                </ul>
            </div>
            <!--cart-details_text end -->
        </div>
        <!--cart-details end -->
        <!--cart-total -->
        <div class="cart-total color2-bg fl-wrap">
            <span class="cart-total_item_title">Total Cost</span>
            <strong>$190</strong>
        </div>
        <!--cart-total end -->
    </div>
    <!--box-widget-item -->
    <div class="box-widget-item fl-wrap">
        <div class="banner-wdget fl-wrap">
            <div class="overlay"></div>
            <div class="bg" data-bg="images/bg/12.jpg"></div>
            <div class="banner-wdget-content fl-wrap">
                <h4>Still need help in filling out the form ? Visit our help page. </h4>
                <a href="help.html" class="color-bg"> Visit now</a>
            </div>
        </div>
    </div>
    <!--box-widget-item end -->
</div>
