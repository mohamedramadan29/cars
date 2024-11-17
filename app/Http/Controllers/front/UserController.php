<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Advertisment;
use App\Models\admin\State;
use App\Models\front\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $user_cars = Advertisment::where('user_id',Auth::id())->get();
        //dd($user_cars);
        return view('front.users.dashboard',compact('user_cars'));

    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email|max:150',
                'phone' => 'required|numeric|unique:users,phone|digits_between:8,16',
                'password' => 'required|min:8',

            ];
            $messages = [
                'name.required' => 'من فضلك ادخل الاسم',
                'email.required' => 'من فضلك ادخل البريد الالكتروني ',
                'email.unique' => 'البريد الالكتروني مستخدم بالفعل ',
                'email.email' => 'من فضلك ادخل بريد الكتروني بشكل صحيح ',
                'email.max' => 'من فضلك ادخل بريد الكتروني اقل من 150 حرف ',
                'phone.required' => 'رقم الهاتف مطلوب.',
                'phone.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط.',
                'phone.unique' => 'رقم الهاتف مسجل بالفعل.',
                'phone.digits_between' => 'يجب أن يكون رقم الهاتف بين 8 و 16 رقمًا.',
                'password.required' => 'من فضلك ادخل كلمة المرور ',
                'password.min' => 'من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',

            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                // Return JSON for AJAX request
                if ($request->ajax()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }
                // Regular redirect for non-AJAX request
                return redirect()->back()->withErrors($validator)->withInput();
            }
            try {
                DB::beginTransaction();
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => Hash::make($data['password']),
                ]);
                DB::commit();
                if ($request->ajax()) {
                    return response()->json(['message' => ' تم انشاء الحساب الخاص بك بنجاح  '], 200);
                }
                return redirect()->route('login')->with('success', ' تم انشاء الحساب الخاص بك بنجاح  ');
            } catch (\Exception $e) {
                DB::rollBack();
                if ($request->ajax()) {
                    return response()->json(['error' => 'Failed to register user'], 500);
                }
                return redirect()->back()->with('error', 'Failed to register user');
            }
        }
    }


