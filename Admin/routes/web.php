<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function() { return view('dashboard'); });
Route::get('/courses', function() { return view('courses'); });
Route::get('/students', function() { return view('students'); });
Route::get('/lectures', function() { return view('lectures'); });