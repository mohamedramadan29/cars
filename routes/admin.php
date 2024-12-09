<?php

use App\Http\Controllers\front\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SliderController;
use \App\Http\Controllers\admin\AgencyController;
use \App\Http\Controllers\admin\CarMarkController;
use \App\Http\Controllers\admin\CountryController;
use \App\Http\Controllers\admin\ShowRoomController;
use App\Http\Controllers\admin\HeroBannerController;
use \App\Http\Controllers\admin\AgencyRentController;
use \App\Http\Controllers\admin\AutoRepairController;
use \App\Http\Controllers\admin\CarNumbersController;
use App\Http\Controllers\admin\BlogCategoryController;
use \App\Http\Controllers\admin\AdvertismentController;
use \App\Http\Controllers\admin\AgencyBranchController;
use App\Http\Controllers\admin\FeatureMainCategoryController;
use App\Http\Controllers\admin\FeatureSubCategoryController;
use App\Http\Controllers\admin\PlansController;
use App\Http\Controllers\admin\PublicSettingController;
use \App\Http\Controllers\admin\TopicCategoryController;
use \App\Http\Controllers\admin\SubscribtionController;

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
            Route::get('car_mark/models/{id}', 'models');
            Route::post('car_mark/models/store', 'store_models');
            Route::post('car_mark/models/update/{id}', 'update_models');
            Route::post('car_mark/models/delete/{id}', 'delete_model');
        });

        /////////////////////////// Start Agency Controller  ///////////

        Route::controller(AgencyController::class)->group(function () {
            Route::get('agency', 'index');
            Route::match(['post', 'get'], 'agency/add', 'store');
            Route::match(['post', 'get'], 'agency/update/{id}', 'update');
            Route::post('agency/delete/{id}', 'delete');
        });

        //////////////////////////// Start Agency Branch /////////////////
        ///
        Route::controller(AgencyBranchController::class)->group(function () {
            Route::get('agency_branch/{id}', 'index');
            Route::match(['post', 'get'], 'agency_branch/add/{id}', 'store');
            Route::match(['post', 'get'], 'agency_branch/update/{id}', 'update');
            Route::post('agency_branch/delete/{id}', 'delete');
        });
        ///////////////////// Start Show Rooms /////////////////
        ///

        Route::controller(ShowRoomController::class)->group(function () {
            Route::get('showrooms', 'index');
            Route::match(['post', 'get'], 'showroom/add', 'store');
            Route::match(['post', 'get'], 'showroom/update/{id}', 'update');
            Route::post('showroom/delete/{id}', 'delete');
        });

        /////////// Start Car Numbers

        Route::controller(CarNumbersController::class)->group(function () {
            Route::get('car_numbers', 'index');
            Route::match(['post', 'get'], 'car_number/add', 'store');
            Route::match(['post', 'get'], 'car_number/update/{id}', 'update');
            Route::post('car_number/delete/{id}', 'delete');
        });

        //////////// Start AutoRepair
        ///
        Route::controller(AutoRepairController::class)->group(function () {
            Route::get('auto_repairs', 'index');
            Route::match(['post', 'get'], 'auto_repair/add', 'store');
            Route::match(['post', 'get'], 'auto_repair/update/{id}', 'update');
            Route::post('auto_repair/delete/{id}', 'delete');
        });

        //////////// Start TopicCategories
        ///
        Route::controller(TopicCategoryController::class)->group(function () {
            Route::get('topic_category', 'index');
            Route::match(['post', 'get'], 'topic_category/add', 'store');
            Route::match(['post', 'get'], 'topic_category/update/{id}', 'update');
            Route::post('topic_category/delete/{id}', 'delete');
        });

        ///////////////// Start  Advertisements /////////////////////////
        Route::controller(AdvertismentController::class)->group(function () {
            Route::get('advertisements', 'index');
            Route::get('advertisements/under_review', 'under_review');
            Route::get('advertisements/active', 'active');
            Route::match(['post', 'get'], 'adv/add', 'store');
            Route::match(['post', 'get'], 'adv/update/{id}', 'update');
            Route::post('adv/delete/{id}', 'delete');
        });
        /////////////////////////// Start Agency RENT Controller  ///////////
        Route::controller(AgencyRentController::class)->group(function () {
            Route::get('agency_rent', 'index');
            Route::match(['post', 'get'], 'agency_rent/add', 'store');
            Route::match(['post', 'get'], 'agency_rent/update/{id}', 'update');
            Route::post('agency_rent/delete/{id}', 'delete');
        });
        ///////////////// Start Country And State /////////////
        Route::controller(CountryController::class)->group(function () {
            Route::get('countries', 'index');
            Route::match(['post', 'get'], 'country/add', 'store');
            Route::match(['post', 'get'], 'country/update/{id}', 'update');
            Route::post('country/delete/{id}', 'delete');
        });
        //////////////// Start Faq Controller ////////////////////
        Route::controller(FaqController::class)->group(function () {
            Route::get('faqs', 'index');
            Route::match(['post', 'get'], 'faq/add', 'store');
            Route::match(['post', 'get'], 'faq/update/{id}', 'update');
            Route::post('faq/delete/{id}', 'delete');
        });
        ///////////////////  Start Blog Category //////////////////
        Route::controller(BlogCategoryController::class)->group(function () {
            Route::get('blog_category', 'index');
            Route::match(['post', 'get'], 'blog_category/add', 'store');
            Route::match(['post', 'get'], 'blog_category/update/{id}', 'update');
            Route::post('blog_category/delete/{id}', 'delete');
        });
        ///////////////////  Start Blog //////////////////
        Route::controller(BlogController::class)->group(function () {
            Route::get('blogs', 'index');
            Route::match(['post', 'get'], 'blog/add', 'store');
            Route::match(['post', 'get'], 'blog/update/{id}', 'update');
            Route::post('blog/delete/{id}', 'delete');
        });

        Route::controller(SliderController::class)->group(function () {
            Route::get('sliders', 'index');
            Route::match(['post', 'get'], 'slider/add', 'store');
            Route::match(['post', 'get'], 'slider/update/{id}', 'update');
            Route::post('slider/delete/{id}', 'delete');
        });

        #################### Start Hero Banners ###################
        Route::controller(HeroBannerController::class)->group(function () {
            Route::get('banners', 'index');
            Route::match(['post', 'get'], 'banner/add', 'store');
            Route::match(['post', 'get'], 'banner/update/{id}', 'update');
            Route::post('banner/delete/{id}', 'delete');
        });
        ################## Start Subscriptions #########################

        Route::controller(PlansController::class)->group(function () {

            Route::get('plans', 'index');
            Route::match(['post', 'get'], 'plan/add', 'store');
            Route::match(['post', 'get'], 'plan/update/{id}', 'update');
            Route::post('plan/delete/{id}', 'delete');
        });
        ####################### Start Feature Categories ################

        Route::controller(FeatureMainCategoryController::class)->group(function () {
            Route::get('feature-categories', 'index');
            Route::match(['post', 'get'], 'feature-category/add', 'store');
            Route::match(['post', 'get'], 'feature-category/update/{id}', 'update');
            Route::post('feature-category/delete/{id}', 'delete');
        });

        ######################## Start Feature Category Plans ######################
        Route::controller(FeatureSubCategoryController::class)->group(function () {
            Route::get('feature-categories/plans/{id}', 'index');
            Route::match(['post', 'get'], 'feature-categories/plans/add/{id}', 'store');
            Route::match(['post', 'get'], 'feature-categories/plans/update/{id}', 'update');
            Route::post('feature-categories/plans/delete/{id}', 'delete');
        });
    });
});
