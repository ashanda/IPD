<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CoupenController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\CourseWorkController;
use App\Http\Controllers\ExpenceController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\McqExamController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PaperExamController;
use App\Http\Controllers\TuteController;
use App\Http\Controllers\VerbalExamController;
use App\Http\Controllers\PaymentController;

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

Route::get('/admin', function() {
    return view('auth.admin');
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
    Route::post('/payment', [PaymentController::class, 'store'])->name('paycourse');
    Route::get('/download-certificate',[CertificateController::class,'download'])->name('download');
    Route::get('/lesson',[LessonController::class,'index'])->name('userlesson');
    Route::get('/course-work',[WorkshopController::class,'index'])->name('usercoursework');
    Route::get('/tute',[TuteController::class,'index'])->name('usertute');
    Route::get('/edit-profile',[HomeController::class,'profile'])->name('profile');
    Route::get('/groupchat',[HomeController::class,'groupchat'])->name('groupchat');
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
    Route::resource('/admin/paper-exam', PaperExamController::class);
    Route::resource('/admin/verbal-exam', VerbalExamController::class);
    Route::resource('/admin/mcq-exam',McqExamController::class);
    Route::get('/mcq-exams/add_question/{id}',[McqExamController::class,'add_question'])->name('add_question');
    Route::post('/mcq-exams/add_question/',[McqExamController::class,'add_question_db'])->name('add_question_db');
    Route::get('/mcq-exam/{id}', [McqExamController::class, 'mcq'])->name('mcq');
    Route::resource('/admin/tute',TuteController::class);
    Route::resource('/admin/payment',PaymentController::class);
    Route::resource('/admin/expence',ExpenceController::class);
    Route::resource('/admin/certificate',CertificateController::class);
    Route::get('/admin/certificateissue/{id}',[CertificateController::class,'certificate'])->name('issue_certificate');
    Route::post('/certificates', [CertificateController::class,'store'])->name('certificates.store');
    Route::resource('/admin/coupen',CoupenController::class);
    Route::resource('/admin/notice',NoticeController::class);

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
