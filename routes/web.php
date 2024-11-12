<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolUserController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\ScoreController;

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
    return view('index');
});

Route::resource('schools', SchoolController::class);
Route::resource('school-users', SchoolUserController::class);
Route::resource('sections', SectionController::class);
Route::resource('classes', ClassController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('students', StudentController::class);
Route::resource('terms', TermController::class);
Route::resource('scores', ScoreController::class);
// Add other routes for Sections, Classes, etc.

//to handle the logins, registration, and redirects based on user roles.

// Super Admin Routes
Route::get('/super-admin/login', [AuthController::class, 'showSuperAdminLogin'])->name('super_admin.login');
Route::post('/super-admin/login', [AuthController::class, 'superAdminLogin']);

// School Routes
Route::get('/school/{plan}/register', [AuthController::class, 'showSchoolRegister'])->name('school.register');
Route::post('/school/register', [AuthController::class, 'schoolRegister']);
Route::get('/school/login', [AuthController::class, 'showSchoolLogin'])->name('school.login');
Route::post('/school/login', [AuthController::class, 'schoolLogin']);

// Teacher Routes
Route::get('/teacher/login', [AuthController::class, 'showTeacherLogin'])->name('teacher.login');
Route::post('/teacher/login', [AuthController::class, 'teacherLogin']);

// Parent Routes
Route::get('/parent/login', [AuthController::class, 'showParentLogin'])->name('parent.login');
Route::post('/parent/login', [AuthController::class, 'parentLogin']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
