<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

# method get
Route::get('/animals', [AnimalController::class, 'index']);

# method post
Route::post('/animals', [AnimalController::class, 'store']);

# method put
Route::put('/animals/{id}', [AnimalController::class, 'update']);

# method delete
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

