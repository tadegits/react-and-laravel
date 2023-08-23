<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


//Route chech on laravel
Route::get('/student', [StudentController::class, 'index']);
Route::post('/insertstudent', [StudentController::class, 'store']);
