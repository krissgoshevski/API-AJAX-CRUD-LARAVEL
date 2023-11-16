<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




 Route::post('/store', [StudentController::class,'store'])->name('store_student');
 Route::get('/index', [StudentController::class,'index'])->name('all_students');
 Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('delete_student');
 Route::put('/update/{id}', [StudentController::class,'update'])->name('update_student');
 Route::get('/show/{id}', [StudentController::class,'show'])->name('show_student');



 





