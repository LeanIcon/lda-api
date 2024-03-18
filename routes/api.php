<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TrainerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




// Prefix all API routes with "api/v1/"
Route::prefix('v1')->group(function () {

    Route::apiResource('categories', CategoryController::class)->only([ 'index', 'show']);
    Route::apiResource('courses', CourseController::class)->only([ 'index', 'show']);
    Route::apiResource('faqs', FaqController::class)->only([ 'index', 'show']);
    Route::apiResource('testimonies', TestimonyController::class)->only([ 'index', 'show']);
    Route::apiResource('sliders', SliderController::class)->only([ 'index', 'show']);
    Route::apiResource('trainers', TrainerController::class)->only([ 'index', 'show']);
    Route::apiResource('enrollments', EnrollmentController::class)->only(['store']);

    // Route::get('/categories', [CategoryController::class, 'index']);
    // Route::get('/categories/{id}', [CategoryController::class, 'show']);

});


