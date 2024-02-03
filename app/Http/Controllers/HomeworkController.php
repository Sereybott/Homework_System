<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index(){
        $homework = [
            ['id'=>1,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,21,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false], 
            ['id'=>2,'subject'=>"数学",'description'=>"プリント",'deadline'=> date("Y-m-d",mktime(0,0,0,1,27,2024)),'done'=>21,'date-done'=>null, 'isDone'=>false],
            ['id'=>3,'subject'=>"コンピューターアーキテクチャ",'description'=>"Webclassの演習課題",'deadline'=> date("Y-m-d",mktime(0,0,0,1,19,2024)),'done'=>42,'date-done'=>date("Y-m-d",mktime(0,0,0,1,20,2024)), 'isDone'=>true],
            ['id'=>4,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>date("Y-m-d"), 'isDone'=>true],
            ['id'=>5,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
            ['id'=>6,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
            ['id'=>7,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
        ];
        return view('homeworks',['homeworks'=>$homework]);
    }

    public function showCompleted(){
        $homework = [
            ['id'=>1,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,21,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false], 
            ['id'=>2,'subject'=>"数学",'description'=>"プリント",'deadline'=> date("Y-m-d",mktime(0,0,0,1,27,2024)),'done'=>21,'date-done'=>null, 'isDone'=>false],
            ['id'=>3,'subject'=>"コンピューターアーキテクチャ",'description'=>"Webclassの演習課題",'deadline'=> date("Y-m-d",mktime(0,0,0,1,19,2024)),'done'=>42,'date-done'=>date("Y-m-d",mktime(0,0,0,1,20,2024)), 'isDone'=>true],
            ['id'=>4,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>date("Y-m-d"), 'isDone'=>true],
            ['id'=>5,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
            ['id'=>6,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
            ['id'=>7,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
        ];
        return view('done',['homeworks'=>$homework]);
    }

    public function showOverdue(){
        $homework = [
            ['id'=>1,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,21,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false], 
            ['id'=>2,'subject'=>"数学",'description'=>"プリント",'deadline'=> date("Y-m-d",mktime(0,0,0,1,27,2024)),'done'=>21,'date-done'=>null, 'isDone'=>false],
            ['id'=>3,'subject'=>"コンピューターアーキテクチャ",'description'=>"Webclassの演習課題",'deadline'=> date("Y-m-d",mktime(0,0,0,1,19,2024)),'done'=>42,'date-done'=>date("Y-m-d",mktime(0,0,0,1,20,2024)), 'isDone'=>true],
            ['id'=>4,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>date("Y-m-d"), 'isDone'=>true],
            ['id'=>5,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
            ['id'=>6,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
            ['id'=>7,'subject'=>"物理",'description'=>"レポート",'deadline'=> date("Y-m-d",mktime(0,0,0,1,29,2024)),'done'=>32,'date-done'=>null, 'isDone'=>false],
        ];
        return view('overdue',['homeworks'=>$homework]);
    }
}
