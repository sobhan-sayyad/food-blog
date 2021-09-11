<?php

namespace App\Http\Controllers;

use App\Mail\SendRecoveryMail;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Models\Reminder as MyReminder;
use Illuminate\Routing\ViewController;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }

    public function registerPage(){
        return view('auth.register');
    }

    public function createAccount(Request $request){
        $rules = [
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'checkbox' => 'required',
        ];
        $customMessages = [
            'required' => 'تمام فیلدها را پر کنید',
            'confirmed' => 'رمز عبور یکسان نیست'
        ];
        $this->validate($request, $rules, $customMessages);

        $email = $request->input('email');
        $emailExist = User::checkExistEmail($email);
        if($emailExist){
            $request->session()->flash('message','اکانت با ایمیل '.$email.' وجود دارد');
            return redirect()->back();
        }

        $data = $request->all();
        Sentinel::registerAndActivate($data);
        Sentinel::authenticateAndRemember($data);
        return redirect()->route('site.index');
    }

    public function loginAccount(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $customMessages = [
            'required' => 'تمام فیلدها را پر کنید',
        ];
        $this->validate($request, $rules, $customMessages);

        $data = $request->all();
        if(isset($data['remember'])){
            if($user=Sentinel::authenticateAndRemember($data)){  
                if($user->type == 'admin'){
                return redirect()->route('admin.dashboard');
                }
                return redirect()->route('site.index');
            }else{
                $request->session()->flash('message','ایمیل یا گذرواژه اشتباه است');
                return redirect()->back();
            }
        }
        if($user=Sentinel::authenticate($data)){
            if($user->type == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('site.index');
        }
        $request->session()->flash('message','ایمیل یا گذرواژه اشتباه است');
        return redirect()->back();
    }
    
    public function logoutAccount(){
        Sentinel::logout();
        return redirect()->route('admin.login');
    }

    public function userPasswordRecovery(Request $request){
        $rules = [
            'email' => 'required'
        ];
        $customMessages = [
            'required' => 'جهت بازیابی گذرواژه ایمیل خود را وارد کنید',
        ];
        $this->validate($request, $rules, $customMessages);

        $email = $request->input('email');
        if(User::checkExistEmail($email)){
            $user = User::findUserByEmail($email);
            $user = Sentinel::findById($user ->id);
            $reminder = Reminder::create($user);
            $emaileData = [
                'subject'=>'بازیابی گذرواژه',
                'body'=>'جهت بازیابی گذرواژه روی لینک زیر کلیک کنید',
                'link'=>'http://localhost:8000/passwordReset/'. $reminder->code
            ];
            \Mail::to($email)->send(new SendRecoveryMail($emaileData));
        }
        $request->session()->flash('message','در صورت داشتن اکانت ایمیل بازیابی برای شما ارسال می شود');
        return redirect()->back();
    }
    public function passwordReset(Request $request, $code){
        $reminder = MyReminder::findReminderBycode($code);
        if(count($reminder) == 0){
            return abort(404);
        }
        $reminder = $reminder[0];
        if($reminder->completed == 1){
            return abort(404);
        }
        return view('auth.passwordReset',compact('code'));
    }

    public function passwordResetSubmit(Request $request, $code){
        $rules = [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
        $customMessages = [
            'password.required' => 'گذرواژه خود را وارد کنید',
            'password_confirmation.required' => 'گذرواژه خود را تکرار کنید',
            'password.confirmed' => 'تکرار گذرواژه درست نیست',
        ];
        $this->validate($request, $rules, $customMessages);

        $reminder = MyReminder::findReminderBycode($code);
        if(count($reminder) == 0){
            return abort(404);
        }
        $reminder = $reminder[0];
        if($reminder->completed == 1){
            return abort(404);
        }
        
        $result = User::resetPassword($request,$reminder->user_id,$code);
        if(!$result){
            $request->session()->flash('message','خطایی رخ داده است');
            return redirect()->back();
        }
        $request->session()->flash('message','گذرواژه با موفقیت تغییر داده شد');
        return redirect()->route('admin.login');
    }
}
