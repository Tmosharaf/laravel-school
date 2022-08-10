<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function(){
    
    
    Route::get('classes/{class}/attendance', [ClassesController::class, 'attendance'])->name('classes.attendance');
    Route::resource('classes', ClassesController::class);
    Route::resource('student', StudentController::class);
    Route::resource('attendance', AttendanceController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});






require __DIR__.'/auth.php';
