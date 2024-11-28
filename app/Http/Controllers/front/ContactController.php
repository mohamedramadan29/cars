<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\PublicSetting;
use App\Models\front\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use Message_Trait;





    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'message' => 'required',
                ];
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم   ',
                    'email.required' => ' من فضلك ادخل البريد الالكتروني    ',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف ',
                    'message.required' => ' من فضلك ادخل رسالتك  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                DB::beginTransaction();
                $message = new Contact();
                $message->name = $data['name'];
                $message->email = $data['email'];
                $message->phone = $data['phone'];
                $message->message = $data['message'];
                $message->category = $data['category'];
                $message->save();
                DB::commit();
                //////////// Send Message To Admin Mail
                $public_setting = PublicSetting::first();
                $admin_email = $public_setting['email'];
                $email = $admin_email;
                $MessageDate = [
                    'name' => $data['name'],
                    "user_email" => $data['email'],
                    'phone' => $data['phone'],
                    'user_message'=>$data['message'],
                ];
                Mail::send('front.mails.newcontactmessage', $MessageDate, function ($message) use ($email) {
                    $message->to($email)->subject(' لديك رسالة تواصل جديدة  ');
                });


                return $this->success_message(' تم ارسال رسالتك بنجاح سوف نتواصل معك في اقرب وقت ممكن  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('front.contact_us');

    }
}
