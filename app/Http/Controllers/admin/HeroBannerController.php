<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\HeroBanner;
use Illuminate\Http\Request;

class HeroBannerController extends Controller
{
    use Message_Trait;
    use Upload_Images;

    public function index()
    {
        $banners = HeroBanner::all();
        return view("admin.HeroBanner.index", compact("banners"));
    }

    public function store(Request $request)
    {
        if ($request->isMethod("post")) {
            try {
                $data = $request->all();
                //dd($data);
                $rules = [
                    'title' => 'required',
                    'title_en' => 'required',
                    'desc' => 'required',
                    'desc_en' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $custome_messages = [
                    'title.required' => 'من فضلك ادخل  العنوان  ',
                    'title_en.required' => 'من فضلك ادخل  العنوان باللغة الانجليزية  ',
                    'desc.required' => ' من فضلك ادخل الوصف  ',
                    'desc_en.required' => ' من فضلك ادخل الوصف باللغة الانجليزية  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $this->validate($request, $rules, $custome_messages);
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Banners'));
                }
                $banner = new HeroBanner();
                $banner->title = ['ar' => $request['title'], 'en' => $request['title_en']];
                $banner->desc = ['ar' => $request['desc'], 'en' => $request['desc_en']];
                $banner->image = $file_name;
                $banner->page = $request->page;
                $banner->save();
                return $this->success_message(' تم اضافه البانر   بنجاح ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }


        return view('admin.HeroBanner.store');
    }

    public function update(Request $request,  $id)
    {
        $banner = HeroBanner::findOrFail($id);

        if ($request->isMethod("post")) {
            try {
                $data = $request->all();
                //dd($data);
                $rules = [
                    'title' => 'required',
                    'title_en' => 'required',
                    'desc' => 'required',
                    'desc_en' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $custome_messages = [
                    'title.required' => 'من فضلك ادخل  العنوان  ',
                    'title_en.required' => 'من فضلك ادخل  العنوان باللغة الانجليزية  ',
                    'desc.required' => ' من فضلك ادخل الوصف  ',
                    'desc_en.required' => ' من فضلك ادخل الوصف باللغة الانجليزية  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $this->validate($request, $rules, $custome_messages);
                if ($request->hasFile('image')) {
                    ////////// Delete Old Image
                    $old_image = public_path('assets/uploads/Banners' . $banner->image);
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Banners'));
                    $banner->image = $file_name;
                }
                $banner->update([
                    'title' => ['ar' => $request['title'], 'en' => $request['title_en']],
                    'desc' => ['ar' => $request['desc'], 'en' => $request['desc_en']],
                    'page' => $request->page,
                ]);
                return $this->success_message(' تم تعديل البانر   بنجاح ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.HeroBanner.update', compact('banner'));
    }
    public function delete(Request $request, $id)
    {
        $banner = HeroBanner::find($id);
        $old_image = public_path('assets/uploads/Banners') . $banner->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $banner->delete();
        return $this->success_message('تم حذف البانر بنجاح');
    }
}
