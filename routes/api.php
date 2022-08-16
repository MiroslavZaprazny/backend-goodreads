<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrentlyReadingController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Models\Genre;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/set-current-page', [CurrentlyReadingController::class, 'edit']);
Route::post('/search', [BookController::class, 'index']);
Route::post('/author', [AuthorController::class, 'index']);
Route::post('/genres', [GenreController::class, 'index']);
Route::post('/currently-reading', [CurrentlyReadingController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{book:id}', [ReviewController::class, 'show']);
Route::post('/post-review', [ReviewController::class, 'store']);
Route::post('/register', [RegisterController::class, 'create']);
Route::post('/login', [LoginController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/user', [LoginController::class, 'user']);
    Route::post('/logout', [LoginController::class, 'destroy']);
});
