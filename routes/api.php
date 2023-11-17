<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ModuleController;
use Illuminate\Support\Facades\Route;


Route::prefix('courses')->group(function () {
    Route::get('/',[CourseController::class,'index']);
    Route::get('/{id}',[CourseController::class,'show']);
    Route::get('/{id}/modules',[ModuleController::class,'index']);
});

// Route::controller(ModuleController::class)->prefix('modules')->group(function () {
//     Route::get('/', 'index');
//     //Route::get('/{id}', 'show');
// });
