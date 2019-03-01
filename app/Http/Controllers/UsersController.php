<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['show','create','store','index']]);
        $this->middleware('guest', ['only' => ['create']]);
    }

    public function signup(){
        return view('users/user_signup');
    }

    public function index(){
        $users=User::paginate(10);
        return view('users.user_index',compact('users'));
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

    public function edit(User $user){
        $this->authorize('update',$user);
        return view('users.user_edit',compact('user'));
    }

    public function update(User $user,Request $request){
        $this->authorize('update',$user);
        $this->validate($request,['name'=>'required|max:50']);
        $user->update(['name'=>$request->name]);
        session()->flash('success','修改成功');
        return redirect()->route('users.show',$user);
    }

    public function destroy(User $user){
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
}
