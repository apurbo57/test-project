<?php

use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Forntend\siteController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\CountDownController;
use App\Http\Controllers\Backend\courseController;
use App\Http\Controllers\Backend\sliderController;
use App\Http\Controllers\Backend\galleryController;
use App\Http\Controllers\Backend\messageController;
use App\Http\Controllers\Backend\noticeController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Forntend\certifiController;
use App\Http\Controllers\Forntend\CourseController as ForntendCourseController;



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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


//Forntend Route//
Route::get('/', [siteController::class, 'index'])->name('home');
Route::get('/download', [siteController::class, 'download'])->name('download');
Route::get('/gallery', [siteController::class, 'gallery'])->name('gallery');
Route::get('/notice', [siteController::class, 'notice'])->name('notice');
Route::get('/single-notice/{id}', [siteController::class, 'single_notice'])->name('single-notice');
Route::get('/about-us', [siteController::class, 'about_us'])->name('about');
Route::get('/single-techer/{id}', [siteController::class, 'single_teacher'])->name('single-teacher');
Route::get('/contact-us', [siteController::class, 'contact'])->name('contact');
Route::post('/contact-form', [siteController::class, 'contact_form'])->name('contact-form');
//Frontend Course Route//
Route::get('/rpl', [ForntendCourseController::class, 'rpl'])->name('rpl');
Route::get('/courses', [ForntendCourseController::class, 'index'])->name('courses');
Route::get('/single-course/{id}', [ForntendCourseController::class, 'show'])->name('single-course');
Route::get('/course/apply-course/{id}', [ForntendCourseController::class, 'apply_course'])->name('apply_course');
Route::post('/course/enroll-this-course', [ForntendCourseController::class, 'enroll_course'])->name('enroll_course');
Route::post('/course/enroll-this-course/rpl', [ForntendCourseController::class, 'enroll_course_rpl'])->name('enroll_course_rpl');
Route::get('/course/enroll-this-course/success/{id}', [ForntendCourseController::class, 'success'])->name('enroll.success');
Route::get('/course/enroll-this-course/rpl/success/{id}', [ForntendCourseController::class, 'rplSuccess'])->name('enroll.success.rpl');
Route::get('/course/regular/form-download/{id}', [ForntendCourseController::class, 'regularFormDownload'])->name('regular.form.download');
Route::get('/course/rpl/form-download/{id}', [ForntendCourseController::class, 'rplFormDownload'])->name('rpl.form.download');
Route::get('/generate-pdf', [ForntendCourseController::class, 'generate_pdf'])->name('generate-pdf');
Route::get('/download-pdf', [ForntendCourseController::class, 'download_pdf'])->name('download-pdf');
//Regular certificate download route
Route::get('/regular-certificate', [certifiController::class, 'index'])->name('regular-certificate');
Route::get('/certificate-download/{id}', [certifiController::class, 'regular_download'])->name('certificate-download');
Route::get("search", [certifiController::class, 'search']);
//rpl certificate download route
Route::get('/rpl-certificate', [certifiController::class, 'rpl'])->name('rpl-certificate');
Route::get('/rpl-certificate-download/{id}', [certifiController::class, 'show'])->name('rpl-certificate-download');
Route::get("rpl_search", [certifiController::class, 'rpl_search']);

Route::any('callback', [ForntendCourseController::class, 'callback'])->name('bkash.callback');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('lang/home', [siteController::class, 'index']);
// Route::get('lang/change', [siteController::class, 'change'])->name('changeLang');

// Route::middleware(['auth'])->group(function(){

    Route::get('/admin', [adminController::class, 'index']);
    Route::get('/login', [adminController::class, 'login'])->name('login');
    Route::post('/admin-dashboard', [adminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/dashboard', [adminController::class, 'show_dash'])->name('dashboard');
    Route::get('/logout', [adminController::class, 'logout'])->name('logout');

// Backend Route
// Count Down route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-countdown', [CountDownController::class, 'index'])->name('add-countdown');
        Route::put('/update-countdown/{id}', [CountDownController::class, 'update'])->name('update-countdown');
    });
