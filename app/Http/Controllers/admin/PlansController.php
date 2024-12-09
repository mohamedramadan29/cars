<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use App\Models\admin\Subscribtion;
use Illuminate\Support\Facades\Validator;

class PlansController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $plans = Subscribtion::orderBy("created_at","desc")->get();
        return view("admin.plans.index",compact('plans'));
    }
    public function store(Request $request)
    {
        if ($request->isMethod("post")) {
            $data = $request->all();
            // dd( $data);
            $rules = [
                'title' => 'required',
                'title_en' => 'required',
                'price' => 'required',
                'advantages' => 'required',
                'advantages_en' => 'required',
                'status' => 'required',

            ];
            $messages = [
                'title.required' => ' من فضلك ادخل العنوان  ',
                'title_en.required' => ' من فضلك ادخل العنوان بالغة الانجليزية  ',
                'price' => ' من فضلك ادخل السعر ',
                'advantages.required' => ' من فضلك ادخل محتوي الخطة  ',
                'advantages_en.required' => ' من فضلك ادخل محتوي الخطة  بالغة الانجليزية ',
                'status' => ' من فضلك حدد حالة الخطة  '
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $subscription = new Subscribtion();
            $subscription->title = ['ar' => $data['title'], 'en' => $data['title_en']];
            $subscription->price = $data['price'];
            $subscription->advantages = ['ar' => $data['advantages'], 'en' => $data['advantages_en']];
            $subscription->dis_advantages = ['ar' => $data['dis_advantages'], 'en' => $data['dis_advantagesـen']];
            $subscription->status = $data['status'];
            $subscription->save();

            return $this->success_message(' تمت اضافة الخطة بنجاح  ');
        }

        return view('admin.Plans.store');
    }

    public function update(Request $request, $id){
        $subscription = Subscribtion::find($id);
        if ($request->isMethod("post")) {
            $data = $request->all();
            // dd( $data);
            $rules = [
                'title' => 'required',
                'title_en' => 'required',
                'price' => 'required',
                'advantages' => 'required',
                'advantages_en' => 'required',
                'status' => 'required',

            ];
            $messages = [
                'title.required' => ' من فضلك ادخل العنوان  ',
                'title_en.required' => ' من فضلك ادخل العنوان بالغة الانجليزية  ',
                'price' => ' من فضلك ادخل السعر ',
                'advantages.required' => ' من فضلك ادخل محتوي الخطة  ',
                'advantages_en.required' => ' من فضلك ادخل محتوي الخطة  بالغة الانجليزية ',
                'status' => ' من فضلك حدد حالة الخطة  '
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $subscription->update([
              //  "title" => ['ar' => $data['title'], 'en' => $data['title_en']],
                'title' => [
                    'ar' => $data['title'],
                    'en' => $data['title_en']
                ],
                "price" => $data['price'],
                "advantages" => ['ar' => $data['advantages'], 'en' => $data['advantages_en']],
                "dis_advantages" => ['ar' => $data['dis_advantages'], 'en' => $data['dis_advantagesـen']],
                "status" => $data['status'],
            ]);

            return $this->success_message(' تمت تعديل الخطة بنجاح  ');
        }

        return view('admin.Plans.update',compact('subscription'));
    }
    public function delete($id){
        $subscription = Subscribtion::find($id);
        $subscription->delete();
        return $this->success_message('تم الحذف بنجاح');
    }
}
