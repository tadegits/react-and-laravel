<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentController;


//Route for Student CRUD on laravel
Route::get('/student', [StudentController::class, 'index']);
Route::post('/insertstudent', [StudentController::class, 'store']);
Route::get('/editstudent/{id}', [StudentController::class, 'edit']);
Route::post('/updatestudent/{id}', [StudentController::class, 'update']);
Route::delete('/deletestudent/{id}', [StudentController::class, 'destroy']);

//Route for Comment on laravel
Route::post('/insertcomment', [CommentController::class, 'store']);
