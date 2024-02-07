<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Done;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeworkController extends Controller
{
    public function index(){
        $count = DB::table('users')->get()->count();
        $h = Homework::where('class',Auth::user()->class)->orderBy('deadline')->get();
        return view('homeworks',['homeworks'=>$h,'student_num'=>$count]);
    }

    public function showCompleted(){
        $count = DB::table('users')->get()->count();
        $h = Homework::where('class',Auth::user()->class)->orderBy('deadline')->get();
        return view('done',['homeworks'=>$h,'student_num'=>$count]);
    }

    public function showOverdue(){
        $count = DB::table('users')->get()->count();
        $h = Homework::where('class',Auth::user()->class)->orderBy('deadline')->get();
        return view('overdue',['homeworks'=>$h,'student_num'=>$count]);
    }

    public function addHomework(){
        if(Auth::user()->is_admin){
            return view('addHomework');
        }
        return redirect()->route('home');
    }

    public function addHomeworkPost(Request $request){
        if(Auth::user()->is_admin){
            try{
                $homework = new Homework();
                $homework->subject = $request->subject;
                $homework->description = $request->description;
                $homework->deadline = $request->deadline;
                $homework->class = $request->class;
                $homework->save();
                return back()->with('success','課題の追加が完成した');
            } catch(Exception $e){
                return back()->with('error','もう一回入力してください');
            }
        }
        return redirect()->route('home');
    }

    public function clear(Request $request){
        $done = new Done();
        $done->user_id = Auth::user()->id;
        $done->homework_id = $request->homework_id;
        $done->date_submit = (string)date("Y-m-d");
        $done->save();

        return back()->with('success','おめでとうございます!!');
    }

    public function restore(Request $request){
        DB::table('dones')->where('homework_id',$request->homework_id)->where('user_id',Auth::user()->id)->delete();
        
        return back()->with('success','差し戻しが完成した');
    }

    public function delete(Request $request){
        DB::table('homework')->where('id',$request->homework_id)->delete();

        return back()->with('success','課題の消すが完成した');
    }
}
