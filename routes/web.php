<?php

use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\alert;

use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\authController;
use App\Http\Controllers\StudentController;
use App\Models\Homework;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

});


Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [HomeworkController::class, 'index'])->name('home');

    Route::get('/home/overdue',  [HomeworkController::class, 'showOverdue'])->name('overdue');

    Route::get('/home/completed',  [HomeworkController::class, 'showCompleted'])->name('completed');

    Route::get('/home/setting', [authController::class, 'update'])->name('setting');

    Route::post('/home/setting', [authController::class, 'updatePost'])->name('setting');

    Route::get('/home/addStudent', [authController::class,'addStudent'])->name('addstudent');

    Route::post('/home/addStudent', [authController::class, 'addStudentPost'])->name('addstudent');

    Route::get('/home/addHomework', [HomeworkController::class,'addHomework'])->name('addhomework');

    Route::post('/home/addHomework', [HomeworkController::class,'addHomeworkPost'])->name('addhomework');

    Route::delete('/logout', [authController::class,'logout'])->name('logout');

    Route::post('/home/clear', [HomeworkController::class, 'clear'])->name('clear');

    Route::delete('/home/restore', [HomeworkController::class, 'restore'])->name('restore');

    Route::delete('/home/delete', [HomeworkController::class, 'delete'])->name('delete');

    Route::get('/home/student',[StudentController::class, 'showStudent'])->name('student');

    Route::post('/home/student', [StudentController::class, 'edit'])->name('edit_student');

    Route::delete('/home/student', [StudentController::class, 'delete'])->name('delete_student');
});