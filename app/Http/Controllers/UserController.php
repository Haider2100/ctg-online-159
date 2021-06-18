<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\todo;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request)
    {

        $users = User::where ('username',$request->username)
            ->where ('password',$request->password)->count();

        if($users==1){

            $usercounts = User::all()->count();
            //compact('usercounts');

            $ttasks = todo::all()->count();

            $atasks = todo::where ('status','active')->count();

            return view('home',['usercounts'=>$usercounts,'ttask'=> $ttasks ,'atask'=> $atasks ]);
            //return redirect()->intended(view('home',['usercounts'=>$usercounts,'task'=>10]));
        }
        else{
            return back()->withInput($request->only('username'));
        }



            //return redirect()->intended(route('admin.dashboard'));

        //return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
       // Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }

    public function showregister()
    {
        return view('register');
    }

    public function register(Request $request)
    {

        User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,

        ]);

        return redirect()->back();
    }

    public function profile()
    {
       $todos = todo::all();

        return view('profile',compact('todos'));
        //return view('profile',['usercounts'=>$usercounts,'ttask'=> $ttasks ,'atask'=> $atasks ]);
    }

}
