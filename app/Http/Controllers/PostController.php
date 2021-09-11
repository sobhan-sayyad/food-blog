<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralFunctions;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::getPaginated(8);
        $categories = Category::all();
        return view('admin.posts',compact('posts','categories'));
    }

    public function add(Request $request){
        $rules = [
            'title' => 'required',
            'short_content' => 'required',
            'content' => 'required',
            'image' => 'required',
        ];
        $customMessages = [
            'required' => 'تمام فیلدها را پر کنید'
        ];
        $this->validate($request, $rules, $customMessages);

        $imagePath = GeneralFunctions::upload($request);

        $data = $request->all();
        $data['image'] = $imagePath;
        $data;
        $post = Post::create($data);
        $request->session()->flash('message',$post->title. ' ایجاد شد');
        return redirect()->back();
    }

    public function edit(Request $request, $id){
        $rules =[
            'title' => 'required',
            'short_content' => 'required',
            'content' => 'required',
        ];
        $customMessages = [
            'required' => 'تمام فیلدها را پر کنید'
        ];
        $this->validate($request, $rules, $customMessages);

        $response = Post::edit($id,$request);

        $request->session()->flash('message',$response['oldPostTitle'].' به '.$response['post']->title.' تغییر یافت');
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->delete();
        $request->session()->flash('deleteMessage',$post->title.' حذف شد');
        return redirect()->back();
    }
}
