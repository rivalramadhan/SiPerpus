<?php

use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// member url
Route::post('/member',[App\Http\Controllers\MemberController::class, 'create']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
Route::delete('/member/{id}', [App\Http\Controllers\MemberController::class, 'delete']);
Route::get('/member/{id}', [App\Http\Controllers\MemberController::class, 'show']);

// book url
Route::post('/book',[App\Http\Controllers\BookController::class, 'create']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::delete('/book/{id}', [App\Http\Controllers\BookController::class, 'delete']);
Route::get('/book/{id}', [App\Http\Controllers\BookController::class, 'show']);
// admin url
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'register']);



