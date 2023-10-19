<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/test-template', [Controller::class, 'testTemplate']);
Route::get('/student', [Controller::class, 'student']);
Route::resource('student', StudentController::class);

//Route::resource('products', ProductController::class);
//Route::resource('student', StudentController::class);


//Route::get('/student', [Controller::class, 'testTemplate']);