<?php

use App\Http\Controllers\Api\DocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'App\Http\Controllers\Api\UserController@login')->middleware('guest');


Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::post('/logout', 'App\Http\Controllers\Api\UserController@logout')->name('logout');
    
    Route::get('/documents', [DocumentController::class, 'index']);
    Route::get('/documents/{folder}', [DocumentController::class, 'getFolder']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
