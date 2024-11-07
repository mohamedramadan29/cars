<?php

use App\Http\Controllers\front\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\front\UserCarsController;

Route::controller(\App\Http\Controllers\front\FrontController::class)->group(function () {
    Route::get('/', 'index');
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

    ///////////// Start Car Numbers //////
    ///
    Route::get('car_numbers', 'car_numbers');

    /////////// Start Auto Repairs /////////
    ///
    Route::get('auto-repair', 'auto_repair');
    Route::get('auto_repair/{slug}', 'repair_details');

    //////////////// Start Forums ///////
    ///
    Route::get('forums', 'forums');

    /////////////////
    ///
    Route::get('create-car', 'create_car');

});

/////////////////////////// User Controller //////////////////////
///
Route::controller(UserController::class)->group(function () {
    Route::match(['post', 'get'], 'login', 'login')->name('login');
    Route::get('register', 'register');
    Route::post('user/register', 'register');
    Route::get('user/confirm/{code}', 'UserConfirm');
    /////// Forget Password
    ///
    Route::match(['post', 'get'], 'forget-password', 'forget_password');
    Route::match(['post', 'get'], 'user/change-forget-password/{code}', 'change_forget_password');
    Route::post('user/update_forget_password', 'update_forget_password');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('user/dashboard', 'index');

        Route::match(['get', 'post'], 'user/update', 'update_data');
        Route::get('user/alerts', 'alerts');
        Route::match(['post', 'get'], 'user/change-password', 'change_password');
        Route::get('user/logout', 'logout');
        Route::get('user/alert/delete/{id}', 'delete_alert');
        Route::get('/user/get-jobs-by-category/{categoryId}', 'getJobsByCategory');
        Route::get('/user/get-specialist-by-category/{categoryId}', 'getSpecialistByCategory');
    });
    Route::match(['post', 'get'], 'forget-password', 'forget_password');
});

Route::controller(UserCarsController::class)->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::match(['post', 'get'], 'user/car/add', 'add_car');

        Route::get('getModels/{brandid}', 'getModels');
    });
});

include 'admin.php';
