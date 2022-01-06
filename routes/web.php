<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswersController;
use App\Http\COntrollers\AcceptAnswerController;
use App\Http\Controllers\FavoritesController;


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

Route::get('/questions/{slug}/',[ QuestionController::class,'show'])->name('questions.show');
Route::resource('questions', QuestionController::class)->except('show');
Route::resource('questions.answers', AnswersController::class)->except(['index','create','show']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/answers/{answer}/accept',[AcceptAnswerController::class,'AcceptAnswer'])->name('answers.accept');
Route::post('/questions/{question}/favorites',[FavoritesController::class,'store'])->name('questions.favorite');
Route::delete('/questions/{question}/favorites',[FavoritesController::class, 'destroy'])->name('questions.favorite.delete');
Route::post('/questions/{question}/vote',[FavoritesController::class, 'vote'])->name('question.vote');
Route::post('/answer/{answer}/vote',[FavoritesController::class, 'answerVote'])->name('answer.vote');
