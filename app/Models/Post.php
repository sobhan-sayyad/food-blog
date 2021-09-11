<?php

namespace App\Models;

use App\Models\GeneralFunctions;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','category_id','short_content','content','image'];
    public static function getPaginated($count)
    {
       return Post::join('categories','categories.id','posts.category_id')
       ->select('posts.*','categories.title as category_title')
       ->orderBy('posts.id','desc')
       ->paginate($count);
    }

    public static function edit($id, Request $request){
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = GeneralFunctions::upload($request);
        }
        $post = Post::findOrFail($id);
        $oldPostTitle = $post->title;
        $post->fill($data);
        $post->save();
        return [
            'oldPostTitle' => $oldPostTitle,
            'post' => $post
        ];
    }

    public static function findCategoryPosts($categoryId){
        $posts = Post::where('category_id',$categoryId)->paginate(12);
        return $posts;
    }

}
