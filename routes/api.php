
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::resource('/reviews', ReviewsController::class);
Route::resource('/users', UserController::class);

Route::post('/create', [AuthController::class, 'createUser']);
Route::post('/login',[AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
 });


