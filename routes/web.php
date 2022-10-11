<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UpcomingEventController;

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

Route::middleware('auth')->prefix('admin')->group(function(){
    
    Route::controller(ClassesController::class)->group(function(){
        Route::get('classes/{class}/routines', 'routines')->name('classes.routines');
        Route::get('classes/{class}/students', 'students')->name('classes.students');
        Route::get('classes/{class}/attendance', 'attendance')->name('classes.attendance');
        Route::resource('classes', ClassesController::class);
    });


    Route::resource('student', StudentController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('routine', RoutineController::class);
    Route::resource('subject', SubjectController::class);

    Route::controller(UpcomingEventController::class)->group(function () {
        Route::get('event/upcoming/notification', 'notification')->name('event.notification');

        Route::resource('event', UpcomingEventController::class);
    });
    
    Route::get('/', function(){
        return view('dashboard');
    });
});

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth')->name('dashboard');






require __DIR__.'/auth.php';
