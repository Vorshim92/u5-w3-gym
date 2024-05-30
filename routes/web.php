<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
// use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('activities', ActivityController::class);
Route::resource('courses', CourseController::class);

//user auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/courses/{course}/book', [CourseController::class, 'book'])->name('courses.book');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'adminUserEdit'])->name('admin.users.edit');
    Route::get('/admin/users/{user}/show', [AdminController::class, 'adminShow'])->name('admin.users.show');
    Route::patch('/admin/users/{user}/courses/{course}/status/{status}', [AdminController::class, 'updateStatus'])->name('admin.users.updateStatus');
    Route::delete('/admin/users/{user}/courses/{course}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});



//guest auth
Route::middleware('guest')->group(function () {
    Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])
        ->name('register');
});



require __DIR__ . '/auth.php';
