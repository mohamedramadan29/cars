<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Advertisment;
use App\Models\admin\Agency;
use App\Models\admin\AgencyBranch;
use App\Models\admin\AgencyRent;
use App\Models\admin\AutoRepair;
use App\Models\admin\Blog;
use App\Models\admin\CarMark;
use App\Models\admin\CarNumber;
use App\Models\admin\Faq;
use App\Models\admin\ShowRoom;
use App\Models\admin\TopicCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $marks = CarMark::all();
        $query = Blog::query();
        $new_advs = Advertisment::with('carImages', 'carMark', 'City')->where('c_type', 1)->limit(10)->get();
        $old_advs = Advertisment::with('carImages', 'carMark', 'City')->where('c_type', 2)->limit(10)->get();
        $random_advs = Advertisment::with('carImages', 'carMark', 'City')->inRandomOrder()->limit(10)->get();
        $lastblog = $query->latest()->limit(1)->first();
        $lastblogs = $query->latest()->limit(4)->where('id', '!=', $lastblog['id'])->get();
        $lastFourPosts = $query->limit(4)->get();
        $randomposts = $query->inRandomOrder()->limit(4)->get();
        return view('front.index',compact('marks','new_advs','old_advs','random_advs','lastblog','lastblogs','lastFourPosts','randomposts'));
    }
    public function agencies()
    {
        $agencies = Agency::with('branches','City','advs')->get();
        //dd($agencies);
        $marks = CarMark::all();
        return view('front.agency',compact('agencies','marks'));
    }
    public function agency_details($slug)
    {
        $agency = Agency::where('slug',$slug)->with('branches','advs','City')->first();
       // dd($agency);
        return view('front.agency_details',compact('agency'));
    }

    public function showrooms()
    {
        $rooms = ShowRoom::all();
        $marks = CarMark::all();
        return view('front.showrooms',compact('rooms','marks'));
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
        $agencies = AgencyRent::all();
        return view('front.rent',compact('agencies'));
    }

    public function rent_details($slug)
    {
        $rent = AgencyRent::where('slug',$slug)->with('advs')->first();
        return view('front.rent_details',compact('rent'));
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


    //////////////////// Start Forums //////////////////
    ///
    public function forums()
    {
        $categories = TopicCategory::all();
        return view('front.forums' ,compact('categories'));

    }
    /////////////////////// Create Car Not Login ////////
    public function create_car()
    {
        return view('front.create_car');
    }
    ////////////////// Start Faq

    public function faq(){
        $faqs = Faq::all();
        return view('front.faq',compact('faqs'));
    }

    /////////// Start About us
    public function aboutus()
    {
        return view('front.aboutus');
    }

    /////////// اعلن معنا
    public function pub()
    {
        return view('front.pub');
    }
    ///////// Terms
    ///
    public function terms()
    {
        return view('front.terms');
    }
    //////// Privacy
    ///
    public function privacy()
    {
        return view('front.privacy');
    }
}
