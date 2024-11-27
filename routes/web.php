<?php

use App\Http\Controllers\front\FeatureAdsController;
use App\Http\Controllers\front\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\front\UserCarsController;
use App\Http\Controllers\front\UserCenterController;
use App\Http\Controllers\front\UserNumberController;
use \App\Http\Controllers\front\ContactController;
use \App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\CarController;
use App\Http\Controllers\front\ForumsController;
use App\Http\Controllers\front\SubscriptionController;
use \App\Http\Controllers\front\UserAgencyController;
use App\Http\Controllers\Front\UserForumsController;
use \App\Http\Controllers\front\UseRoomsController;
use \App\Http\Controllers\front\UserRentController;
use \App\Http\Controllers\front\WashCarController;
use \App\Http\Controllers\front\FrontController;
use \App\Http\Controllers\front\AuctionController;
use \App\Http\Controllers\front\ShopController;
use App\Http\Controllers\front\SocialLoginController;

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('agency', 'agencies');
    Route::get('agency/{slug}', 'agency_details');
    /////////// Show Rooms
    ///
    Route::get('showrooms', 'showrooms');
    Route::get('showrooms/{slug}', 'showroom_details');
    ////////// Show Rent
    ///
    Route::get('rent', 'rent');
    Route::get('rent/details/{slug}', 'rent_details');

    ////////// Show Auctions شركات المزاد
    ///
    Route::get('auctions', 'auction');
    Route::get('auction/details/{slug}', 'auction_details');


    ///////////// Start Car Numbers //////
    ///
    Route::get('car_numbers', 'car_numbers');

    /////////// Start Auto Repairs /////////
    ///
    Route::get('auto-repair', 'auto_repair');
    Route::get('auto_repair/{slug}', 'repair_details');
    /////////// Start Car Wash /////////
    ///
    Route::get('car-wash', 'car_wash');
    Route::get('car-wash/{slug}', 'car_wash_details');

    //////////////// Start Forums ///////
    ///
    Route::get('forums', 'forums');

    /////////////////
    ///
    Route::get('create-car', 'create_car');
    ///////////// Start Faqs
    Route::get('faqs', 'faq');
    ///////// About us
    Route::get('aboutus', 'aboutus');
    /// pub // اعلن معنا
    Route::get('pub', 'pub');
    //// Terms & privacy
    Route::get('terms', 'terms');
    Route::get('privacy', 'privacy');
});
///////////// Blog ///////////
///
Route::controller(BlogController::class)->group(function () {
    Route::get('blog', 'blog');
    Route::get('blog/{slug}', 'blog_details');
    Route::get('blog-category/{slug}', 'category_details');
});
////////////////// Start Cars Controller ////////////////

Route::controller(CarController::class)->group(function () {
    Route::get('car/{id}/{slug}', 'AdvDetails');
    Route::get('new-cars', 'NewCars');
    Route::get('used-cars', 'UsedCars');
    Route::get('brand/{slug}', 'BrandCars');
    Route::get('getCarModels/{brandid}', 'getCarModels');
    Route::get('search', 'search')->name('car.search');
});

/////////////////////////// User Controller //////////////////////
///
Route::controller(UserController::class)->group(function () {
    Route::match(['post', 'get'], 'login', action: 'login')->name('login');
    Route::match(['post','get'],'register', 'register');
    Route::post('user/register', 'register');
    Route::get('user/confirm/{code}', 'UserConfirm');
    /////// Forget Password
    ///
    Route::match(['post', 'get'], 'forget-password', 'forget_password');
    Route::match(['post', 'get'], 'user/change-forget-password/{code}', 'change_forget_password');
    Route::post('user/update_forget_password', 'update_forget_password');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('user/dashboard', 'index')->name('user.dashboard');
        Route::match(['get', 'post'], 'user/update', 'update_info');
        Route::get('user/alerts', 'alerts');
        Route::match(['post', 'get'], 'user/password', 'password');
        Route::get('user/logout', 'logout');
        Route::get('user/alert/delete/{id}', 'delete_alert');
        Route::get('/user/get-jobs-by-category/{categoryId}', 'getJobsByCategory');
        Route::get('/user/get-specialist-by-category/{categoryId}', 'getSpecialistByCategory');
    });
    Route::match(['post', 'get'], 'forget-password', 'forget_password');
});

