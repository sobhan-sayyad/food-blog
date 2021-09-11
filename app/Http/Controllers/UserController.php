<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $categoryObject = new Category();
        // $categories = $categoryObject->getAll();

        $users = User::getPaginated(2);
        return view('admin.users' ,compact('users'));
    }

    public function delete(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('deleteMessage',$user->fist_name.' '.$user->last_name.' حذف شد');
        return redirect()->back();
    }

}
