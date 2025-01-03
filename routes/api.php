<?php

use App\Http\Controllers\Api\AssessmentApiController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BriefApiController;
use App\Http\Controllers\Api\CohortApiController;
use App\Http\Controllers\Api\CohortCategoryApiController;
use App\Http\Controllers\Api\CompetencyApiController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\SkillApiController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\TagsApiController;
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
        Route::apiResource('brief', BriefApiController::class);
        Route::apiResource('tags', TagsApiController::class);
        Route::apiResource('skills', SkillApiController::class);
        Route::apiResource('competencies', CompetencyApiController::class);
        Route::apiResource('assessments', AssessmentApiController::class);




    });

});
