<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Models\admin\State;
use App\Models\admin\TopicCategory;
use App\Models\front\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UserForumsController extends Controller
{
    use Message_Trait;
    use Slug_Trait;

    public function index()
    {
        $topics = Topic::with('Category')->where('user_id', Auth::id())->get();
        return view('front.users.forums.index', compact('topics'));
    }


    public function store(Request $request)
    {
        $citizen = State::all();
        $categories = TopicCategory::all();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'title' => 'required',
                    'category' => 'required',
                    'desc' => 'required',
                ];
                $messages = [
                    'title.required' => ' من فضلك ادخل العنوان  ',
                    'category.required' => ' من فضلك حدد القسم    ',
                    'desc.required' => ' من فضلك ادخل الموضوع    ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                $topic = new Topic();
                $topic->create([
                    'user_id' => Auth::id(),
                    'title' => $data['title'],
                    'slug' => $this->CustomeSlug($data['title']),
                    'category_id' => $data['category'],
                    'topic' => $data['desc'],
                    'status' => 1
                ]);

                return $this->success_message(' تم اضافة الموضوع  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.users.forums.add', compact('citizen', 'categories'));
    }


    public function update(Request $request, $id, $slug)
    {
        $citizen = State::all();
        $categories = TopicCategory::all();
        $topic = Topic::where('id', $id)->where('slug', $slug)->first();
        if ($topic) {
            if ($request->isMethod('post')) {
                try {
                    $data = $request->all();
                    $rules = [
                        'title' => 'required',
                        'category' => 'required',
                        'desc' => 'required',
                    ];
                    $messages = [
                        'title.required' => ' من فضلك ادخل العنوان  ',
                        'category.required' => ' من فضلك حدد القسم    ',
                        'desc.required' => ' من فضلك ادخل الموضوع    ',
                    ];
                    $validator = Validator::make($data, $rules, $messages);
                    if ($validator->fails()) {
                        return Redirect::back()->withInput()->withErrors($validator);
                    }
                    $topic->update([
                        'user_id' => Auth::id(),
                        'title' => $data['title'],
                        'slug' => $this->CustomeSlug($data['title']),
                        'category_id' => $data['category'],
                        'topic' => $data['desc'],
                        'status' => 1
                    ]);

                    return redirect()->route('forums');
                } catch (\Exception $e) {
                    return $this->exception_message($e);
                }
            }
            return view('front.users.forums.update', compact('citizen', 'categories','topic'));
        }
    }
}
