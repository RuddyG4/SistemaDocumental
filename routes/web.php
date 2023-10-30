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
    Route::get('/register-view', [LoginController::class, 'registerView'])->name('auth.register_view');
    Route::post('/register', [LoginController::class, 'register'])->name('auth.register');
    Route::get('/reset-password-view', [LoginController::class, 'resetPasswordView'])->name('auth.reset_password_view');
    Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('auth.reset_password');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/users', IndexUser::class)->name('users.index');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/documents', [FolderController::class, 'index'])->name('documents.index');

    Route::get('/roles', [RolePermissionController::class, 'index']);

    Route::get('/view-document/{id}', [FolderController::class, 'show'])->name('view.document');

    Route::post('/update-version-doc', [FolderController::class, 'actualizarVerionDelDocumento'])->name('update.version_doc');

    Route::get('/search-document', [FolderController::class, 'indexSearchDocument'])->name('search.document_index');

    Route::post('/search-document-by', [FolderController::class, 'searchDocumentBy'])->name('search.document_search_by');

    Route::get('/show-history-versions/{id}', [FolderController::class, 'showHistoryVersion'])->name('documents.show_history_versions');

    Route::delete('/delete-document/{id}', [FolderController::class, 'deleteDocument'])->name('documents.delete_document');
});

Route::get('/view-document_d/{id}', [FolderController::class, 'preVisualizacion'])->name('view.document_d');
