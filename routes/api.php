<?php

use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RentBookController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// member url
Route::prefix('member')->group(function () {
    Route::post('/add-member',[MemberController::class, 'create']);
    Route::get('/get-all-member', [MemberController::class, 'index']);
    Route::delete('/delete-member/{id}', [MemberController::class, 'delete']);
    Route::get('/search-member/{id}', [MemberController::class, 'show']);
    Route::put('/update-member/{id}', [MemberController::class,'update']);
});

// book url
Route::prefix('book')->group(function () {
    Route::post('/add-book',[BookController::class, 'create']);
    Route::get('/get-all-book', [BookController::class, 'index']);
    Route::delete('/delete-book/{id}',[BookController::class, 'delete']);
    Route::get('/search-book/{id}', [BookController::class, 'show']);
    Route::put('/update-book/{id}', [BookController::class,'update']);
});

// admin url
Route::post('/register-admin', [AdminController::class, 'register']);
Route::post('/login-admin', [AdminController::class, 'login']);

// rentbook url
Route::prefix('rentbook')->group(function () {
    Route::post('/add-rentbook',[RentBookController::class, 'create']);
    Route::get('/get-all-rentbook', [RentBookController::class, 'index']);
    Route::delete('/delete-rentbook/{id}', [RentBookController::class, 'delete']);
    Route::get('/search-rentbook/{id}', [RentBookController::class, 'show']);
    Route::put('/update-rentbook/{id}', [RentBookController::class, 'update']);
});



