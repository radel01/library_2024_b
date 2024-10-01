<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use App\Models\Copy;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//user
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store']);
//book
Route::get('/books', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::post('/book', [BookController::class, 'store']);
//copy
Route::get('/copies', [CopyController::class, 'index']);
Route::get('/copy/{id}', [CopyController::class, 'show']);
Route::post('/copy', [CopyController::class, 'store']);
//lending
Route::get('/lendings', [LendingController::class, 'index']);
//kebabcase javasolt, nincs $ az útvonalban!!!
Route::get('/lending/{user_id}/{copy_id}/{start}', [LendingController::class, 'show']);
Route::post('/lending', [LendingController::class, 'store']);
//egyenlőre ez nem helyes, mert csak a kulcsok vannak benne
Route::put('/lending/{user_id}/{copy_id}/{start}', [LendingController::class, 'update']);
Route::delete('/lending/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']);