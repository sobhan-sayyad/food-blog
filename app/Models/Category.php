<?php

namespace App\Models;

use App\Models\GeneralFunctions;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','image'];
    // public function getAll()
    // {
    //     return Category::all();
    // }
    public static function getPaginated($count){
    //    return Category::orderBy('id','desc')->get();
    return Category::orderBy('id','desc')->paginate($count);
    }

    public static function edit($id, Request $request){
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = GeneralFunctions::upload($request);
        }
        $category = Category::findOrFail($id);
        $oldCategoryTitle = $category->title;
        $category->fill($data);
        $category->save();
        return [
            'oldCategoryTitle' => $oldCategoryTitle,
            'category' => $category
        ];
    }
    public static function findCategoryByTitle($categoryTitle){
        $category = Category::where('title',$categoryTitle)->get();
        return $category;
    }
}
