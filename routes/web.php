<?php

use App\Http\Controllers\IttangoController;
use Illuminate\Support\Facades\Route;

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

//一覧表示
Route::get('/index', [IttangoController::class,'index'])->name('index');

//検索処理
Route::get('/seach', [IttangoController::class,'seach'])->name('seach');

//新規登録画面
Route::get('/create', [IttangoController::class,'create'])->name('create');

//新規登録処理
Route::post('/store', [IttangoController::class,'store'])->name('store');

//編集画面
Route::get('/edit/{id}', [IttangoController::class,'edit']);

//編集・削除処理
Route::post('/up_dest',[IttangoController::class,'up_dest'])->name('up_dest');