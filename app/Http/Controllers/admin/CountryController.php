<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Country;
use App\Models\admin\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $countries  = Country::with('states')->get();
        return view('admin.Countries.index',compact('countries'));
    }

    public function store(Request $request)
    {
        try {

            $data = $request->all();
            $rules = [
                'name_ar'=>'required',
                'name_en'=>'required',
                'citizen_ar'=>'required',
                'citizen_en'=>'required',
            ];
            $messages = [
                'name_ar.required'=>' من فضلك ادخل اسم الدولة  ',
                'name_en.required'=>' من فضلك ادخل اسم الدولة باللغة الانجليزية   ',
                'citizen_ar.required'=>' من فضلك ادخل المدن بالغة العربية  ' ,
                'citizen_en.required'=>' من فضلك ادخل المدن بالغة الانجليزية   ' ,
            ];
            $validator = Validator::make($data,$rules,$messages);

            if ($validator->fails()){
                return Redirect::back()->withInput()->withErrors($validator);
            }

            $country = new Country();
            $country->name = ['ar'=>$data['name_ar'],'en'=>$data['name_en']];
            $country->status = 1;
            $country->save();
            $citizen_ar = explode('-', $data['citizen_ar']);
            $citizen_en = explode('-', $data['citizen_en']);
            // Ensure both arrays have the same length
            if (count($citizen_ar) !== count($citizen_en)) {
                return Redirect::back()->withInput()->withErrors(['citizen_mismatch' => 'عدد المدن في اللغتين يجب أن يكون متساويًا.']);
            }
            foreach ($citizen_ar as $index => $city_ar) {
                $state = new State();
                $state->country_id = $country->id;
                $state->name = ['ar'=> trim($city_ar),'en'=>trim($citizen_en[$index])];
                $state->save();
            }
            return $this->success_message(' تم اضافة الدول والمدن  بنجاح  ');
        }catch (\Exception $e){
            return $this->exception_message($e);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $country = Country::with('states')->findOrFail($id);
            $data = $request->all();

            // Validate the input
            $rules = [
                'name_ar' => 'required',
                'name_en' => 'required',
                'citizen_ar' => 'required',
                'citizen_en' => 'required',
            ];

            $messages = [
                'name_ar.required' => 'من فضلك ادخل اسم الدولة',
                'name_en.required' => 'من فضلك ادخل اسم الدولة باللغة الانجليزية',
                'citizen_ar.required' => 'من فضلك ادخل المدن باللغة العربية',
                'citizen_en.required' => 'من فضلك ادخل المدن باللغة الانجليزية'
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            // Update country name
            $country->setTranslation('name', 'ar', $data['name_ar']);
            $country->setTranslation('name', 'en', $data['name_en']);
            $country->save();

            // Delete existing states
            State::where('country_id', $id)->delete();

            // Process the new states
            $citizen_ar = array_filter(array_map('trim', explode('-', $data['citizen_ar'])));
            $citizen_en = array_filter(array_map('trim', explode('-', $data['citizen_en'])));

            // Ensure both arrays have the same length
            if (count($citizen_ar) !== count($citizen_en)) {
                return Redirect::back()->withInput()->withErrors(['citizen_mismatch' => 'عدد المدن في اللغتين يجب أن يكون متساويًا.']);
            }

            // Insert new states
            foreach ($citizen_ar as $index => $city_ar) {
                $state = new State();
                $state->country_id = $country->id;
                $state->setTranslation('name', 'ar', $city_ar);
                $state->setTranslation('name', 'en', $citizen_en[$index]);
                $state->save();
            }

            return $this->success_message('تم تعديل الدولة والمدن بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }

    public function delete($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return $this->success_message(' تم حذف الدولة بنجاح  ');
    }
}
