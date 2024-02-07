<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return back()->with('error','メールまたパスワードが間違った');
    }

    public function addStudent(){
        if(Auth::user()->is_admin){
            return view('addStudent');
        }
        return redirect()->route('home');
    }

    public function addStudentPost(Request $request){
        if(Auth::user()->is_admin){
            try{
                $user = new User();
                $user->name = $request->name;
                $user->password = Hash::make($request->new_password);
                $user->email = $request->email;
                $user->stu_id = $request->id;
                $user->is_admin = 0;
                $user->class = $request->class;
                $user->save();  
                return back()->with('success','学生が追加した');
            }
            catch(Exception $e){
                return back()->with('error','もう一回入力してください');
            }
        }
        return redirect()->route('home');
        
    }

    public function update(){
        return view('setting');
    }

    public function updatePost(Request $request){
        if(Hash::check($request->old_password,auth()->user()->password)){
            User::findOrFail(Auth::user()->id)->update([
                'stu_id' => $request->stu_id,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if(strcmp($request->new_password,"")==0 && !(Auth::user()->is_admin)){
                return back()->with('error','新しいパスワードをもう一回入力してください'); 
            }
            if(strcmp($request->new_password,"")!=0){
                if(strcmp($request->new_password,$request->new_password_confirm)==0){
                    User::findOrFail(Auth::user()->id)->update([
                        'password' => Hash::make($request->new_password)
                    ]);
                }
                else{
                    return back()->with('error','新しいパスワードをもう一回入力してください');
                }
            }
            return back()->with('success','変更が完成した');
            
        }
        return back()->with('error','今のパスワードが間違った');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    
}
