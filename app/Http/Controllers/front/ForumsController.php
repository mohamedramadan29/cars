<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\TopicCategory;
use App\Models\front\Topic;
use App\Models\front\TopicComment;
use GuzzleHttp\Psr7\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumsController extends Controller
{

     use Message_Trait;

    public function CategoryDetails($slug)
    {
        $main_category = TopicCategory::where('slug', $slug)->first();
        $categories = TopicCategory::where('id', '!=', $main_category['id'])->get();
        if ($main_category) {
            $topics = Topic::with('User','Comments')->where('category_id', $main_category['id'])->get();
            return view('front.forum_details', compact('main_category', 'categories', 'topics'));
        }
        abort(404);
    }

    public function TopicDetails($id,$slug){
        $topic = Topic::with('Comments')->where('id',$id)->where('slug',$slug)->first();
        $categories = TopicCategory::with('Topics')->get();
        $lasttopics = Topic::where('id','!=',$topic['id'])->latest()->limit(2)->get();
        if($topic){
            return view('front.topic_details',compact('topic','categories','lasttopics'));
        }
        abort(404);
    }

    public function NewComment(Request $request){


        if(Auth::check()){
            try{
                $data = $request->all();
                $comment = new TopicComment();
                $comment->create([
                    'topic_id'=>$data['topic_id'],
                    'user_id'=>Auth::id(),
                    'comment'=>$data['comment'],
                    'status'=>1,
                ]);
                return $this->success_message(' تم اضافة تعليقك بنجاح  ');
            }catch(\Exception $e){
                return $this->exception_message($e);
            }
        }

        return $this->Error_Message(' من فضلك سجل دخولك اولا  ');
       // return $this->exception_message(' من فضلك سجل دخولك اولا  ');

    }
}
