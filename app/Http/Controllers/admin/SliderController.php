<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    use Message_Trait;
    use Upload_Images;


    public function index(Request $request)
    {
        $sliders = Slider::all();
        return view("admin.Slider.index", compact("sliders"));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $rules = [
            'page_name' => 'required',
            'image' => 'required|image',
        ];
        $messages = [
            'page_name.required' => ' من فضلك حدد الصفحة  ',
            'image.required' => ' من فضلك حدد الصورة  ',
            'image.image' => ' من فضلك ادخل نوع صورة بشكل صحيح  ',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $file_name = $this->saveImage($request->file('image'), public_path('assets/uploads/Slider'));
        }

        $slider = new Slider();
        $slider->page_name = $data['page_name'];
        $slider->image = $file_name;
        $slider->link = $data['link'];
        $slider->save();
        return $this->success_message(' تم اضافة الاعلان بنجاح  ');
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        if (isset($slider)) {
            try {
                $data = $request->all();
                $rules = [
                    'page_name' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'required|image';
                }
                $messages = [
                    'page_name.required' => ' من فضلك حدد الصفحة  ',
                    'image.required' => ' من فضلك حدد الصورة  ',
                    'image.image' => ' من فضلك ادخل نوع صورة بشكل صحيح  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                if ($request->hasFile('image')) {
                    //////// Delete Old Image
                    $old_image = public_path('assets/uploads/Slider') . $slider->image;
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->file('image'), public_path('assets/uploads/Slider'));
                    $slider->image = $file_name;
                }

                $slider->update([
                    'page_name' => $data['page_name'],
                    'link' => $data['link'],
                    'status' => $data['status']
                ]);
                return $this->success_message(' تم تعديل البانر بنجاح ');
            } catch (\Exception $e) {
                return $this->error_message($e->getMessage());
            }
        }
    }
    public function delete(Request $request, $id)
    {
        $slider = Slider::find($id);
        $old_image = public_path('assets/uploads/Slider') . $slider->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $slider->delete();
        return $this->success_message('تم حذف البانر بنجاح');
    }
}
