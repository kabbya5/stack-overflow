<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('questions', QuestionController::class)->only([
    'index','store','update','destory','create'
]);
Route::resource('questions', QuestionController::class)->except('show');
Route::get('/questions/{slug}/',[ QuestionController::class,'show'])->name('questions.show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');