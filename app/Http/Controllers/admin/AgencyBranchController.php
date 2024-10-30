<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Agency;
use App\Models\admin\AgencyBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AgencyBranchController extends Controller
{
    use Message_Trait;
    use Upload_Images;

    public function index($id)
    {
        $agency = Agency::findOrFail($id);
        $branches = AgencyBranch::where('agency_id',$id)->get();
        return view('admin.AgencyBranch.index', compact('agency','branches'));
    }
    public function store(Request $request,$id)
    {
        $agency = Agency::findOrFail($id);
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    'name_en' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'address_en' => 'required',
                    'car_status' => 'required',
                    'work_time' => 'required',
                    'work_time_en' => 'required',
                    'phone' => 'required',
                ];

                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                    'name_en.required' => ' من فضلك ادخل الاسم  باللغة الانجليزية  ',
                    'country.required' => ' من فضلك حدد الدولة  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                    'address_en.required' => ' من فضلك  ادخل العنوان باللغة الانجليزية  ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                    'work_time_en.required' => ' من فضلك ادخل توقيت العمل باللعة الانجليزية  ',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                $branch = new AgencyBranch();
                $branch->create([
                    'agency_id'=>$agency['id'],
                    'name' => ['ar' => $data['name'], 'en' => $data['name_en']],
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address_en']],
                    'car_status' => $data['car_status'],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time_en']],
                    'phone' => $data['phone'],
                ]);

                return $this->success_message(' تم اضافة الفرع  بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }

        }
        return view('admin.AgencyBranch.add',compact('agency'));

    }


    public function update(Request $request, $id)
    {

        $branch =AgencyBranch::findOrFail($id);
        $agency = Agency::findORFail($branch['agency_id']);
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'name_en' => 'required',
                    'country' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'address_en' => 'required',
                    'car_status' => 'required',
                    'work_time' => 'required',
                    'work_time_en' => 'required',
                    'phone' => 'required',
                ];

                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم  ',
                    'name_en.required' => ' من فضلك ادخل الاسم  باللغة الانجليزية  ',
                    'country.required' => ' من فضلك حدد الدولة  ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'address.required' => ' من فضلك ادخل العنوان   ',
                    'address_en.required' => ' من فضلك  ادخل العنوان باللغة الانجليزية  ',
                    'work_time.required' => ' من فضلك ادخل توقيت العمل  ',
                    'work_time_en.required' => ' من فضلك ادخل توقيت العمل باللعة الانجليزية  ',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                $branch->update([
                    'name' => ['ar' => $data['name'], 'en' => $data['name_en']],
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'address' => ['ar' => $data['address'], 'en' => $data['address_en']],
                    'car_status' => $data['car_status'],
                    'work_time' => ['ar' => $data['work_time'], 'en' => $data['work_time_en']],
                    'phone' => $data['phone'],
                ]);
                return $this->success_message(' تم تعديل الفرع  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.AgencyBranch.update', compact('branch','agency'));
    }

    public function delete($id)
    {
        try {
            $branch = AgencyBranch::findOrFail($id);

            $branch->delete();
            return $this->success_message('تم الحذف بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }

}
