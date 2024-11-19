<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Models\admin\CarMark;
use App\Models\admin\TopicCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TopicCategoryController extends Controller
{
    use Message_Trait;
    use Slug_Trait;

    public function index()
    {
        $categories = TopicCategory::all();
        return view('admin.Topics.Categories.index',compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                'name'=>'required',
                'name_en'=>'required'
            ];
            $messages = [
                'name.required'=>' من فضلك ادخل الاسم  ',
                'name_en.required'=>' من فضلك ادخل الاسم باللغة الانجليزية  '
            ];
            $validator = Validator::make($data,$rules,$messages);
            if ($validator->fails()){
                return Redirect::back()->withInput()->withErrors($validator);
            }
            $category = new TopicCategory();
            $category->create([
                'name'=>['ar'=>$data['name'],'en'=>$data['name_en']],
                'slug'=>$this->CustomeSlug($data['name']),
            ]);
            return $this->success_message(' تم اضافة القسم بنجاح  ');
        }catch (\Exception $e){
            return $this->exception_message($e);
        }
    }

    public function update(Request $request,$id)
    {
        $category = TopicCategory::findORFail($id);
        try {
            $data = $request->all();
            $rules = [
                'name'=>'required',
                'name_en'=>'required'
            ];
            $messages = [
                'name.required'=>' من فضلك ادخل الاسم  ',
                'name_en.required'=>' من فضلك ادخل الاسم باللغة الانجليزية  '
            ];
            $validator = Validator::make($data,$rules,$messages);
            if ($validator->fails()){
                return Redirect::back()->withInput()->withErrors($validator);
            }
            $category->update([
                'name'=>['ar'=>$data['name'],'en'=>$data['name_en']],
                'slug'=>$this->CustomeSlug($data['name']),
            ]);
            return $this->success_message(' تم تعديل  القسم بنجاح  ');
        }catch (\Exception $e){
            return $this->exception_message($e);
        }
    }
    public function delete($id)
    {
        try {
            $category = TopicCategory::findOrFail($id);
            $category->delete();
            return $this->success_message('تم الحذف بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }

}