//    function register(Request $request)
//    {
//        if ($request->isMethod('post')) {
//
//            try {
//                DB::beginTransaction();
//                $data = $request->all();
//                $rules = [
//                    'name' => 'required',
//                    'email' => 'required|email|unique:users,email|max:150',
//                    'phone' => 'required|numeric|unique:users,mobile|digits_between:8,16',
//                    'password' => 'required|min:8',
//                    'confirm_password' => 'required|same:password'
//                ];
//                $messages = [
//                    'name.required' => 'من فضلك ادخل  الاسم',
//                    'email.required' => 'من فضلك ادخل البريد الالكتروني ',
//                    'email.unique' => 'البريد الالكتروني مستخدم بالفعل ',
//                    'email.email' => 'من فضلك ادخل بريد الكتروني بشكل صحيح ',
//                    'email.max' => 'من فضلك ادخل بريد الكتروني اقل من 150 حرف ',
//                    'mobile.required' => 'رقم الهاتف مطلوب.',
//                    'mobile.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط.',
//                    'mobile.unique' => 'رقم الهاتف مسجل بالفعل.',
//                    'mobile.digits_between' => 'يجب أن يكون رقم الهاتف بين 8 و 16 رقمًا.',
//                    'password.required' => 'من فضلك ادخل كلمة المرور ',
//                    'password.min' => ' من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',
//                    'confirm_password.same' => 'من فضلك اكد كلمة المرور بشكل صحيح ',
//                ];
//
//                $validator = Validator::make($data, $rules, $messages);
//                if ($validator->fails()) {
//                    return redirect()->back()->withErrors($validator)->withInput();
//                }
//
//                $user = User::create([
//                    'name' => $data['name'],
//                    'email' => $data['email'],
//                    'phone' => $data['phone'],
//                    'password' => Hash::make($data['password']),
//                ]);
//                ////////////////////// Send Confirmation Email ///////////////////////////////
//                ///
//                $email = $data['email'];
//
//                $MessageDate = [
//                    'name' => $data['name'],
//                    "email" => $data['email'],
//                    'phone' => $data['phone'],
//                    'code' => base64_encode($email)
//                ];
//                Mail::send('front.mails.UserActivationEmail', $MessageDate, function ($message) use ($email) {
//                    $message->to($email)->subject(' تفعيل الحساب الخاص بك  ');
//                });
//
//                DB::commit();
//                return $this->success_message('تم انشاء الحساب بنجاح من فضلك فعل حسابك من خلال البريد المرسل  ⚡️');
//
//            } catch (\Exception $e) {
//                return $this->exception_message($e);
//            }
//        }
//    //  return view('website.register');
//    }


    // Active User Email
    public function UserConfirm($email)
    {
        $email = base64_decode($email);
        // check if this email exist in users or not
        $user_details = User::where('email', $email)->first();
        $userCount = User::where('email', $email)->count();
        if ($userCount > 0) {
            if ($user_details->email_confirm == 1) {
                //$message = 'تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان ';
                // return redirect('login')->with('Error_Message', $message);
                return redirect('login')->withErrors([' تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان  '])->withInput();
            } else {
                // Update User Status
                User::where('email', $email)->update(['email_confirm' => 1]);
                // Redirect User To Login/ Regitser Page With Message
                $message = 'تم تفعيل البريد الالكتروني الخاص بك يمكنك تسجيل الدخول الان ';
                return redirect('login')->with('Success_message', $message);
            }
        } else {
            abort(404);
        }

    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required'
                ];
                $messages = [
                    'email.required' => 'من فضلك ادخل البريد الالكتروني',
                    'email.email' => 'من فضلك ادخل بريد الكتروني صحيح',
                    'password.required' => 'من فضلك ادخل كلمة المرور',
                ];
                $validator = Validator::make($data, $rules, $messages);

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }

                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    // يمكنك التحقق من حالة تفعيل البريد إذا لزم
                    // if (Auth::user()->email_confirm == 0) {
                    //     Auth::logout();
                    //     return response()->json(['error' => 'من فضلك يجب تفعيل الحساب الخاص بك أولاً'], 403);
                    // }

                    return response()->json(['redirect' => url('user/dashboard')]);
                } else {
                    return response()->json(['error' => 'لا يوجد حساب بهذه البيانات'], 401);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => 'حدث خطأ غير متوقع، حاول مرة أخرى'], 500);
            }
        }

        if (Auth::check()) {
            return redirect('user/dashboard');
        }

      //  return view('website.login');
    }


    public function forget_password(Request $request)
    {
        if
        ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $email = $data['email'];
            $user = User::where('email', $email)->count();
            if ($user > 0) {
                ////////////////////// Send Forget Mail To User  ///////////////////////////////
                ///
                DB::beginTransaction();
                $email = $data['email'];
                $MessageDate = [
                    'code' => base64_encode($email)
                ];
                Mail::send('website.mails.UserChangePasswordMail', $MessageDate, function ($message) use ($email) {
                    $message->to($email)->subject(' رابط تغير كلمة المرور ');
                });
                DB::commit();
                return $this->success_message(' تم ارسال رابط تغير كلمة المرور علي البريد الالكتروني  ');
            } else {
                return Redirect::back()->withErrors(['للاسف لا يوجد حساب بهذة البيانات ']);
                // return $this->Error_message(' للاسف لا يوجد حساب بهذة البيانات  ');
            }
        }
        return view('website.forget-password');
    }

    public function change_forget_password(Request $request, $email)
    {
        $email = base64_decode($email);
        return view('website.change-password', compact('email'));
    }

    public function update_forget_password(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $email = $data['email'];
            //dd($data);
            $usercount = User::where('email', $email)->count();
            if ($usercount > 0) {
                ////////// Start Change Password
                $user = User::where('email', $email)->first();
                $rules = [
                    'password' => 'required',
                    'confirm_password' => 'required|same:password'
                ];
                $messages = [
                    'password.required' => ' من فضلك ادخل كلمة المرور  ',
                    'confirm_password.required' => ' من فضلك اكد كلمة المرور ',
                    'confirm_password.same' => ' من فضلك يجب تاكيد كلمة المرور بنجاح '
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $user->update([
                    'password' => Hash::make($data['password']),
                ]);
                return redirect()->to('login')->with('Success_message', '   تم تعديل كلمة المرور بنجاح سجل ذخولك الان ');
            } else {
                return Redirect::back()->withErrors(['للاسف لا يوجد حساب بهذة البيانات ']);
            }
        }
    }

    public function update_info(Request $request)
    {
        $user = User::where('id',Auth::id())->first();
        $citizen = State::all();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $user = User::where('id', Auth::user()->id)->first();
                $id = $user['id'];
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $id . '|max:150',
                    'phone' => 'required|numeric|unique:users,phone,' . $id . '|digits_between:8,16',
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل الاسم ',
                    'email.required' => 'من فضلك ادخل البريد الالكتروني ',
                    'email.unique' => 'البريد الالكتروني مستخدم بالفعل ',
                    'email.email' => 'من فضلك ادخل بريد الكتروني بشكل صحيح ',
                    'email.max' => 'من فضلك ادخل بريد الكتروني اقل من 150 حرف ',
                    'phone.required' => 'رقم الهاتف مطلوب.',
                    'phone.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط.',
                    'phone.unique' => 'رقم الهاتف مسجل بالفعل.',
                    'phone.digits_between' => 'يجب أن يكون رقم الهاتف بين 8 و 16 رقمًا.',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $user->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'info' => $data['info'],
                    'city'=>$data['city'],
                    'website_url'=>$data['website_url'],
                    'twitter_link'=>$data['twitter_link'],
                    'insta_link'=>$data['insta_link'],
                    'facebook_link'=>$data['facebook_link'],
                ]);
                return $this->success_message(' تم تعديل البيانات بنجاح !  ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

        return view('front.users.profile_data.update',compact('user','citizen'));
    }

    public function password(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'old_password' => 'required',
                    'new_password' => 'required|min:8',
                    'confirm_password' => 'required|same:new_password'
                ];
                $messages = [
                    'old_password.required' => ' من فضلك ادخل كلمة المرور القديمة ',
                    'new_password.min' => ' من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',
                    'confirm_password.same' => 'من فضلك اكد كلمة المرور بشكل صحيح ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                if (Hash::check($data['old_password'], Auth::user()->password)) {
                    $user = User::where('id', Auth::user()->id)->first();
                    $user->update([
                        'password' => Hash::make($data['new_password'])
                    ]);
                    return $this->success_message(' رائع !! تم تعديل كلمة المرور بنجاح  ');
                } else {
                    return Redirect::back()->withInput()->withErrors(['  كلمة المرور القديمة غير صحيحة !!!!!  ']);
                }

            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('front.users.profile_data.password');
    }

    public function logout(){
        Auth::logout();
        return Redirect()->route('index');
    }


}
