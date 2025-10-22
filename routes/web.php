<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;

Route::resource('employees',EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::get('/', function () {
    return view('welcome');
});