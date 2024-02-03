<?php

use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\alert;

use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\authController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>'guest'],function(){
    Route::get('/', [authController::class, 'login'])->name('login');

    Route::post('/', [authController::class, 'loginPost'])->name('login');

    Route::get('/reset-password', function(){
        return view('forgetpassword');
    })->name('forget');
});


Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [HomeworkController::class, 'index'])->name('home');

    Route::get('/home/overdue',  [HomeworkController::class, 'showOverdue'])->name('overdue');

    Route::get('/home/completed',  [HomeworkController::class, 'showCompleted'])->name('completed');

    Route::get('/setting', function(){
        return view('setting');
    })->name('setting');

    Route::get('/ranking', function(){
        $student = [
            ['id'=>"i11482",'name'=>"ボット",'score'=>100],
            ['id'=>'i11483','name'=>'他の人','score'=>80],
        ];
        return view('ranking',['students'=>$student]);
    });

    Route::delete('/logout', [authController::class,'logout'])->name('logout');
});