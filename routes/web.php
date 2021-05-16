<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('admin.')->prefix('admin')->middleware(['auth'])->namespace('Admin')->group(function () {
    Route::redirect('/', 'index');
    Route::get('index', 'HomeController@index');
    Route::get('users/index', 'UsersController@index')->name('users.index');
    Route::name('categories.')->prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('create', 'CategoryController@create')->name('create');
        Route::post('create', 'CategoryController@save')->name('save');
        Route::get('edit/{category}', 'CategoryController@edit')->name('edit');
        Route::post('edit/{category}', 'CategoryController@update')->name('update');
        Route::get('delete/{category}', 'CategoryController@delete')->name('delete');
    });
    Route::resource('city', 'CityController')->except('show');
});

Route::name('front.')->namespace('Front')->group(function () {
    Route::get('/', 'HomeController@show')->name('home');

    Route::name('user.')->group(function () {
//        Route::post('register', 'UserController@doRegister')->name('register');
//        Route::post('doLogin', 'UserController@doLogin')->name('dologin');
        Route::get('logout', 'UserController@doLogout')->name('logout');
    });
    /* Dashboard */
    Route::name('dashboard.')->prefix('dashboard')->middleware('auth')->group(function () {
        Route::get('/', 'DashboardController@index')->name('index');
        Route::name('profile.')->prefix('edit')->group(function () {
            Route::get('/', 'EditProfileController@edit')->name('edit');
            Route::post('update', 'EditProfileController@update')->name('update');
            Route::post('delivery', 'EditProfileController@delivery')->name('delivery');
            Route::put('updateSocial/{user}', 'SocialController@update')->name('updateSocial');
        });
        Route::name('password.')->prefix('changePassword')->group(function () {
            Route::get('/', 'ChangePasswordController@index')->name('index');
            Route::put('/update', 'ChangePasswordController@update')->name('update');
        });

        Route::name('listing.')->prefix('listing')->group(function () {
            Route::resource('/', 'MyListingController')->except('show');
        });
        Route::prefix('review')->name('review.')->group(function () {
            Route::get('/', 'ReviewController@index')->name('index');
        });
    });
    /* Profile */
    Route::name('profile.')->prefix('profile')->group(function () {
        Route::get('/{user}', 'ProfileController@index')->name('index');
        Route::post('/follow/', 'FollowController@doFollow')->name('doFollow');
        Route::post('/unfollow/', 'FollowController@doUnfollow')->name('doUnfollow');
    });
    /* Event */
    Route::prefix('event')->name('event.')->group(function () {
        Route::get('/{event}', 'EventController@show')->name('show');
        Route::post('/{event}/comment', 'CommentController@store')->name('comment.store');
        Route::post('/comment/rate', 'CommentController@rate')->name('comment.rate');
    });
    /* Wishlist */
    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::post('wishlist/store', 'WishlistController@store')->name('store');
        Route::post('wishlist/remove', 'WishlistController@delete')->name('delete');
    });

    /* Payment */
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::post('doPayment', 'PaymentController@doPayment')->name('doPayment');
        Route::get('verify', 'PaymentController@verifyPayment')->name('verify');
    });
    /* Listing */
    Route::prefix('listing')->name('listing.')->group(function () {
        Route::get('/', 'ListingController@index')->name('index');
    });
    /* Booking */
    Route::prefix('booking')->name('booking.')->group(function () {
        // set a session for event data like id and date and quantity ...
        Route::post('/book', 'BookingController@storeSession')->name('store_id');
        // if session were stored, booking will continue
        Route::middleware('bookingSessionExists')->group(function () {
            Route::get('/', 'BookingController@checkUser')->name('checkUser')
                ->middleware('skipIfIsLogin');
            Route::get('billing', 'BookingController@billing')->name('billing');
            Route::get('method','BookingController@paymentMethod')->name('paymentMethod');
            Route::get('confirm', 'BookingController@confirm')->name('confirm');
        });
    });
});

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes(['logout' => false]);

Route::get('/home', 'HomeController@index')->name('home');
