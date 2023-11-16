<?php

use App\Http\Controllers\Api\CourseController;
use Illuminate\Support\Facades\Route;


Route::controller(CourseController::class)->prefix('courses')->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});
