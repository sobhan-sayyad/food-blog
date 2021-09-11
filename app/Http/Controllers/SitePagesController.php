<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class SitePagesController extends Controller
{
    public function homePage(){
        $categories = Category::all();
        return view('site.home', compact('categories'));
    }

    public function categoryPosts($categoryTitle){
        $category = Category::findCategoryByTitle($categoryTitle);
        if(count($category) == 0){
            abort(404);
        }
        $category = $category[0];
        $posts = Post::findCategoryPosts($category->id);
    
        return view('site.categoryPosts',compact('category','posts'));
    }

    public function postPage($categoryTitle, $id){
        $post = Post::findOrFail($id);
        
        $comments = Comment::getPostComments($post->id);
        return view('site.postPage',compact('post','comments'));
    }

    public function sendComment(Request $request){
        $rules = [
            'content' => 'required',
        ];
        $customMessages = [
            'required' => 'پیامی بنویسید'
        ];
    
        $this->validate($request, $rules, $customMessages);

        $data = $request->all();
        $user = Sentinel::check();
        $data['user_id'] = $user->id;
        Comment::create($data);
        $request->session()->flash('message','نظر شما ثبت شد');
        return redirect()->back();
    }
}