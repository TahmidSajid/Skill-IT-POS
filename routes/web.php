<?php

use App\Http\Controllers\ModeratorsController;
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

/**
 * Define the routes for the application.
 *
 * These routes provide access to various pages and functionality within the application,
 * including the home page, profile page, course listing, student management, enrollment,
 * and payment processing.
 *
 * @return void
 */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'view'])->name('profile');
Route::get('/courses', [App\Http\Controllers\CoursesController::class, 'view'])->name('courses');
Route::get('/category', [App\Http\Controllers\CategoriesController::class, 'view'])->name('caterory');
Route::get('/students', [App\Http\Controllers\StudentsController::class, 'view'])->name('students');
Route::get('/enrollment', [App\Http\Controllers\EnrollmentsController::class, 'view'])->name('enroll');
Route::get('/payments', [App\Http\Controllers\PaymentsController::class, 'view'])->name('payments');
Route::get('/payments/individual/{courseId}/{studentId}', [App\Http\Controllers\IndividualPaymentController::class, 'view'])->name('individual_payment');





/**
 * Define the routes for student-related functionality in the application.
 *
 * These routes provide access to the student login and logout pages, the student login form,
 * the student dashboard, the student profile page, the list of enrolled courses, and the
 * details of a specific enrolled course.
 *
 * @return void
 */
Route::get('/student/login', [App\Http\Controllers\StudentLoginController::class, 'student_login_page'])->name('student_login_page');
Route::get('/student/logout', [App\Http\Controllers\StudentLoginController::class, 'student_logout'])->name('student_logout');
Route::post('/student/login/form', [App\Http\Controllers\StudentLoginController::class, 'student_login'])->name('student_login');
Route::get('/student/dashboard/page', [App\Http\Controllers\StudentDashboardController::class, 'student_dashboard'])->name('student_dashboard');
Route::get('/student/profile/page', [App\Http\Controllers\StudentProfileController::class, 'student_profile'])->name('student_profile');
Route::get('/student/enrolled/courses', [App\Http\Controllers\EnrolledCoursesController::class, 'enrolled_courses'])->name('enrolled_courses');
Route::get('/student/enrolled/details/{enrollment_id}', [App\Http\Controllers\EnrolledDetailsController::class, 'enrolled_details'])->name('enrolled_details');


Route::resource('moderator',ModeratorsController::class);