// Notice route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-notice', [noticeController::class, 'create'])->name('add-notice');
        Route::put('/update-timeline', [noticeController::class, 'updateIndex'])->name('update.timeline');
        Route::get('/timeline', [noticeController::class, 'timelineIndex'])->name('index.timeline');
        Route::post('/save-notice', [noticeController::class, 'store'])->name('save-notice');
        Route::get('/manage-notice', [noticeController::class, 'index'])->name('manage-notice');
        Route::get('/edit-notice/{id}', [noticeController::class, 'edit'])->name('edit-notice');
        Route::put('/update-notice/{id}', [noticeController::class, 'update'])->name('update-notice');
        Route::delete('/delete-notice/{id}', [noticeController::class, 'destroy'])->name('delete-notice');
    });
// slider route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-slider', [sliderController::class, 'create'])->name('add-slider');
        Route::post('/save-slider', [sliderController::class, 'store'])->name('save-slider');
        Route::get('/manage-slider', [sliderController::class, 'index'])->name('manage-slider');
        Route::get('/edit-slider/{id}', [sliderController::class, 'edit'])->name('edit-slider');
        Route::put('/update-slider/{id}', [sliderController::class, 'update'])->name('update-slider');
        Route::delete('/delete-slider/{id}', [sliderController::class, 'destroy'])->name('delete-slider');
    });
// Gallery route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-gallery', [galleryController::class, 'create'])->name('add-gallery');
        Route::post('/save-gallery', [galleryController::class, 'store'])->name('save-gallery');
        Route::get('/manage-gallery', [galleryController::class, 'index'])->name('manage-gallery');
        Route::get('/edit-gallery/{id}', [galleryController::class, 'edit'])->name('edit-gallery');
        Route::put('/update-gallery/{id}', [galleryController::class, 'update'])->name('update-gallery');
        Route::delete('/delete-gallery/{id}', [galleryController::class, 'destroy'])->name('delete-gallery');
    });

// Course route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-course', [courseController::class, 'create'])->name('add-course');
        Route::post('/save-course', [courseController::class, 'store'])->name('save-course');
        Route::get('/manage-course', [courseController::class, 'index'])->name('manage-course');
        Route::get('/edit-course/{id}', [courseController::class, 'edit'])->name('edit-course');
        Route::put('/update-course/{id}', [courseController::class, 'update'])->name('update-course');
        Route::delete('/delete-course/{id}', [courseController::class, 'destroy'])->name('delete-course');
    });

// Teacher route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-teacher', [TeacherController::class, 'create'])->name('add-teacher');
        Route::post('/save-teacher', [TeacherController::class, 'store'])->name('save-teacher');
        Route::get('/manage-teacher', [TeacherController::class, 'index'])->name('manage-teacher');
        Route::get('/edit-teacher/{id}', [TeacherController::class, 'edit'])->name('edit-teacher');
        Route::put('/update-teacher/{id}', [TeacherController::class, 'update'])->name('update-teacher');
        Route::delete('/delete-teacher/{id}', [TeacherController::class, 'destroy'])->name('delete-teacher');
    });

// Message route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/message', [messageController::class, 'index'])->name('message');
        Route::delete('/delete-message/{id}', [messageController::class, 'destroy'])->name('delete-message');
    });
// Certificate route
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-certificate', [CertificateController::class, 'create'])->name('add-certificate');
        Route::post('/save-certificate', [CertificateController::class, 'store'])->name('save-certificate');
        Route::get('/manage-certificate', [CertificateController::class, 'index'])->name('manage-certificate');
        Route::get('/stream-certificate/{id}', [CertificateController::class, 'stream'])->name('stream-certificate');
        Route::get('/edit-certificate/{id}', [CertificateController::class, 'edit'])->name('edit-certificate');
        Route::put('/update-certificate/{id}', [CertificateController::class, 'update'])->name('update-certificate');
        Route::delete('/delete-certificate/{id}', [CertificateController::class, 'destroy'])->name('delete-certificate');
    });

    Route::prefix('/students')->name('student.')->controller(StudentController::class)->group(function(){
        Route::get('/rpl','rplIndex')->name('rpl.index');
        Route::get('/rpl/stream/{id}','stremRplStudent')->name('rpl.stream');
        Route::delete('/rpl/destroy/{id}','destroyRpl')->name('rpl.destroy');

        Route::get('/','index')->name('index');
        Route::get('/stream/{id}','stremStudent')->name('stream');
        Route::delete('/destroy/{id}','destroy')->name('destroy');

        Route::get('/rpl/update/status/{id}','updateStatusRpl')->name('rpl.updateStatus');
        Route::get('/update/status/{id}','updateStatus')->name('updateStatus');


    });


// });


});

require __DIR__.'/auth.php';
