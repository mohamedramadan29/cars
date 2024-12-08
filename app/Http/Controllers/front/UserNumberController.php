<?php

namespace App\Http\Controllers\front;

use App\Models\admin\State;
use Illuminate\Http\Request;
use App\Models\admin\Country;
use App\Models\admin\CarNumber;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserNumberController extends Controller
{

    use Message_Trait;
    use Upload_Images;
    public function index()
    {
        $numbers = CarNumber::where('user_id', Auth::id())->get();
        return view('front.users.numbers.index', compact('numbers'));
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            try {

                $data = $request->all();
                $rules = [
                    'car_number' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'price' => 'required',
                    'phone' => 'required',
                    'owner_name' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'user.required' => ' من فضلك حدد المستخدم   ',
                    'country.required' => ' من فضلك حدد المدينة   ',
                    'city.required' => ' من فضلك حدد المنطقة    ',
                    'price.required' => ' من فضلك ادخل السعر   ',
                    'phone.required' => ' من فضلك  ادخل رقم الهاتف  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                    'owner_name.required' => ' من فضلك حدد اسم المالك  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/CarNumbers'));
                }
                $number = new CarNumber();
                $number->create([
                    'user_id' => Auth::id(),
                    'car_number' => $data['car_number'],
                    'logo' => $file_name,
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'price' => $data['price'],
                    'phone' => $data['phone'],
                    'owner_name' => $data['owner_name'],
                ]);

                return $this->success_message(' تم اضافة الرقم  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        $citizen = State::all();
        $countries = Country::all();
        return view('front.users.numbers.add', compact('citizen', 'countries'));
    }


    public function update(Request $request, $id)
    {

        $number = CarNumber::findOrFail($id);
        $countries = Country::all();
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'car_number' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'price' => 'required',
                    'phone' => 'required',
                    'owner_name' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [

                    'country.required' => ' من فضلك حدد المدينة   ',
                    'city.required' => ' من فضلك حدد المنطقة    ',
                    'price.required' => ' من فضلك ادخل السعر   ',
                    'phone.required' => ' من فضلك  ادخل رقم الهاتف  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if ($request->hasFile('image')) {
                    /////// Delete Old Image
                    $old_image = public_path('assets/uploads/CarNumbers/' . $number['logo']);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/CarNumbers'));
                    $number->update([
                        'logo' => $file_name,
                    ]);
                }
                $number->update([
                    'user_id' => Auth::id(),
                    'car_number' => $data['car_number'],
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'price' => $data['price'],
                    'phone' => $data['phone'],
                    'owner_name' => $data['owner_name'],
                ]);

                return $this->success_message(' تم تعديل  الرقم  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        $citizen = State::all();
        return view('front.users.numbers.update', compact('number', 'citizen', 'countries'));
    }
}
