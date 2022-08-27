<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrentlyReadingController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReadBookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserNoteController;
use App\Http\Controllers\WantToReadBookController;

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
Route::get('/want-to-read/{user:id}', [WantToReadBookController::class, 'index']);
Route::post('/want-to-read/{user:id}', [WantToReadBookController::class, 'show']);
Route::post('/add-want-to-read/{user:id}', [WantToReadBookController::class, 'create']);
Route::delete('/want-to-read/{user:id}', [WantToReadBookController::class, 'destroy']);
Route::get('/books-read/{user:id}', [ReadBookController::class, 'show']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{book:id}', [ReviewController::class, 'show']);
Route::get('/notes/{book:id}/{user:id}', [UserNoteController::class, 'show']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::post('/register', [RegisterController::class, 'create']);
Route::post('/login', [LoginController::class, 'create']);
Route::post('/user/{user:id}', [LoginController::class, 'update']);

Route::delete('/read-book/{readBook:id}', [ReadBookController::class, 'destroy']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/user', [LoginController::class, 'user']);
    Route::post('/logout', [LoginController::class, 'destroy']);
});
