<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('dashboard');});

Route::get('/dashboard', function() { return view('dashboard'); });

Route::get('/lectures', [AdminController::class, 'lectureShow']);
Route::post('/lectures/save', [AdminController::class, 'lecturesSave'])->name('lecture.save');
Route::get('/lectures/{id}', [AdminController::class, 'courseView'])->name('lectures.view');
Route::get('/lectures/update/{id}', [AdminController::class, 'courseUpdateshow'])->name('lectures.update');
Route::get('/lectures/delete/{id}', [AdminController::class, 'courseDelete'])->name('lectures.delete');
Route::post('/lectures/edit', [AdminController::class, 'courseUpdate']);

Route::post('/student/save', [AdminController::class, 'studentSave'])->name('student.save');
Route::get('/students', [AdminController::class, 'studentShow']);

Route::post('/courses/save', [AdminController::class, 'courseSave'])->name('courses.save');
Route::get('/courses', [AdminController::class, 'courseShow']);
Route::get('/courses/{id}', [AdminController::class, 'courseView'])->name('courses.view');
Route::get('/courses/update/{id}', [AdminController::class, 'courseUpdateshow'])->name('courses.update');
Route::get('/courses/delete/{id}', [AdminController::class, 'courseDelete'])->name('courses.delete');
Route::post('/courses/edit', [AdminController::class, 'courseUpdate']);

