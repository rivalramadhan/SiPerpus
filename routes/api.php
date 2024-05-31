<?php

use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// member routes
Route::post('/member',[App\Http\Controllers\MemberController::class, 'create']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);

// book routes
Route::post('/book',[App\Http\Controllers\BookController::class, 'create']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);

// admin routes
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'register']);



