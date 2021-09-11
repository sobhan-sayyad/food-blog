<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class User extends Model
{
    protected $fillable = ['first_name','last_name','password','type'];

    public static function getPaginated($count)
    {
    //    return Category::orderBy('id','desc')->get();
    return User::where('type','user')->orderBy('id','desc')->paginate($count);
    }


    public static function checkExistEmail($email){
        $user = User::where('email',$email)->get();
        if(count($user) > 0){
            return true;
        }
        return false;
    }

    public static function edit(Request $request, $id){
        $data = $request->all();
        $user = User::findOrFail($id);
        $user->fill($data);
        $user->save();
    }
    
    public static function changePassword(Request $request, $id){
        $user = Sentinel::findById($id);
        $reminder = Reminder::create($user);
        if ($reminder = Reminder::complete($user, $reminder->code, $request->input('password'))){
            return true;
        }else{
            return false;
        }
    }

    public static function resetPassword(Request $request, $id, $code){
        $user = Sentinel::findById($id);
        if ($reminder = Reminder::complete($user, $code, $request->input('password'))){
            return true;
        }else{
            return false;
        }
    }

    public static function findUserByEmail($email){
        return User::where('email',$email)->first();
    }

}