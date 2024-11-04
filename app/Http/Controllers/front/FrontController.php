<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Agency;
use App\Models\admin\AgencyBranch;
use App\Models\admin\AutoRepair;
use App\Models\admin\CarMark;
use App\Models\admin\CarNumber;
use App\Models\admin\ShowRoom;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $marks = CarMark::all();
        return view('front.index',compact('marks'));
    }
    public function agencies()
    {
        $agencies = Agency::with('branches')->get();
        return view('front.agency',compact('agencies'));
    }
    public function agency_details($slug)
    {
        $agency = Agency::where('slug',$slug)->with('branches','advs')->first();
       // dd($agency);
        return view('front.agency_details',compact('agency'));
    }

    public function showrooms()
    {
        $rooms = ShowRoom::all();
        return view('front.showrooms',compact('rooms'));
    }

    public function showroom_details($slug)
    {
        $room = ShowRoom::where('slug',$slug)->with('advs')->first();
        return view('front.room_details',compact('room'));
    }

    //////////// Start Rent
    ///
    public function rent()
    {

    }

    ///////////////// Start Car Numbers
    ///
    public function car_numbers()
    {
        $numbers = CarNumber::all();
        return view('front.car_numbers',compact('numbers'));
    }
    ///////////////// Start Auto Repairs
    ///
    public function auto_repair()
    {
        $repairs = AutoRepair::all();
        return view('front.auto_repairs',compact('repairs'));
    }
    public function repair_details($slug)
    {
        $repair = AutoRepair::where('slug',$slug)->first();
        return view('front.repair_details',compact('repair'));
    }
}
