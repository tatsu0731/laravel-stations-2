<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PostController;

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

// Route::get('practice', function() {
//     return response('practice');
// });

// Route::get('practice2', function() {
//     $test = 'practice2';
// return response($test);
// });

// Route::get('practice3', function() {
//     $test = 'test';
// return response($test);
// });

// Route::get('/practice', [PracticeController::class, 'sample']);
// Route::get('/practice2', [PracticeController::class, 'sample2']);
// Route::get('/practice3', [PracticeController::class, 'sample3']);

// Route::get('/getPractice', [PracticeController::class, 'getPractice']);
// 映画一覧の取得
Route::get('admin/movies', [PostController::class, 'index'])->name('movie.index');
// 映画の登録画面の表示
Route::get('admin/movies/create', [PostController::class, 'create'])->name('movie.create');
// 映画の登録処理
Route::post('admin/movies/store', [PostController::class, 'store'])->name('movie.store');
// idに対応するmoviesの編集画面を表示する
Route::get('admin/movies/{id}/edit', [PostController::class, 'edit'])->name('movie.edit');
Route::patch('admin/movies/{id}/update', [PostController::class, 'update'])->name('movie.update');
