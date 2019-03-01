<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function signup(){
        return view('users/user_signup');
    }

    public function index(){

    }

    public function show(User $user){
        return view('users.user_show',compact('user'));
    }

    public function create(){
        return view('users.user_create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user=User::create(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password)]);
        $request->session()->flash('success', "欢迎");
        Auth::login($user);
        return redirect()->route('users.show',$user);
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
