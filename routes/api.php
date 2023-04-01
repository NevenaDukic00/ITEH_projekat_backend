<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderedBookController;
use App\Http\Controllers\genreController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);//imamo

Route::post('/login', [AuthController::class, 'login']);//imamo
Route::get('/books', [BookController::class, 'index']);//imamo

Route::post('/addBook', [BookController::class, 'add']);//imamo

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);//imamo
    Route::get('/orderedBooks', [OrderedBookController::class, 'index']);
    Route::get('/genres', [GenreController::class, 'index']);//imamo
    Route::post('/orderedBooks', [OrderedBookController::class, 'store']);
    Route::resource('/books', BookController::class)->only(['update', 'destroy']);//imamo
});
