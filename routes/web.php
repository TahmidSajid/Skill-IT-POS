<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'view'])->name('profile');
Route::get('/courses', [App\Http\Controllers\CoursesController::class, 'view'])->name('courses');
Route::get('/category', [App\Http\Controllers\CategoriesController::class, 'view'])->name('caterory');
Route::get('/students', [App\Http\Controllers\StudentsController::class, 'view'])->name('students');
