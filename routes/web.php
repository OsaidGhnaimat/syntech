<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
})->name('home');

Route::get('/about', function () {
    return view('public.about');
})->name('about');

Route::get('/staff', function () {
    return view('public.staff');
})->name('staff');

Route::get('/gallery', function () {
    return view('public.gallery');
})->name('gallery');

Route::get('/contact', function () {
    return view('public.contact');
})->name('contact');

Route::get('/new', function () {
    return view('public.news');
})->name('news');


// Auth login & register
Route::get('login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('login', [LoginController::class, 'loginAction'])->name('loginAction');
Route::get('register', [RegisterController::class, 'showRegister'])->name('showRegister');
Route::post('register', [RegisterController::class, 'registerAction'])->name('registerAction');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');




// forgot Password Group Route
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('emailTemplate', function () {
    return view('forgotPasswordPages.emailTemplate');
})->name('emailTemplate');


///////////////////// dashboard //////////////////

// Route::get('/dash', function () {
//     return view('dashboard.index');
// })->name('dashboard');


// Route::resource('/users', UserController::class);
Route::get('/dash', [DashboardController::class, 'index'])->middleware(checkLogin::class)->name('dashboard');

Route::prefix('dash')->middleware(checkLogin::class)->group(function () {
    // users
    // Route::resource('/users', UserController::class)->except(['create', 'show', 'store', 'edit', 'update', 'destroy']);
    // Route::get('/users/{role}', [UserController::class, 'index'])->name('users.index');

    Route::resource('/users', UserController::class);
    Route::resource('/trainers', TrainerController::class);
    Route::resource('/students', StudentController::class);

});


