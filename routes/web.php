<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageMetaController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/user', function () {
//     return view('user.index');

//  });
  Route::get('/user', [UserViewController::class, 'index']);
  Route::get('/{slug}/show/{id}', [UserViewController::class, 'Page']);
  Route::get('/{slug}/show/{id}', [UserViewController::class, 'Page']);
//   Route::get('/shop/show', [UserViewController::class, 'Shop']);
//SHOP PRODUCT MODAL
Route::get('shop/product/{id}',  [App\Http\Controllers\UserViewController::class, 'ProductModal'])->name('ShopProduct');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('status');


////PAGE
Route::get('/{slug}/edit/{id}', [PageController::class, 'Page'])->middleware('status');

///////////////// Page Meta
Route::post('PageMeta-data',  [App\Http\Controllers\PageMetaController::class, 'data'])->name('PageMeta-data')->middleware('status');
Route::resource('PageMeta', App\Http\Controllers\PageMetaController::class)->middleware('status');

///////////////// Category
Route::get('Category-data',  [App\Http\Controllers\CategoryController::class, 'data'])->name('Category-data')->middleware('status');
Route::resource('Category', App\Http\Controllers\CategoryController::class)->middleware('status')->middleware('status');
Route::get('Del/Category/{id}',  [App\Http\Controllers\CategoryController::class, 'destroy'])->name('DelCat')->middleware('status');

///////////////// Product
Route::get('Product-data',  [App\Http\Controllers\ProductController::class, 'data'])->name('Product-data')->middleware('status');
Route::resource('Product', App\Http\Controllers\ProductController::class);
Route::get('Del/Product/{id}',  [App\Http\Controllers\ProductController::class, 'destroy'])->name('DelPost')->middleware('status');
///////////CAROSEL
Route::post('upload/store',  [App\Http\Controllers\ProductController::class, 'carosel_store'])->middleware('status');
Route::post('delete',  [App\Http\Controllers\ProductController::class, 'carosel_delete'])->middleware('status');


////////////////////////// Quiz Update ////////////////////////////////////////

    ///Tutorial
Route::get('tutorial-data',  [App\Http\Controllers\TutorialController::class, 'data'])->name('tutorial-data');
Route::resource('tutorial', App\Http\Controllers\TutorialController::class);


    ///Quiz
Route::get('quiz/questions/{id}',  [App\Http\Controllers\QuizController::class, 'question'])->name('quiz-question');
Route::post('quiz/question/store',  [App\Http\Controllers\QuizController::class, 'question_store'])->name('quiz-question-store');
// Route::get('quiz/question/list/{id}',  [App\Http\Controllers\QuizController::class, 'Quiz_Question'])->name('quiz-question-list');

Route::get('quiz-data',  [App\Http\Controllers\QuizController::class, 'data'])->name('quiz-data');
Route::resource('quiz', App\Http\Controllers\QuizController::class);

///// ADD new Question using Popup
Route::post('add/question/',  [App\Http\Controllers\QuizController::class, 'addQuestion'])->name('addQuestion');

    ///Quiz Question
Route::get('question-data',  [App\Http\Controllers\QuizQuestionController::class, 'data'])->name('question-data');
Route::resource('question', App\Http\Controllers\QuizQuestionController::class);

    ///Take Quiz
Route::resource('take', App\Http\Controllers\TakeQuizController::class);

    ///QuizChoice
Route::resource('choice', App\Http\Controllers\QuizChoiceController::class);
Route::get('storing',  [App\Http\Controllers\QuizChoiceController::class, 'storing'])->name('storing');

