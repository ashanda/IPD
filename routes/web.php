<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\CourseWorkController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about-us', function() {
    return view('about');
});
Route::get('/courses', function() {
    return view('course');
});
Route::get('/gallery', function() {
    return view('gallery');
});
Route::get('/workshop', function() {
    return view('workshop');
});

Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {

  

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {

  

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('/admin/batch', BatchController::class);
    Route::resource('/admin/course', CourseController::class);
    Route::resource('/admin/lesson', LessonController::class);
    Route::resource('/admin/workshop', WorkshopController::class);
    Route::resource('/admin/course-work', CourseWorkController::class);
    Route::resource('/admin/instructor', InstructorController::class);
    Route::resource('/admin/student', StudentController::class);

});

  

/*------------------------------------------

--------------------------------------------

All Instructor Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:instructor'])->group(function () {

  

    Route::get('/instructor/home', [HomeController::class, 'instructorHome'])->name('instructor.home');

});
