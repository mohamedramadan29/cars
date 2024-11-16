<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\admin\AutoRepair;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class UserCenterController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $repairs = AutoRepair::where('user_id',Auth::id())->get();
        return view('front.users.centers.index',compact('repairs'));
    }

    public function store(Request $request)
    {
        $citizen = State::all();

        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'work_time' => 'required',
                    'phone' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/AutoRepair'));
                }

                $repair = new AutoRepair();
                $repair->create([
                    'user_id'=>Auth::id(),
                    'name' => ['ar' => $data['name'], 'en' => $data['name']],
                    'slug' => $this->CustomeSlug($data['name']),
                    'logo' => $file_name,
                   // 'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address']],
                    'desc' => ['ar' => $data['desc'], 'en' => $data['desc']],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time']],
                    'phone' => $data['phone'],
                ]);

                return $this->success_message(' تم اضافة المركز بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.users.centers.store', compact('citizen'));
    }


    public function update(Request $request, $id)
    {

        $repair = AutoRepair::findOrFail($id);

        $citizen = State::all();
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                  //  'name_en' => 'required',
                    //'country' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                   // 'address_en' => 'required',
                    'work_time' => 'required',
                   // 'work_time_en' => 'required',
                    'phone' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                  //  'name_en.required' => ' من فضلك ادخل الاسم  باللغة الانجليزية  ',
                  //  'country.required' => ' من فضلك حدد الدولة  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                 //   'address_en.required' => ' من فضلك  ادخل العنوان باللغة الانجليزية  ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                 //   'work_time_en.required' => ' من فضلك ادخل توقيت العمل باللعة الانجليزية  ',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف  ',

                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                if ($request->hasFile('image')) {
                    /////// Delete Old Image
                    $old_image = public_path('assets/uploads/AutoRepair/' . $repair['logo']);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/AutoRepair'));
                    $repair->update([
                        'logo' => $file_name,
                    ]);
                }

                $repair->update([
                    'name' => ['ar' => $data['name'], 'en' => $data['name']],
                    'slug'=>$this->CustomeSlug($data['name']),
                  //  'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address']],
                    'desc' => ['ar' => $data['desc'], 'en' => $data['desc']],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time']],
                    'phone' => $data['phone'],
                ]);
                return $this->success_message(' تم تعديل المركز بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('front.users.centers.update',compact('repair','citizen'));
    }
}
