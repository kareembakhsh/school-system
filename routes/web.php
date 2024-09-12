<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;

Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);
Route::resource('classes', ClassController::class);