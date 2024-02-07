<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudent(){
        if(Auth::user()->is_admin){
            $students = User::where('class',Auth::user()->class)->orderBy('name')->get();
            return view('student',['students'=>$students]);
        }
        return redirect()->route('home');
    }

    public function edit(Request $request){
        if(strcmp($request->password,$request->password_confirm) == 0){
            $student = User::where('id',$request->id)->first();
            $student->stu_id = $request->stu_id;
            $student->name = $request->name;
            $student->email = $request->email;
            if(strcmp($request->password,"")!=0){
                $student->password = Hash::make($request->password);
            }
            $student->save();
            return back()->with('success','変更を保存した');
        }
        return back()->with('error','エラー');
    }

    public function delete(Request $request){
        DB::table('users')->where('id',$request->id)->delete();
        return back()->with('success','学生を消した');
    }
}
