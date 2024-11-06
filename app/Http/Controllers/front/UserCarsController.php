<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use Illuminate\Http\Request;

class UserCarsController extends Controller
{
    use Message_Trait;

    public function add_car(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                dd($data);
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.users.cars.add');
    }
}
