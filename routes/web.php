<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Documents\FolderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Users\RolePermissionController;
use App\Livewire\Users\Users\IndexUser;
use App\Models\RevisorFile;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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
    Route::get('/forgot-password', function () {
        $token = request()->query('token');
        if (isset($token)) {
            return view('reset-password', ['token' => $token]);
        } else {
            return view('send-email-pass-reset');
        }
    })->name('password.reset');
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'si')
            : back()->withErrors('success', 'no');
    })->name('password.email');
    Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('auth.reset_password');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/users', IndexUser::class)->name('users.index');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/documents', [FolderController::class, 'index'])->name('documents.index');
    Route::get('/roles', [RolePermissionController::class, 'index']);
    Route::get('/documents/view-document/{id}', [FolderController::class, 'show'])->name('view.document');
    Route::post('/update-version-doc', [FolderController::class, 'actualizarVerionDelDocumento'])->name('update.version_doc');
    Route::get('/search-document', [FolderController::class, 'indexSearchDocument'])->name('search.document_index');
    Route::post('/search-document-by', [FolderController::class, 'searchDocumentBy'])->name('search.document_search_by');
    Route::get('/show-history-versions/{id}', [FolderController::class, 'showHistoryVersion'])->name('documents.show_history_versions');
    Route::delete('/delete-document/{id}', [FolderController::class, 'deleteDocument'])->name('documents.delete_document');

    Route::get('/add-revisors/{id}', [FolderController::class, 'showAdddRevisorView'])->name('documents.add_revisors');

    Route::get('/get-users/{id}', [UserController::class, 'getUserById'])->name('users.get_user_by_id');

    Route::post('/guardar-revisores-file', [FolderController::class, 'storeRevisores'])->name('documents.store_revisores');

    Route::get('/revision-files', [FolderController::class, 'filesARevisar'])->name('documents.index_files_revision');

    Route::get('/show-file-revision/{id}', [FolderController::class, 'showFilesARevisar'])->name('documents.show_files_revision');

    Route::post('/evaluar-file', [FolderController::class, 'evaluarFile'])->name('documents.evaluar_file');

    Route::get('/a-revision/{id}', [FolderController::class, 'mandaArevision'])->name('documents.mandar_revision');
});

Route::get('/view-document_d/{id}', [FolderController::class, 'preVisualizacion'])->name('view.document_d');
Route::get('/auth/verify-email', function () {
    return view('verify-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'ok');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
