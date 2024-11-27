<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use Illuminate\Http\Request;

class FeatureAdsController extends Controller
{
    use Message_Trait;

    public function index(Request $request){
        return view("front.feature-ads");
    }
}
