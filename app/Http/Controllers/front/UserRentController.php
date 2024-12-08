<?php

namespace App\Http\Controllers\front;

use App\Models\admin\State;
use Illuminate\Http\Request;
use App\Models\admin\Country;
use App\Http\Traits\Slug_Trait;
use App\Models\admin\AgencyRent;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserRentController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $rent = AgencyRent::where('user_id', Auth::id())->get();
        return view('front.users.rent.index', compact('rent'));
    }
    public function store(Request $request)
    {
        $citizen = State::all();
        $countries = Country::all();
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    // 'name_en' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    // 'address_en' => 'required',
                    'car_status' => 'required',
                    'work_time' => 'required',
                    //'work_time_en' => 'required',
                    'phone' => 'required',
                    'email' => 'required'
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                    // 'name_en.required' => ' من فضلك ادخل الاسم  باللغة الانجليزية  ',
                    'country.required' => ' من فضلك حدد المدينة   ',
                    'city.required' => ' من فضلك حدد المنطقة    ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                    //'address_en.required' => ' من فضلك  ادخل العنوان باللغة الانجليزية  ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                    // 'work_time_en.required' => ' من فضلك ادخل توقيت العمل باللعة الانجليزية  ',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                    'email.required' => ' من فضلك ادخل البريد الالكتروني  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/AgencyRent'));
                }

                $agency = new AgencyRent();
                $agency->create([
                    'user_id' => Auth::id(),
                    'name' => ['ar' => $data['name'], 'en' => $data['name']],
                    'slug' => $this->CustomeSlug($data['name']),
                    'logo' => $file_name,
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address']],
                    'desc' => ['ar' => $data['desc'], 'en' => $data['desc']],
                    'car_status' => $data['car_status'],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time']],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'phone2' => $data['phone2'],
                    'website' => $data['website'],
                    'facebook_link' => $data['facebook_link'],
                    'twitter_link' => $data['twitter_link'],
                    'instagram_link' => $data['instagram_link'],
                ]);

                return $this->success_message(' تم اضافة المكتب   بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.users.rent.store', compact('citizen', 'countries'));
    }

    public function update(Request $request, $id)
    {

        $agency = AgencyRent::findOrFail($id);
        $countries = Country::all();
        $citizen = State::all();
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    //'name_en' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    //  'address_en' => 'required',
                    'car_status' => 'required',
                    'work_time' => 'required',
                    // 'work_time_en' => 'required',
                    'phone' => 'required',
                    'email' => 'required'
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                    // 'name_en.required' => ' من فضلك ادخل الاسم  باللغة الانجليزية  ',
                    'country.required' => ' من فضلك حدد المدينة   ',
                    'city.required' => ' من فضلك حدد المنطقة    ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                    // 'address_en.required' => ' من فضلك  ادخل العنوان باللغة الانجليزية  ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                    // 'work_time_en.required' => ' من فضلك ادخل توقيت العمل باللعة الانجليزية  ',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                    'email.required' => ' من فضلك ادخل البريد الالكتروني  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                if ($request->hasFile('image')) {
                    /////// Delete Old Image
                    $old_image = public_path('assets/uploads/Agency/' . $agency['logo']);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Agency'));
                    $agency->update([
                        'logo' => $file_name,
                    ]);
                }

                $agency->update([
                    'name' => ['ar' => $data['name'], 'en' => $data['name']],
                    'slug' => $this->CustomeSlug($data['name']),
                     'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address']],
                    'desc' => ['ar' => $data['desc'], 'en' => $data['desc']],
                    'car_status' => $data['car_status'],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time']],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'phone2' => $data['phone2'],
                    'website' => $data['website'],
                    'facebook_link' => $data['facebook_link'],
                    'twitter_link' => $data['twitter_link'],
                    'instagram_link' => $data['instagram_link'],
                ]);
                return $this->success_message(' تم تعديل المكتب   بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('front.users.rent.update', compact('agency', 'citizen','countries'));
    }
}
