<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function login()
    {
       if(Auth::check()){
        return redirect()->route('users.show');
       }
       else{
        return view('login');
       }
    }

     public function store(Request $request)
    {
     
       $credentials = $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       ]);
      
       if (Auth::attempt($credentials, $request->has('remember'))) {
           $user=Auth::user();
            
           if(($user->status==0)){
            Auth::logout();
            session()->flash('danger', '请先激活账号');
            return redirect()->back();
           }

       
           else{
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [$user]);
           } 
     
        }
        else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
      
       
    }

    public function destroy(){
           Auth::logout();
           session()->flash('success','退出成功！');
           return redirect('login');
    }
}

?>