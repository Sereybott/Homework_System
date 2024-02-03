<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        $credential=[
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if(Auth::attempt($credential)){
            return redirect('/home')->with('success');
        }
        return back()->with('error','Incorrect Email or Password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
