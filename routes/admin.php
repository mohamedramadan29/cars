<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PublicSettingController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\CarMarkController;
use \App\Http\Controllers\admin\AgencyController;
Route::group(['prefix' => 'admin'], function () {
// Admin Login

    Route::controller(AdminController::class)->group(function () {
        Route::match(['post', 'get'], '/', 'login')->name('admin_login');
        Route::match(['post', 'get'], 'login', 'login')->name('admin_login');
// Admin Dashboard
        Route::group(['middleware' => 'admin'], function () {
            Route::get('dashboard', 'dashboard');
// update admin password
            Route::match(['post', 'get'], 'update_admin_password', 'update_admin_password');
// check Admin Password
            Route::post('check_admin_password', 'check_admin_password');
// Update Admin Details
            Route::match(['post', 'get'], 'update_admin_details', 'update_admin_details');
            Route::get('logout', 'logout')->name('logout');
        });
    });

        ///////////////// Start Public Settings
        ///
    Route::controller(PublicSettingController::class)->group(function () {
        Route::match(['post', 'get'], 'public-setting/update', 'update');
    });
    Route::group(['middleware' => 'admin'], function () {
     ///////////// Start Main Categories
        Route::controller(CarMarkController::class)->group(function () {
            Route::get('car-marks', 'index');
            Route::match(['post', 'get'], 'car_mark/add', 'store');
            Route::match(['post', 'get'], 'car_mark/update/{id}', 'update');
            Route::post('car_mark/delete/{id}', 'delete');
            Route::get('car_mark/models/{id}','models');
            Route::post('car_mark/models/store','store_models');
            Route::post('car_mark/models/update/{id}','update_models');
            Route::post('car_mark/models/delete/{id}','delete_model');
        });

        /////////////////////////// Start Agency Controller  ///////////

        Route::controller(AgencyController::class)->group(function (){
            Route::get('agency','index');
            Route::match(['post','get'],'agency/add','store');
            Route::match(['post','get'],'agency/update/{id}','update');
            Route::post('agency/delete/{id}','delete');
        });
        ///////////////////// Start Sub Categories

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('sub-categories/{id}', 'index');
            Route::match(['post', 'get'], 'sub-category/add/{id}', 'store');
            Route::match(['post', 'get'], 'sub-category/update/{id}', 'update');
            Route::post('sub-category/delete/{id}', 'delete');
        });

/////////// Start Brands

        Route::controller(BrandController::class)->group(function () {
            Route::get('brands', 'index');
            Route::match(['post', 'get'], 'brand/add', 'store');
            Route::match(['post', 'get'], 'brand/update/{id}', 'update');
            Route::post('brand/delete/{id}', 'delete');
        });


//////////// Start Social Media
///
        Route::controller(SocialMediaController::class)->group(function () {
            Route::match(['post', 'get'], 'social-media/update', 'update');
        });

///////////////// Start Product Attribute /////////////////////////
        Route::controller(AttributesController::class)->group(function () {
            Route::get('attributes', 'index');
            Route::match(['post', 'get'], 'attribute/add', 'store');
            Route::match(['post', 'get'], 'attribute/update/{id}', 'update');
            Route::post('attribute/delete/{id}', 'delete');
        });
///////////////////// start Attribute Values /////////////////
        Route::controller(AttributeValuesController::class)->group(function () {
            Route::get('attribute-values/{id}', 'index');
            Route::match(['post', 'get'], 'attribute-value/add/{id}', 'store');
            Route::match(['post', 'get'], 'attribute-value/update/{id}', 'update');
            Route::post('attribute-value/delete/{id}', 'delete');
        });

////////////////////// Start Products ///////////////////////////////
        Route::controller(ProductController::class)->group(function () {
            Route::get('products', 'index');
            Route::match(['post', 'get'], 'product/add', 'store');
            Route::match(['post', 'get'], 'product/update/{slug}', 'update')->name('product.update');
            Route::post('product/delete/{id}', 'delete');
            Route::get('/get-attribute-values/{attributeId}', 'getAttributeValues');
            Route::get('/get-subcategories', 'getSubCategories')->name('get.subcategories');
            Route::post('product/gallary/delete/{id}', 'delete_image_gallary');
        });

//////////////////////////// Start Coupon Code ////////////////////
///
        Route::controller(CouponController::class)->group(function () {
            Route::get('coupons', 'index');
            Route::match(['post', 'get'], 'coupon/add', 'store');
            Route::match(['post', 'get'], 'coupon/update/{id}', 'update');
            Route::post('coupon/delete/{id}', 'delete');
        });
//////////////// Start Faq Controller ////////////////////
///
        Route::controller(FaqController::class)->group(function () {
            Route::get('faqs', 'index');
            Route::match(['post', 'get'], 'faq/add', 'store');
            Route::match(['post', 'get'], 'faq/update/{id}', 'update');
            Route::post('faq/delete/{id}', 'delete');
        });
/////////////////////// Start Shipping City /////////
///
        Route::controller(ShippingCityController::class)->group(function () {
            Route::get('shipping-city', 'index');
            Route::post('city/add', 'store');
            Route::post('city/update/{id}', 'update');
            Route::post('city/delete/{id}', 'delete');
        });
/////////////////// Start top Navbar settings //////////////
        Route::controller(TopNavBarController::class)->group(function () {
            Route::get('top-navbar', 'index');
            Route::post('top-navbar/add', 'store');
            Route::post('top-navbar/update/{id}', 'update');
            Route::post('top-navbar/delete/{id}', 'delete');
        });
///////////////////////// start Banners ///////////////////////////////
        Route::controller(BannerController::class)->group(function () {
            Route::get('banners', 'index');
            Route::match(['post', 'get'], 'banner/add', 'store');
            Route::match(['post', 'get'], 'banner/update/{id}', 'update');
            Route::post('banner/delete/{id}', 'delete');
        });

///////////////////// Start Order Controller ///////////////
///
        Route::controller(OrderController::class)->group(function () {
            Route::get('orders', 'index');
            Route::post('order/delete/{id}', 'delete');
            Route::match(['post', 'get'], 'order/update/{id}', 'update');
            Route::match(['post', 'get'], 'order/store', 'store');
            Route::get('order/print/{id}', 'print');
            Route::get('orders/archive', 'archive');
        });

////////////////////////// Start Website Color //////////////////////
///
        Route::controller(ColorController::class)->group(function () {
            Route::get('colors', 'index');
            Route::match(['post', 'get'], 'colors/update', 'update');
        });

//////////////////////////////  Start Website Advantage //////////
///
        Route::controller(AdvantageController::class)->group(function () {
            Route::get('advantages', 'index');
            Route::match(['post', 'get'], 'advantage/store', 'store');
            Route::match(['post', 'get'], 'advantage/update/{id}', 'update');
            Route::post('advantage/delete/{id}', 'delete');
        });

//////////////// Start Reviews //////////////////////
///
        Route::controller(ReviewController::class)->group(function () {
            Route::get('reviews', 'index');
            Route::match(['post', 'get'], 'review/store', 'store');
            Route::match(['post', 'get'], 'review/update/{id}', 'update');
            Route::post('review/delete/{id}', 'delete');
        });

//////////////////// Start Offers //////////////////
///
        Route::controller(OfferController::class)->group(function () {
            Route::get('offers', 'index');
            Route::match(['post', 'get'], 'offer/store', 'store');
            Route::match(['post', 'get'], 'offer/update/{id}', 'update');
            Route::post('offer/delete/{id}', 'delete');
        });
/////////////////////////// Start Offer Orders //////////////
///
        Route::controller(OfferOrderController::class)->group(function () {
            Route::get('offer_orders', 'index');
            Route::post('offer_order/delete/{id}', 'delete');
            Route::match(['post', 'get'], 'offer_order/update/{id}', 'update');
            Route::get('offer_order/print/{id}', 'print');
        });
//////////////////////// Start Report Controller /////////////////
///
        Route::controller(ReportController::class)->group(function () {

            Route::get('reports', 'index');

        });
    });
});
