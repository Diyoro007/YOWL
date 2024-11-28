<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\commentaireController;
use App\Http\Controllers\API\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::apiResource("/users", UserController::class);
Route::apiResource("/commentaire", commentaireController::class); // Les routes "users.*" de l'API
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');


Route::middleware('auth:api')->group(function () {
    Route::get('profile', [AuthController::class, 'profile']);
    // Route::apiResource("users", UserController::class);
    // Route::get('users', [UserController::class, 'index']);
    // Route::get('users/{user}', [UserController::class, 'show']);
    // Route::post('users', [UserController::class, 'store']);
    // Route::put('users/{user}', [UserController::class, 'update']);
    // Route::delete('users/{user}', [UserController::class, 'destroy']);
});

// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

// // Protected routes
// Route::middleware('auth:api')->group(function () {
//     Route::get('profile', [AuthController::class, 'profile']);
//     Route::apiResource('users', UserController::class);
//     Route::apiResource('commentaires', CommentaireController::class);
// });
