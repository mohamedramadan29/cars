<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\CarMark;
use App\Models\admin\CarModels;
use Illuminate\Http\Request;

class CarMarkController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $marks = CarMark::all();
        return view('admin.CarMarks.index',compact('marks'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                //dd($data);
                $rules = [
                    'name' => 'required',
                    'name_en'=>'required',
                    'description'=>'required',
                    'description_en'=>'required',
                ];
                if ($request->hasFile('image')){
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $custome_messages = [
                    'name.required' => 'من فضلك ادخل  الاسم  ',
                    'name_en.required' => 'من فضلك ادخل  الاسم باللغة الانجليزية  ',
                    'description.required'=>' من فضلك ادخل الوصف  ',
                    'description_en.required'=>' من فضلك ادخل الوصف باللغة الانجليزية  ',
                    'image.image'=>' من فضلك ادخل صورة فقط ',
                    'image.mimes'=> ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $this->validate($request, $rules, $custome_messages);
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Marks'));
                }
                $mark = new CarMark();
                $mark->name = ['ar'=>$request['name'],'en'=>$request['name_en']];
                $mark->slug = $this->CustomeSlug($data['name']);
                $mark->description = ['ar'=>$request['description'],'en'=>$request['description_en']];
                $mark->logo = $file_name;
                $mark->save();
                return $this->success_message(' تم اضافه الماركة  بنجاح ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.CarMarks.add');
    }

    public function update(Request $request,$id)
    {
        $mark = CarMark::findOrFail($id);
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'name_en'=>'required',
                    'description'=>'required',
                    'description_en'=>'required',
                ];
                if ($request->hasFile('image')){
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $custome_messages = [
                    'name.required' => 'من فضلك ادخل  الاسم  ',
                    'name_en.required' => 'من فضلك ادخل  الاسم باللغة الانجليزية  ',
                    'description.required'=>' من فضلك ادخل الوصف  ',
                    'description_en.required'=>' من فضلك ادخل الوصف باللغة الانجليزية  ',
                    'image.image'=>' من فضلك ادخل صورة فقط ',
                    'image.mimes'=> ' نوع الصورة فقط jpg, png , jpeg , webp ',
                ];
                $this->validate($request, $rules, $custome_messages);
                if ($request->hasFile('image')) {
                    /////// Delete Old Image
                    $old_image = public_path('assets/uploads/Marks/'.$mark['logo']);
                    if (file_exists($old_image)){
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Marks'));

                    $mark->update([
                        'logo'=>$file_name,
                    ]);
                }
                $mark->update([
                    'name'=> ['ar'=>$request['name'],'en'=>$request['name_en']],
                    'slug' => $this->CustomeSlug($data['name']),
                    'description'=> ['ar'=>$request['description'],'en'=>$request['description_en']],

                ]);
                return $this->success_message(' تم التعديل   بنجاح ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.CarMarks.update',compact('mark'));
    }

    public function delete($id)
    {
        try {
            $mark = CarMark::findOrFail($id);
            $old_image = public_path('assets/uploads/Marks/'.$mark['logo']);
            if (file_exists($old_image)){
                unlink($old_image);
            }
            $mark->delete();
            return $this->success_message('تم الحذف بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }

    public function models($id)
    {
        $mark = CarMark::findOrFail($id);
        $models = CarModels::where('mark_id',$mark['id'])->get();
        return view('admin.CarMarks.models',compact('mark','models'));
    }

    public function store_models(Request $request)
    {
        try {
        $data = $request->all();
        $car_model = new CarModels();
        $car_model->create([
            'mark_id'=>$data['mark_id'],
            'name'=>['ar'=>$request['model_name'],'en'=>$request['model_name_en']]
        ]);
        return $this->success_message(' تم الاضافة بنجاح  ');
        }catch (\Exception $e){
            return $this->exception_message($e);
        }

    }

    public function update_models(Request $request,$id)
    {
        $model = CarModels::findOrFail($id);
        try {
            $data = $request->all();
            $model->update([
                'mark_id'=>$data['mark_id'],
                'name'=>['ar'=>$request['model_name'],'en'=>$request['model_name_en']]
            ]);
            return $this->success_message(' تم التعديل  بنجاح  ');
        }catch (\Exception $e){
            return $this->exception_message($e);
        }

    }
    public function delete_model($id)
    {
        try {
            $model = CarModels::findOrFail($id);
            $model->delete();
            return $this->success_message('تم الحذف بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }
}
