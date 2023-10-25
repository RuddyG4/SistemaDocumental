<?php

use App\Http\Controllers\Documents\FolderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Users\RolePermissionController;
use App\Livewire\Users\Users\IndexUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/users', IndexUser::class)->name('users.index');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/documents', [FolderController::class, 'index']);

    Route::get('/roles', [RolePermissionController::class, 'index']);

    Route::get('/view-document/{id}', [FolderController::class, 'show'])->name('view.document');
});
