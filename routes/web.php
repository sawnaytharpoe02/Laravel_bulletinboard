<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

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


Route::get('/', [PostController::class, 'index'])->middleware(['auth']);

// Posts
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/post', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{postId}/detail', [PostController::class, 'show'])->middleware('auth');
Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::put('/posts/{postId}/update', [PostController::class, 'update'])->middleware('auth');
Route::delete('/posts/{postId}/delete', [PostController::class, 'destroy'])->middleware('auth');
Route::get('/posts/manage', [PostController::class, 'manage'])->middleware('auth');

// Users
Route::get('/users', [UserController::class, 'index'])->middleware(['auth','admin']);
Route::get('/users/create', [UserController::class, 'create'])->middleware(['auth', 'admin']);
Route::post('/user', [UserController::class, 'store'])->middleware('auth');
Route::get('/users/{userId}/detail', [UserController::class, 'show'])->middleware('auth');
Route::get('/users/{userId}/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/users/{userId}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/{userId}/update', [UserController::class, 'update'])->middleware('auth');
Route::delete('/users/{userId}/delete', [UserController::class, 'destroy'])->middleware('auth');

// User Registration
Route::get('/register', [UserController::class, 'showRegistrationForm'])->middleware('guest');
Route::post('/post-register', [UserController::class, 'submitRegistrationForm'])->middleware('guest');

// User Login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/post-login', [UserController::class, 'authenticate'])->middleware('guest');

// User Logout
Route::post('logout', [UserController::class, 'logout'])->middleware('auth');

// Change Password
Route::post('update-password', [UserController::class, 'updatePassword'])->middleware('auth');

// Forgot Password
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get')->middleware('guest');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post')->middleware('guest');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get')->middleware('guest');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post')->middleware('guest');

// File Uploading
Route::post('/tmp-upload', [UserController::class, 'tmpUpload']);
Route::delete('/tmp-delete', [UserController::class, 'tmpDelete']);
Route::post('/users/{userId}/clear-profile-image', [UserController::class, 'clearProfileImage']);

// Excel Export Import
Route::get('posts-export', [PostController::class, 'fileExport'])->name('posts.export')->middleware('auth');
Route::get('posts-import', [PostController::class, 'showFileImport'])->name('posts.import.get')->middleware('auth');
Route::post('posts-import', [PostController::class, 'fileImport'])->name('posts.import.post')->middleware('auth');
