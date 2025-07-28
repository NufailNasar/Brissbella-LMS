<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('dashboard');});

Route::get('/dashboard', function() { return view('dashboard'); });
// Route::get('/courses', function() { return view('courses'); });
// Route::get('/students', function() { return view('students'); });
// Route::get('/lectures', function() { return view('lectures'); });
Route::post('/courses/save', [AdminController::class, 'courseSave'])->name('courses.save');
Route::post('/lectures/save', [AdminController::class, 'lecturesSave'])->name('lecture.save');

Route::get('/courses', [AdminController::class, 'courseShow']);
Route::get('/students', [AdminController::class, 'studentShow']);
Route::get('/lectures', [AdminController::class, 'lectureShow']);