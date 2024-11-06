<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Advertisment;
use App\Models\admin\CarImage;
use App\Models\admin\CarMark;
use App\Models\admin\CarModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdvertismentController extends Controller
{
    use Message_Trait;
    use Upload_Images;

    public function index()
    {
        $advs = Advertisment::with('carImages')->get();
        return view('admin.Advertisments.index', compact('advs'));
    }
    public function store(Request $request)
    {
        $marks = CarMark::all();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'c_title' => 'required',
                    'c_years' => 'required',
                    'c_brand' => 'required',
                    'c_model' => 'required',
                    'c_style' => 'required',
                    'c_price' => 'required',
                    'c_trans' => 'required',
                    'c_place' => 'required',
                    'c_stats' => 'required',
                    'c_km' => 'required',
                    'c_fuel' => 'required',
                    'c_type' => 'required',
                    'c_color' => 'required',
                    'c_phone' => 'required',
                    'c_email' => 'required',
                    'c_comfort' => 'required',
                    'c_windows' => 'required',
                    'c_sound' => 'required',
                    'c_safety' => 'required',
                    'c_other' => 'required',
                    'more_info' => 'required',
                    'images' => 'required|array', // التأكد من وجود الصور كمصفوفة
                    'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // التحقق من نوع كل صورة وحجمها
                ];
                $messages = [
                    'c_title.required' => 'من فضلك حدد ::  العنوان ',
                    'c_years.required' => 'من فضلك حدد ::  سنة الصنع ',
                    'c_brand.required' => 'من فضلك حدد ::  الماركة ',
                    'c_model.required' => 'من فضلك حدد ::  الموديل ',
                    'c_style.required' => 'من فضلك حدد :: نمط السيارة ',
                    'c_price.required' => 'من فضلك حدد :: السعر ',
                    'c_trans.required' => 'من فضلك حدد ::  ناقل الحركة ',
                    'c_place.required' => 'من فضلك حدد :: الدولة ',
                    'c_stats.required' => 'من فضلك حدد ::  المدينة ',
                    'c_km.required' => 'من فضلك حدد  ::  الكيلومترات ',
                    'c_fuel.required' => 'من فضلك حدد :: الوقود  ',
                    'c_type.required' => 'من فضلك حدد ::   حالة السيارة ',
                    'c_color.required' => 'من فضلك حدد ::  اللون ',
                    'c_phone.required' => ' من فضلك حدد ::رقم الهاتف  ',
                    'c_email.required' => 'من فضلك حدد ::البريد الالكتروني  ',
                    'c_comfort.required' => ' من فضلك حدد ::وسائل الراحة  ',
                    'c_windows.required' => 'من فضلك حدد ::نوافذ ',
                    'c_sound.required' => 'من فضلك حدد ::نظام الصوت ',
                    'c_safety.required' => 'من فضلك حدد ::وسائل الامان ',
                    'c_other.required' => 'من فضلك حدد ::آخرى ',
                    'images.required' => 'من فضلك حدد :: صور السيارة',
                    'images.array' => 'من فضلك ارفع صور السيارة بشكل صحيح',
                    'images.*.image' => 'كل الملفات يجب أن تكون صوراً فقط',
                    'images.*.mimes' => 'يجب أن تكون الصور بصيغة: jpeg, png, jpg, gif',
                    'images.*.max' => 'حجم كل صورة يجب ألا يتجاوز 2 ميجابايت',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }


                $adv = new Advertisment();
                DB::beginTransaction();
//                $adv->create([
//                    'user_id'=>Auth::guard('admin')->id(),
//                    'c_title'=>['ar'=>$data['c_title'],'en'=>$data['c_en_title']],
//                    'c_years'=>$data['c_years'],
//                    'c_brand'=>$data['c_brand'],
//                    'c_model'=>$data['c_model'],
//                    'c_style'=>$data['c_style'],
//                    'c_price'=>$data['c_price'],
//                    'c_trans'=>$data['c_trans'],
//                    'c_place'=>$data['c_place'],
//                    'c_stats'=>$data['c_stats'],
//                    'c_km'=>$data['c_km'],
//                    'c_fuel'=>$data['c_fuel'],
//                    'c_type'=>$data['c_type'],
//                    'c_color'=>$data['c_color'],
//                    'c_phone'=>$data['c_phone'],
//                    'c_email'=>$data['c_email'],
//                    'c_comfort'=>implode(',', $data['c_comfort']),
//                    'c_windows'=>implode(',', $data['c_windows']),
//                    'c_sound'=>implode(',', $data['c_sound']),
//                    'c_safety'=>implode(',', $data['c_safety']),
//                    'c_other'=>implode(',', $data['c_other']),
//                    'more_info'=>['ar'=>$data['more_info'],'en'=>$data['more_info_en']],
//                ]);
                $adv->user_id = Auth::guard('admin')->id();
                $adv->c_title=['ar' => $data['c_title'], 'en' => $data['c_en_title']];
                    $adv->c_years = $data['c_years'];
                    $adv->c_brand = $data['c_brand'];
                    $adv->c_model = $data['c_model'];
                    $adv->c_style = $data['c_style'];
                    $adv->c_price = $data['c_price'];
                    $adv->c_trans = $data['c_trans'];
                    $adv->c_place = $data['c_place'];
                    $adv->c_stats = $data['c_stats'];
                    $adv->c_km = $data['c_km'];
                    $adv->c_fuel = $data['c_fuel'];
                    $adv->c_type = $data['c_type'];
                    $adv->c_color = $data['c_color'];
                    $adv->c_phone = $data['c_phone'];
                    $adv->c_email = $data['c_email'];
                    $adv->c_comfort = implode(',', $data['c_comfort']);
                    $adv->c_windows = implode(',', $data['c_windows']);
                    $adv->c_sound = implode(',', $data['c_sound']);
                    $adv->c_safety = implode(',', $data['c_safety']);
                    $adv->c_other = implode(',', $data['c_other']);
                    $adv->more_info = ['ar' => $data['more_info'], 'en' => $data['more_info_en']];
                    $adv->save();
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $file_name = $this->saveImage($image, public_path('assets/uploads/CarImages/'.$image));
                        $car_image = new CarImage();
                        $car_image->create([
                            'adv_id' => $adv->id,
                            'c_image' => $file_name,
                        ]);
                    }
                }
                DB::commit();
                return $this->success_message(' تم اضافة الاعلان بنجاح  ');
            } catch (\Exception $e) {
                DB::rollBack();
                return Redirect::back()->withInput()->withErrors(['error' => $e->getMessage()]);
            }
        }
        return view('admin.Advertisments.store',compact('marks'));
    }
}
