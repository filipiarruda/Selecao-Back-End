<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Models\Comment;

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


Route::post('/users', [UserController::class, 'store']);    


//Sanctum autentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);



//List comments Unauthenticated Route
Route::get('list-comments', [CommentController::class, 'listComments']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/protected', function () {
        return response()->json(['message' => 'This route is protected.']);
    });

    Route::get('/profile', [UserController::class, 'profile']);

    Route::put('/edit-profile', [UserController::class, 'update']);

    Route::post('/add-comment', [CommentController::class, 'store']);

    Route::delete('/delete-comment', [CommentController::class, 'delete']);
});

