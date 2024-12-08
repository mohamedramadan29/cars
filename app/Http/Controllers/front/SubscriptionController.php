<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Models\admin\Subscribtion;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index(){
        $subscriptions = Subscribtion::where('status',1)->get();
        return view('front.subscription',compact('subscriptions'));
    }
}
