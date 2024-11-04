<?php

use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\front\FrontController::class)->group(function (){
   Route::get('/','index');
    Route::get('agency','agencies');
    Route::get('agency/{slug}','agency_details');
    /////////// Show Rooms
    ///
    Route::get('showrooms','showrooms');
    Route::get('showrooms/{slug}','showroom_details');
    ////////// Show Rent
    ///
    Route::get('rent','rent');
    Route::get('rent/details','rent_details');

    ///////////// Start Car Numbers //////
    ///
    Route::get('car_numbers','car_numbers');

    /////////// Start Auto Repairs /////////
    ///
    Route::get('auto-repair','auto_repair');
    Route::get('auto_repair/{slug}','repair_details');

});

include 'admin.php';
