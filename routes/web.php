<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//----------Rotas de administrador ------------//
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
});

// -------- Rotas de Cursos ---------- //
Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth.isAdmin')->name('courses.create');
Route::post('course', [CourseController::class, 'store'])->name('courses.store');
Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->middleware('auth.isAdmin')->name('courses.edit');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::put('/course/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/course/{id}', [CourseController::class, 'destroy'])->middleware('auth.isAdmin')->name('courses.destroy');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');


// -------- Rotas de Alunos ---------- //
Route::get('/students/create', [StudentController::class, 'create'])->middleware('auth.isAdmin')->name('students.create');
Route::post('student', [StudentController::class, 'store'])->name('students.store');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->middleware('auth.isAdmin')->name('students.edit');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('students.show');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->middleware('auth.isAdmin')->name('students.destroy');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');


