<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\FeatureMainCategory;
use App\Models\admin\FeatureSubCategory;
use Illuminate\Support\Facades\Validator;

class FeatureSubCategoryController extends Controller
{
    use Message_Trait;
    public function index($id)
    {
        $plans = FeatureSubCategory::where('main_category', $id)->orderBy("created_at", "desc")->get();
        $category = FeatureMainCategory::where("id", $id)->first();
        return view("admin.FeatureCategories.SubCategories.index", compact('plans','category'));
    }
    public function store(Request $request,$id)
    {
        $category = FeatureMainCategory::where("id", $id)->first();
        if ($request->isMethod("post")) {
            $data = $request->all();
            $rules = [
                'title' => 'required',
                'title_en' => 'required',
                'price' => 'required',
                'days_number' => 'required',
                'advantagies' => 'required',
                'advantagies_en' => 'required',
                'status' => 'required',

            ];
            $messages = [
                'title.required' => ' من فضلك ادخل العنوان  ',
                'title_en.required' => ' من فضلك ادخل العنوان بالغة الانجليزية  ',
                'price' => ' من فضلك ادخل السعر ',
                'days_number' => ' من فضلك حدد عدد الايام  ',
                'advantagies.required' => ' من فضلك ادخل محتوي الخطة  ',
                'advantagies_en.required' => ' من فضلك ادخل محتوي الخطة  بالغة الانجليزية ',
                'status' => ' من فضلك حدد حالة الخطة  '
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $plan = new FeatureSubCategory();
            $plan->main_category = $id;
            $plan->title = ['ar' => $data['title'], 'en' => $data['title_en']];
            $plan->price = $data['price'];
            $plan->days_number = $data['days_number'];
            $plan->advantagies = ['ar' => $data['advantagies'], 'en' => $data['advantagies_en']];
            $plan->dis_advantagies = ['ar' => $data['dis_advantagies'], 'en' => $data['dis_advantagiesـen']];
            $plan->status = $data['status'];
            $plan->save();

            return $this->success_message(' تمت اضافة الخطة بنجاح  ');
        }

        return view('admin.FeatureCategories.SubCategories.store',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $plan = FeatureSubCategory::find($id); 
        if ($request->isMethod("post")) {
            $data = $request->all();
            // dd( $data);
            $rules = [
                'title' => 'required',
                'title_en' => 'required',
                'price' => 'required',
                'days_number' => 'required',
                'advantagies' => 'required',
                'advantagies_en' => 'required',
                'status' => 'required',

            ];
            $messages = [
                'title.required' => ' من فضلك ادخل العنوان  ',
                'title_en.required' => ' من فضلك ادخل العنوان بالغة الانجليزية  ',
                'price' => ' من فضلك ادخل السعر ',
                'days_number' => ' من فضلك حدد عدد الايام  ',
                'advantagies.required' => ' من فضلك ادخل محتوي الخطة  ',
                'advantagies_en.required' => ' من فضلك ادخل محتوي الخطة  بالغة الانجليزية ',
                'status' => ' من فضلك حدد حالة الخطة  '
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $plan->update([

                //  "title" => ['ar' => $data['title'], 'en' => $data['title_en']],
                'title' => [
                    'ar' => $data['title'],
                    'en' => $data['title_en']
                ],
                "price" => $data['price'],
                'days_number'=>$data['days_number'],
                "advantagies" => ['ar' => $data['advantagies'], 'en' => $data['advantagies_en']],
                "dis_advantagies" => ['ar' => $data['dis_advantagies'], 'en' => $data['dis_advantagiesـen']],
                "status" => $data['status'],
            ]);

            return $this->success_message(' تمت تعديل الخطة بنجاح  ');
        }

        return view('admin.FeatureCategories.SubCategories.update', compact('plan'));
    }
    public function delete($id)
    {
        $plan = FeatureSubCategory::find($id);
        $plan->delete();
        return $this->success_message('تم الحذف بنجاح');
    }
}