Route::get('auth/{provider}/redirect',action: [SocialLoginController::class,'redirect'])->name('auth.google.redirect');
Route::get('auth/{provider}/callback',[SocialLoginController::class,'callback'])->name('auth.google.callback');




Route::group(['middleware' => 'auth'], function () {
    Route::controller(UserCarsController::class)->group(function () {
        Route::match(['post', 'get'], 'user/car/add', 'add_car');
        Route::match(['post', 'get'], 'user/car/update/{id}', 'update_car');
        Route::get('getModels/{brandid}', 'getModels');
        Route::get('getcitizen/{countryid}', 'getcitizen');
    });
    Route::controller(UserNumberController::class)->group(function () {
        Route::get('user/numbers', 'index');
        Route::match(['post', 'get'], 'user/number/add', 'store');
        Route::match(['post', 'get'], 'user/number/update/{id}', 'update');
    });
    Route::controller(UserCenterController::class)->group(function () {
        Route::get('user/centers', 'index');
        Route::match(['post', 'get'], 'user/center/add', 'store');
        Route::match(['post', 'get'], 'user/center/update/{id}', 'update');
    });
    Route::controller(WashCarController::class)->group(function () {
        Route::get('user/washs', 'index');
        Route::match(['post', 'get'], 'user/wash/add', 'store');
        Route::match(['post', 'get'], 'user/wash/update/{id}', 'update');
    });
    Route::controller(UserAgencyController::class)->group(function () {
        Route::get('user/agency', 'index');
        Route::match(['post', 'get'], 'user/agency/add', 'store');
        Route::match(['post', 'get'], 'user/agency/update/{id}', 'update');
    });
    Route::controller(UseRoomsController::class)->group(function () {
        Route::get('user/rooms', 'index');
        Route::match(['post', 'get'], 'user/room/add', 'store');
        Route::match(['post', 'get'], 'user/room/update/{id}', 'update');
    });
    Route::controller(UserRentController::class)->group(function () {
        Route::get('user/rent', 'index');
        Route::match(['post', 'get'], 'user/rent/add', 'store');
        Route::match(['post', 'get'], 'user/rent/update/{id}', 'update');
    });
    //////////////// مكاتتب شركات المزاد
    Route::controller(AuctionController::class)->group(function () {
        Route::get('user/auctions', 'index');
        Route::match(['post', 'get'], 'user/auction/add', 'store');
        Route::match(['post', 'get'], 'user/auction/update/{id}', 'update');
    });
    Route::controller(UserForumsController::class)->group(function () {
        Route::get('user/forums', 'index')->name('forums');
        Route::match(['post', 'get'], 'user/forum/add', 'store');
        Route::match(['post', 'get'], 'user/forum/update/{id}/{slug}', 'update');
    });
});

Route::controller(ContactController::class)->group(function () {
    Route::match(['post', 'get'], 'contactus', 'contact');
});
Route::controller(ForumsController::class)->group(function () {
    Route::get('forum/{slug}', 'CategoryDetails');
    Route::get('topic/{id}/{slug}', 'TopicDetails');
   // Route::post('topic/comment','NewComment');
    Route::match(['post','get'],'topic/comment','NewComment');
});
Route::controller(SubscriptionController::class)->group(function(){

    Route::get('subscription','index');
});

Route::controller(ShopController::class)->group(function (){
    Route::get('products','products');
    Route::get('product/{user_id}/{slug}','product_details');
    Route::get('user/products','index');
    Route::match(['post','get'],'user/product/add','store');
    Route::match(['post','get'],'user/product/update/{id}','update');
});

Route::controller(FeatureAdsController::class)->group(function (){
    Route::get('feature-advs','index');

});

include 'admin.php';
