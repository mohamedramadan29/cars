<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use App\Models\admin\FeatureMainCategory;
use Illuminate\Support\Facades\Validator;

class FeatureMainCategoryController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    public function index()
    {
        $main_categories = FeatureMainCategory::orderBy("created_at", "desc")->get();
        return view("admin.FeatureCategories.MainCategories.index", compact('main_categories'));
    }
    public function store(Request $request)
    {
        if ($request->isMethod("post")) {
            $data = $request->all();
            // dd( $data);
            $rules = [
                'name' => 'required',
                'name_en' => 'required',
                'description' => 'required',
                'description_en' => 'required',
                'image' => 'required',

            ];
            $messages = [
                'name.required' => ' من فضلك ادخل العنوان  ',
                'name_en.required' => ' من فضلك ادخل العنوان بالغة الانجليزية  ',
                'description.required' => '  من فضلك ادخل الوصف   ',
                'description_en.required' => '  من فضلك ادخل الوصف باللغة الانجليزية ',
                'image' => '  من فضلك ادخل شكل الاعلان  '
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('image')) {
                $file_name = $this->saveImage($request->image, public_path('assets/uploads/FeatureMainCategories'));
            }
            $main_category = new FeatureMainCategory();
            $main_category->name = ['ar' => $data['name'], 'en' => $data['name_en']];
            $main_category->description = ['ar' => $data['description'], 'en' => $data['description_en']];
            $main_category->adv_shap = $file_name;
            $main_category->save();

            return $this->success_message(' تمت اضافة القسم  بنجاح  ');
        }

        return view('admin.FeatureCategories.MainCategories.store');
    }

    public function update(Request $request, $id)
    {
        $main_category = FeatureMainCategory::find($id);
        if ($request->isMethod("post")) {
            $data = $request->all();
            // dd( $data);
            $rules = [
                'name' => 'required',
                'name_en' => 'required',
                'description' => 'required',
                'description_en' => 'required',
            ];
            $messages = [
                'name.required' => ' من فضلك ادخل العنوان  ',
                'name_en.required' => ' من فضلك ادخل العنوان بالغة الانجليزية  ',
                'description.required' => '  من فضلك ادخل الوصف   ',
                'description_en.required' => '  من فضلك ادخل الوصف باللغة الانجليزية ',
            ];

            if ($request->hasFile('image')) {
                $file_name = $this->saveImage($request->image, public_path('assets/uploads/FeatureMainCategories'));

                ////// / Delete Old Image

                $old_image = public_path('assets/uploads/FeatureMainCategories/' . $main_category['adv_shap']);
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
                $main_category->update([
                    'adv_shap' => $file_name,
                ]);
            }

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $main_category->update([
                //  "title" => ['ar' => $data['title'], 'en' => $data['title_en']],
                'name' => [
                    'ar' => $data['name'],
                    'en' => $data['name_en']
                ],
                "description" => ['ar' => $data['description'], 'en' => $data['description_en']],
            ]);

            return $this->success_message(' تمت تعديل القسم  بنجاح  ');
        }

        return view('admin.FeatureCategories.MainCategories.update', compact('main_category'));
    }
    public function delete($id)
    {
        $main_category = FeatureMainCategory::find($id);
        $main_category->delete();
        return $this->success_message('تم الحذف بنجاح');
    }
}
