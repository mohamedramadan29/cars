<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\CarMark;
use App\Models\admin\CarModels;
use Illuminate\Http\Request;

class UserCarsController extends Controller
{
    use Message_Trait;

    public function add_car(Request $request)
    {
        $marks = CarMark::all();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                dd($data);
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.users.cars.add',compact('marks'));
    }

    public function getModels($brandid)
    {
        $models = CarModels::where('mark_id',$brandid)->get();
        return response()->json($models);
    }
}
