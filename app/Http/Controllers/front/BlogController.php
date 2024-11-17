<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\admin\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $categories = BlogCategory::all();
        $query = Blog::query();
        $lastblog = $query->latest()->limit(1)->first();
        $lastblogs = $query->latest()->limit(4)->where('id', '!=', $lastblog['id'])->get();

        $lastFourPosts = $query->limit(4)->get();
        $randomposts = $query->inRandomOrder()->limit(4)->get();
        ///// Get Last Blog In Every Category
        $categoireslastpost = $categories->map(function($category){
            $category->lastpost = $category->posts()->latest()->first();
            return $category;
        });
        return view('front.blog', compact('categories', 'lastblogs', 'lastblog','categoireslastpost','lastFourPosts','randomposts'));
    }

    public function blog_details($slug){
        $blog = Blog::with('Category')->where('slug',$slug)->first();
        $lastFourPosts = Blog::where('category_id',$blog['category_id'])->where('id','!=',$blog['id'])->latest()->limit(4)->get();
      // dd($lastFourPosts);
        $randomposts = Blog::where('id','!=',$blog['id'])->inRandomOrder()->limit(4)->get();
      if($blog){
            return view('front.blog_details',compact('blog','lastFourPosts','randomposts'));
        }
        abort(404);
    }

    public function category_details($slug){
        $category = BlogCategory::where('slug',$slug)->first();
        if($category){
            $posts = Blog::where('category_id',$category['id'])->get();
            $lastFourPosts = Blog::where('category_id',$category['id'])->limit(4)->get();
            // dd($lastFourPosts);
              $randomposts = Blog::inRandomOrder()->limit(4)->get();
            return view('front.blog_category',compact('category','posts','lastFourPosts','randomposts'));
        }
        abort(404);
    }
}
