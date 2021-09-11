<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralFunctions;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categoryObject = new Category();
        // $categories = $categoryObject->getAll();

        $categories = Category::getPaginated(5);
        return view('admin.categories' ,compact('categories'));
    }

    public function add(Request $request){

        $rules = [
            'title' => 'required',
            'image' => 'required',
            // 'email' => 'required|email',
            // 'message' => 'required|max:250',
        ];
        $customMessages = [
            'required' => 'تمام فیلدها را پر کنید'
        ];
    
        $this->validate($request, $rules, $customMessages);
        // $title = $request->input('title');

        $imagePath = GeneralFunctions::upload($request);
        // $request->file('image');

        $data = $request->all();
        $data['image'] = $imagePath;
        // return $data['title'];

        // $category = new Category();
        // $category->title=$data['title'];
        // $category->save();

        $category = Category::create($data);
        $request->session()->flash('message',$category->title.' ایجاد شد');
        return redirect()->back();
    }

    public function edit(Request $request, $id){
        $rules = [
            'title' => 'required',
        ];
        $customMessages = [
            'required' => 'تمام فیلدها را پر کنید'
        ];
        $this->validate($request, $rules, $customMessages);

        $response = Category::edit($id,$request);
    
        $request->session()->flash('message',$response['oldCategoryTitle'].' به '.$response['category']->title.' تغییر یافت');
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->delete();
        $request->session()->flash('deleteMessage',$category->title.' حذف شد');
        return redirect()->back();
    }
}
