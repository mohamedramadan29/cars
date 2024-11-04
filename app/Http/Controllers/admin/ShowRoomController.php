<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Agency;
use App\Models\admin\ShowRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShowRoomController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $rooms = ShowRoom::all();
        return view('admin.ShowRooms.index', compact('rooms'));
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'name_en' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'address_en' => 'required',
                    'car_status' => 'required',
                    'work_time' => 'required',
                    'work_time_en' => 'required',
                    'phone' => 'required',
                    'email' => 'required'
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                    'name_en.required' => ' من فضلك ادخل الاسم  باللغة الانجليزية  ',
                    'country.required' => ' من فضلك حدد الدولة  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                    'address_en.required' => ' من فضلك  ادخل العنوان باللغة الانجليزية  ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                    'work_time_en.required' => ' من فضلك ادخل توقيت العمل باللعة الانجليزية  ',
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
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/ShowRooms'));
                }

                $room = new ShowRoom();

                $room->create([
                    'name' => ['ar' => $data['name'], 'en' => $data['name_en']],
                    'slug'=>$this->CustomeSlug($data['name']),
                    'logo' => $file_name,
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address_en']],
                    'desc' => ['ar' => $data['desc'], 'en' => $data['desc_en']],
                    'car_status' => $data['car_status'],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time_en']],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'phone2' => $data['phone2'],
                    'website' => $data['website'],
                    'facebook_link' => $data['facebook_link'],
                    'twitter_link' => $data['twitter_link'],
                    'instagram_link' => $data['instagram_link'],
                ]);

                return $this->success_message(' تم اضافة المعرض  بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }

        }
        return view('admin.ShowRooms.add');

    }


    public function update(Request $request, $id)
    {

        $room = ShowRoom::findOrFail($id);


        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    'name_en' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'address_en' => 'required',
                    'car_status' => 'required',
                    'work_time' => 'required',
                    'work_time_en' => 'required',
                    'phone' => 'required',
                    'email' => 'required'
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                    'name_en.required' => ' من فضلك ادخل الاسم  باللغة الانجليزية  ',
                    'country.required' => ' من فضلك حدد الدولة  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                    'address_en.required' => ' من فضلك  ادخل العنوان باللغة الانجليزية  ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                    'work_time_en.required' => ' من فضلك ادخل توقيت العمل باللعة الانجليزية  ',
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
                    $old_image = public_path('assets/uploads/ShowRooms/' . $room['logo']);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Agency'));
                    $room->update([
                        'logo' => $file_name,
                    ]);
                }

                $room->update([
                    'name' => ['ar' => $data['name'], 'en' => $data['name_en']],
                    'slug'=>$this->CustomeSlug($data['name']),
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address_en']],
                    'desc' => ['ar' => $data['desc'], 'en' => $data['desc_en']],
                    'car_status' => $data['car_status'],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time_en']],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'phone2' => $data['phone2'],
                    'website' => $data['website'],
                    'facebook_link' => $data['facebook_link'],
                    'twitter_link' => $data['twitter_link'],
                    'instagram_link' => $data['instagram_link'],
                ]);
                return $this->success_message(' تم تعديل المعرض  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.ShowRooms.update', compact('room'));
    }

    public function delete($id)
    {
        try {
            $room =ShowRoom::findOrFail($id);
            $old_image = public_path('assets/uploads/ShowRooms/'.$room['logo']);
            if (file_exists($old_image)){
                unlink($old_image);
            }
            $room->delete();
            return $this->success_message('تم الحذف بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }

}
