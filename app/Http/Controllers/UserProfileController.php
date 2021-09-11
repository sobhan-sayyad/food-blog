<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function userProfile(){
        return view('site.userProfile');
    }

    public function userProfileEdit(Request $request){
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
        ];
        $customMessages = [
            'first_name.required' => 'نام خود را وارد کنید',
            'last_name.required' => 'نام خانوادگی خود را وارد کنید',
        ];
        $this->validate($request, $rules, $customMessages);
        $user = Sentinel::check();
        User::edit($request,$user->id);
        $request->session()->flash('message','اطلاعات شما بروز رسانی شد');
        return redirect()->back();
    }

    public function userPasswordEdit(Request $request){
        $rules = [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
        $customMessages = [
            'old_password.required' => 'گذرواژه فعلی را وارد کنید',
            'password.required' => 'گذرواژه جدید را وارد کنید',
            'password_confirmation.required' => 'گذرواژه جدید را تکرار کنید',
            'password.confirmed' => 'گذرواژه و تکرار آن باید یکی باشند',
        ];
        $this->validate($request, $rules, $customMessages);
        $user = Sentinel::check();
        if(!Hash::check($request->input('old_password'),$user->password)){
            $request->session()->flash('errorMessage','گذر واژه فعلی اشتباه است');
            return redirect()->back();
        }
        if(User::changePassword($request,$user->id)){
            $request->session()->flash('successmessage','گذرواژه تغییر یافت');
            return redirect()->back();
        }
        $request->session()->flash('errorMessage','مشکلی بوجود آمده است');
        return redirect()->back();
    }
}
