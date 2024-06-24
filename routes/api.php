<?php

use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// member url
Route::post('/add-member',[MemberController::class, 'create']);
Route::get('/get-all-member', [MemberController::class, 'index']);
Route::delete('/delete-member/{id}', [MemberController::class, 'delete']);
Route::get('/search-member/{id}', [MemberController::class, 'show']);
Route::put('/update-member/{id}', [MemberController::class,'update']);

// book url
Route::post('/add-book',[BookController::class, 'create']);
Route::get('/get-all-book', [BookController::class, 'index']);
Route::delete('/delete-book/{id}',[BookController::class, 'delete']);
Route::get('/search-book/{id}', [BookController::class, 'show']);

// admin url
Route::post('/register-admin', [AdminController::class, 'register']);
Route::post('/login-admin', [AdminController::class, 'login']);



