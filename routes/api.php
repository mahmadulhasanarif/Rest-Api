<?php

use App\Http\Controllers\api\ClassController;
use App\Http\Controllers\api\SectionController;
use App\Http\Controllers\api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*-- Api Route Class--*/
Route::get('class/index', [ClassController::class, 'index']);
Route::post('class/store', [ClassController::class, 'store']);
Route::get('class/edit/{id}', [ClassController::class, 'edit']);
Route::post('class/update/{id}', [ClassController::class, 'update']);
Route::get('class/delete/{id}', [ClassController::class, 'delete']);

/*-- Api Route Section--*/
Route::get('section/index', [SectionController::class, 'index']);
Route::post('section/store', [SectionController::class, 'store']);
Route::get('section/edit/{id}', [SectionController::class, 'edit']);
Route::post('section/update/{id}', [SectionController::class, 'update']);
Route::get('section/delete/{id}', [SectionController::class, 'delete']);

/*-- Api Route student--*/
Route::get('student/index', [StudentController::class, 'index']);
Route::post('student/store', [StudentController::class, 'store']);
Route::get('student/edit/{id}', [StudentController::class, 'edit']);
Route::post('student/update/{id}', [StudentController::class, 'update']);
Route::get('student/delete/{id}', [StudentController::class, 'delete']);
