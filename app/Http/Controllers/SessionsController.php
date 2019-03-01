<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.session_create');
    }

    public function store(Request $request){
        $cridentials=$this->validate($request,['email'=>'required|email|max:255','password'=>'required']);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->has('remember'))){   
            session()->flash('success','欢迎回来');
            return redirect()->route('users.show',[Auth::user()]);
        }
        else{
            session()->flash('danger',$request->password);
            return redirect()->back()->withInput();
        }
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success','成功退出');
        return redirect('login');
    }
}
