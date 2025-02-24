<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\DocumentUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/my', function () {
//     return view('index');
// });
Route::get('/detail', function () {
    return view('detail');
});

// Route::get('/home', [DocumentsController::class, 'home'])->name('home');
Route::get('/', [DocumentsController::class, 'page'])->name('index');
Route::get('/detail/{id}', [DocumentsController::class, 'detail'])->name('detail');
Route::get('/seacrh', [DocumentsController::class, 'page'])->name('page');

Route::get('/kp', [DocumentsController::class, 'kp'])->name('kp');
Route::get('/proposal', [DocumentsController::class, 'proposal'])->name('proposal');
Route::get('/skripsi', [DocumentsController::class, 'skripsi'])->name('skripsi');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rute untuk admin dan user
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // 
    // Route::get('/documents', [DocumentsController::class, 'index'])->name('dashboard.documents.index');
    // Route::get('/users', [UserController::class, 'index'])->name('dashboard.users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    // Route::get('documents/seacrh', [DocumentsController::class, 'index'])->name('dashboard.documents.index.search');

    // // Route untuk menyimpan user baru
    // Route::post('/users', [UserController::class, 'store'])->name('dashboard.users.store');
    // Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    // Route::put('/dashboard/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');
    // Route::delete('/dashboard/users/{user}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');

    // // documents
    // Route::get('/dashboard/documents/{document}', [DocumentsController::class, 'show'])->name('dashboard.documents.status');
    // Route::patch('/dashboard/documents/{document}/status', [DocumentsController::class, 'updateStatus'])->name('dashboard.documents.updateStatus');
    // Route::get('/dashboard/documents/{document}/edit', [DocumentsController::class, 'edit'])->name('dashboard.documents.edit');
    // Route::PUT('/dashboard/documents/{document}', [DocumentsController::class, 'update'])->name('dashboard.documents.update');
    // Route::get('/documents/{category}/create', [DocumentsController::class, 'create'])->name('dashboard.documents.create');
    // Route::post('/documents', [DocumentsController::class, 'store'])->name('dashboard.documents.store');
    // Route::delete('/dashboard/documnents/{document}', [DocumentsController::class, 'destroy'])->name('dashboard.documents.destroy');


    
    // // Menampilkan daftar dokumen
    // Route::get('/mydocuments', [DocumentUserController::class, 'index'])->name('user.mydocuments.index');
    
    // // Menampilkan form pembuatan dokumen
    // Route::get('/user/mydocuments/{category}/create', [DocumentUserController::class, 'create'])->name('user.mydocuments.create');
    
    // // Menyimpan dokumen yang baru dibuat
    // Route::post('/user/mydocuments/store', [DocumentUserController::class, 'store'])->name('user.mydocuments.store');
    
    // // Menampilkan form edit dokumen
    // Route::get('/user/mydocuments/{document}/edit', [DocumentUserController::class, 'edit'])->name('user.mydocuments.edit');
    
    // // Mengupdate dokumen
    // Route::PUT('/user/mydocuments/{document}', [DocumentUserController::class, 'update'])->name('user.mydocuments.update');
    
    // // Menghapus dokumen
    // Route::delete('/user/mydocuments/{document}', [DocumentUserController::class, 'destroy'])->name('user.mydocuments.destroy');
    



});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DocumentsController::class, 'dashboard'])->name('dashboard');

    Route::get('/documents', [DocumentsController::class, 'index'])->name('dashboard.documents.index');
    Route::get('/users', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::get('documents/seacrh', [DocumentsController::class, 'index'])->name('dashboard.documents.index.search');

    // Route untuk menyimpan user baru
    Route::post('/users', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('/dashboard/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('/dashboard/users/{user}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');

    // documents
    Route::get('/dashboard/documents/{document}', [DocumentsController::class, 'show'])->name('dashboard.documents.status');
    Route::patch('/dashboard/documents/{document}/status', [DocumentsController::class, 'updateStatus'])->name('dashboard.documents.updateStatus');
    Route::get('/dashboard/documents/{document}/edit', [DocumentsController::class, 'edit'])->name('dashboard.documents.edit');
    Route::PUT('/dashboard/documents/{document}', [DocumentsController::class, 'update'])->name('dashboard.documents.update');
    Route::get('/documents/{category}/create', [DocumentsController::class, 'create'])->name('dashboard.documents.create');
    Route::post('/documents', [DocumentsController::class, 'store'])->name('dashboard.documents.store');
    Route::delete('/dashboard/documnents/{document}', [DocumentsController::class, 'destroy'])->name('dashboard.documents.destroy');


    
});
Route::middleware(['auth', 'user'])->group(function () {

     // Menampilkan daftar dokumen
    Route::get('/mydocuments', [DocumentUserController::class, 'index'])->name('user.mydocuments.index');
    
    // Menampilkan form pembuatan dokumen
    Route::get('/user/mydocuments/{category}/create', [DocumentUserController::class, 'create'])->name('user.mydocuments.create');
    
    // Menyimpan dokumen yang baru dibuat
    Route::post('/user/mydocuments/store', [DocumentUserController::class, 'store'])->name('user.mydocuments.store');
    
    // Menampilkan form edit dokumen
    Route::get('/user/mydocuments/{document}/edit', [DocumentUserController::class, 'edit'])->name('user.mydocuments.edit');
    
    // Mengupdate dokumen
    Route::PUT('/user/mydocuments/{document}', [DocumentUserController::class, 'update'])->name('user.mydocuments.update');
    
    // Menghapus dokumen
    Route::delete('/user/mydocuments/{document}', [DocumentUserController::class, 'destroy'])->name('user.mydocuments.destroy');
    
});

require __DIR__.'/auth.php';