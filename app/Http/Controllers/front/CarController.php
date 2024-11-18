<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Advertisment;
use App\Models\admin\CarMark;
use App\Models\admin\CarModels;
use App\Models\admin\State;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getCarModels($brandid)
    {
        $models = CarModels::where('mark_id', $brandid)->get();
        return response()->json($models);
    }

    public function AdvDetails($id, $slug)
    {
        $car = Advertisment::with('carImages', 'carMark', 'City','carBrand','User')->where('id', $id)->where('slug', $slug)->first();
        $advs = Advertisment::with('carImages', 'carMark', 'City','carBrand','User')->where('c_brand',$car['c_brand'])->where('id','!=',$car['id'])->latest()->limit(6)->get();
        if ($car) {
            return view('front.car_details', compact('car','advs'));
        }
        abort(404);
    }

    public function newCars(Request $request)
    {
        $marks = CarMark::all();
        $advs = Advertisment::with('carImages', 'carMark', 'City')->where('c_type', 1)->limit(10)->get();
        $lastadvs = Advertisment::with('carImages', 'carMark', 'City')->where('c_type', 1)->latest()->paginate(10);
        $citizen = State::all();
        if ($request->ajax()) {
            if ($lastadvs->isEmpty()) {
                return ''; // إذا انتهت الإعلانات، أعد استجابة فارغة
            }
            return view('front.partials.ads', compact('lastadvs'))->render();
        }
        return view('front.new_car', compact('advs', 'lastadvs', 'marks', 'citizen'));
    }
    public function UsedCars(Request $request)
    {
        $marks = CarMark::all();
        $advs = Advertisment::with('carImages', 'carMark', 'City')->where('c_type', 2)->limit(10)->get();
        $lastadvs = Advertisment::with('carImages', 'carMark', 'City')->where('c_type', 2)->latest()->paginate(10);
        $citizen = State::all();
        if ($request->ajax()) {
            if ($lastadvs->isEmpty()) {
                return ''; // إذا انتهت الإعلانات، أعد استجابة فارغة
            }
            return view('front.partials.ads', compact('lastadvs'))->render();
        }
        return view('front.used_cars', compact('advs', 'lastadvs', 'marks', 'citizen'));
    }
    public function BrandCars(Request $request,$slug)
    {

        $brand = CarMark::with('Models')->where('slug',$slug)->first();
        if ($brand){
            $marks = CarMark::all();
            $advs = Advertisment::with('carImages', 'carMark', 'City')->where('c_brand', $brand['id'])->limit(10)->get();
            $lastadvs = Advertisment::with('carImages', 'carMark', 'City')->where('c_brand', $brand['id'])->latest()->paginate(10);
            $citizen = State::all();
            return view('front.brand',compact('brand','advs', 'lastadvs', 'marks', 'citizen'));
        }
        abort(404);
    }

    public function search(Request $request)
    {
        // استقبال بيانات البحث
        $query = Advertisment::query();
        $marks = CarMark::all();
        $citizen = State::all();
        if ($request->filled('c_brand')) {
            $query->where('c_brand', $request->c_brand);
        }

        if ($request->filled('c_model')) {
            $query->where('c_model', $request->c_model);
        }

        if ($request->filled('city')) {
            $query->where('c_stats', $request->city);
        }

        if ($request->filled('years')) {
            $query->where('c_years', $request->years);
        }

        if ($request->filled('fuel')) {
            $query->where('c_fuel', $request->fuel);
        }

        if ($request->filled('color')) {
            $query->where('c_color', $request->color);
        }

        if ($request->filled('class')) {
            $query->where('c_style', $request->class);
        }

        if ($request->filled('km')) {
            // قم بتعيين منطق نطاق الكيلومترات
            $query->where('c_km', $request->km);
        }

        if ($request->filled('pricemin') || $request->filled('pricemax')) {
            $query->whereBetween('c_price', [$request->pricemin, $request->pricemax]);
        }

        if ($request->filled('typecar')) {
            // إذا لم يكن النوع "كلاهما"
            if ($request->typecar != 0) {
                // `is_new` يكون 1 للسيارات الجديدة و 0 للسيارات المستعملة
                $isNew = $request->typecar == 1 ? 1 : 2;
                $query->where('c_type', $isNew);
            }
        }


        $lastadvs = $query->with('carImages', 'carMark', 'City')->paginate(10);


        return view('front.search_results', compact('lastadvs', 'marks', 'citizen'));
    }
}
