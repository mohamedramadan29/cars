<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\State;
use App\Models\front\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuctionController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $auctions = Auction::where('user_id',Auth::id())->get();
        return view('front.users.auctions.index',compact('auctions'));
    }
    public function store(Request $request)
    {
        $citizen = State::all();

        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    // 'name_en' => 'required',
                    // 'country' => 'required',
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
                    // 'country.required' => ' من فضلك حدد الدولة  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
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
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Auctions'));
                }

                $auction = new Auction();
                $auction->create([
                    'user_id'=>Auth::id(),
                    'name' => ['ar' => $data['name'], 'en' => $data['name']],
                    'slug'=>$this->CustomeSlug($data['name']),
                    'logo' => $file_name,
                    // 'country' => $data['country'],
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
        return view('front.users.auctions.store', compact('citizen'));
    }

    public function update(Request $request, $id)
    {

        $auction = Auction::findOrFail($id);

        $citizen = State::all();
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    //'name_en' => 'required',
                    // 'country' => 'required',
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
                    // 'country.required' => ' من فضلك حدد الدولة  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
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
                    $old_image = public_path('assets/uploads/Auctions/' . $auction['logo']);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Auctions'));
                    $auction->update([
                        'logo' => $file_name,
                    ]);
                }

                $auction->update([
                    'name' => ['ar' => $data['name'], 'en' => $data['name']],
                    'slug'=>$this->CustomeSlug($data['name']),
                    //  'country' => $data['country'],
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

        return view('front.users.auctions.update',compact('auction','citizen'));
    }
}
