<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
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
Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
});

// -------- Rotas de Cursos ---------- //
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('course', [CourseController::class, 'store'])->name('courses.store');
Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::put('/course/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');


