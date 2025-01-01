<?php

use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CohortApiController;
use App\Http\Controllers\Api\CohortCategoryApiController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\StudentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm']);
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm']);

Route::middleware("auth:sanctum")->group(function (){
    Route::controller(AuthController::class)->group(function () {
        Route::post("login", "login")->withoutMiddleware("auth:sanctum");
        Route::post('register', "register")->withoutMiddleware("auth:sanctum");
        Route::get("logout", "logout");
    });

    Route::get('get-user-role', [GeneralController::class, 'getUserRole']);

    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('students', StudentApiController::class);
        Route::apiResource('cohort-category', CohortCategoryApiController::class);
        Route::apiResource('cohort', CohortApiController::class);

    });

});
