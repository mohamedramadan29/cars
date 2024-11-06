<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
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
        return view('front.users.dashboard');
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
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $user = User::where('id', Auth::user()->id)->first();
                $id = $user['id'];
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $id . '|max:150',
                    'mobile' => 'required|numeric|unique:users,mobile,' . $id . '|digits_between:8,16',
                ];
                if ($request->hasFile('cv')) {
                    $rules['cv'] = 'required|mimes:pdf,doc,docx|max:51200';
                }
                if ($request->hasFile('logo')) {
                    $rules['logo'] = 'image|mimes:jpg,png,jpeg|max:4096'; // max:4096 لتحديد حجم الملف بالكيلوبايت (4MB)
                }
                $messages = [
                    'name.required' => 'من فضلك ادخل الاسم ',
                    'email.required' => 'من فضلك ادخل البريد الالكتروني ',
                    'email.unique' => 'البريد الالكتروني مستخدم بالفعل ',
                    'email.email' => 'من فضلك ادخل بريد الكتروني بشكل صحيح ',
                    'email.max' => 'من فضلك ادخل بريد الكتروني اقل من 150 حرف ',
                    'mobile.required' => 'رقم الهاتف مطلوب.',
                    'mobile.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط.',
                    'mobile.unique' => 'رقم الهاتف مسجل بالفعل.',
                    'mobile.digits_between' => 'يجب أن يكون رقم الهاتف بين 8 و 16 رقمًا.',
                    'logo.image' => 'الملف يجب أن يكون صورة.',
                    'logo.mimes' => 'الصورة يجب أن تكون بصيغة:  webp , jpg , jpeg, png.',
                    'logo.max' => 'حجم الصورة يجب ألا يتجاوز 4 ميجابايت.',
                    'cv.mimes' => ' من فضلك حدد الملفات بشكل صحيح من نوع : pdf,doc,docx  ',
                    'cv.max' => ' اقصي حجم للملف  50 ميجا  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if ($request->hasFile('cv')) {
                    try {
                        $cvfilename = $this->saveImage($request->file('cv'), public_path('assets/uploads/userscv'));
                        /// Delete old image
                        if ($user['cv'] != null && $user['cv'] != '') {
                            // مسار الصورة القديمة
                            $cvoldFilePath = public_path('assets/uploads/userscv/' . $user['cv']);
                            if (file_exists($cvoldFilePath)) {
                                unlink($cvoldFilePath);
                            }
                        }
                        $user->update([
                            'cv' => $cvfilename,
                        ]);
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'The Cv failed to upload: ' . $e->getMessage())->withInput();
                    }
                }

                if ($request->hasFile('logo')) {
                    try {
                        $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/users'));
                        /// Delete old image
                        if ($user['logo'] != null && $user['logo'] != '') {
                            // مسار الصورة القديمة
                            $oldFilePath = public_path('assets/uploads/users/' . $user['logo']);
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                        $user->update([
                            'logo' => $filename,
                        ]);
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'The logo failed to upload: ' . $e->getMessage())->withInput();
                    }
                }
                $user->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'info' => $data['info'],
                ]);
                return $this->success_message(' تم تعديل البيانات بنجاح !  ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }

    public function update_data(Request $request)
    {
        $citizen = City::all();
        $specialists = Specialist::all();
        $nameJobs = Jobsname::all();
        $nameJobsCategories = JobCategory::all();
        $specialistsCategories = SpecialCategory::all();
        $user = User::with('jobs_name', 'specialist')->where('id', Auth::id())->first();
        try {

            if ($request->isMethod('post')) {
                $data = $request->all();
                // dd($data);
//                $work_type = implode(',', $data['work_type']);
                $language = implode(',', $data['language']);
                $rules = [
                    'nationality' => 'required',
                    'sex' => 'required',
                    'city' => 'required',
                    'can_placed_from_to_another' => 'required',
                    'job_name' => 'required',
//                    'work_type' => 'required',
                    'experience' => 'required',
                    'language' => 'required',
                    'language_level' => 'required',
                    'profession_specialist' => 'required',
                    'notification_timeslot' => 'required',
                    'salary' => 'required',
                    'academy_certificate'=>'required'
                ];
                $messages = [
                    'nationality.required' => ' من فضلك حدد الجنسية  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }

                $user->update([
                    'nationality' => $data['nationality'],
                    'sex' => $data['sex'],
                    'city' => $data['city'],
                    'can_placed_from_to_another' => $data['can_placed_from_to_another'],
                    'job_category' => $data['job_category'],
                    'job_name' => $data['job_name'],
//                    'work_type' => $work_type,
                    'experience' => $data['experience'],
                    'language' => $language,
                    'language_level' => $data['language_level'],
                    'special_category' => $data['special_category'],
                    'profession_specialist' => $data['profession_specialist'],
                    'notification_timeslot' => $data['notification_timeslot'],
                    'salary' => $data['salary'],
                    'academy_certificate'=>$data['academy_certificate']
                ]);
                return $this->success_message('  تم تعديل البيانات الخاصة بك بنجاح  !!  ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('website.users.update-data', compact('user', 'citizen', 'nameJobs', 'specialists', 'nameJobsCategories', 'specialistsCategories'));
    }

    public function getJobsByCategory($categoryId)
    {
        $jobs = Jobsname::where('cat_id', $categoryId)->get(['id', 'title']);
        return response()->json($jobs);
    }

    public function getSpecialistByCategory($categoryId)
    {
        $specialists = Specialist::where('cat_id', $categoryId)->get(['id', 'name']);
        return response()->json($specialists);
    }

    public function change_password(Request $request)
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
        return view('website.users.change-password');
    }


}
