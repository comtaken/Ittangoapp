<?php

use App\Http\Controllers\IttangoController;

use App\Http\Controllers\AuthCountroller;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//ログインページ表示
Route::get('/login', [AuthCountroller::class,'login'])->name('login');

//ログイン処理
Route::get('/auth', [AuthCountroller::class,'auth'])->name('auth');

//ログアウト
Route::get('/logout', [AuthCountroller::class,'logout'])->name('logout');

//メインメニュー
Route::get('/main', [IttangoController::class, 'main'])->name('main');

//ユーザー新規登録表示
Route::get('/createUser', [AuthCountroller::class,'createUser'])->name('createUser');

//ユーザー新規登録処理
/**
 * urlがgetでアクセスされた場合、errorとなる為、matchとしてる。
 *controller内でloginページに戻す処理をしている。
 */
Route::match(['get', 'post'],'/storeUser', [AuthCountroller::class,'storeUser'])->name('storeUser');
//一覧表示
Route::get('/index', [IttangoController::class,'index'])->name('index');

//検索処理
Route::get('/seach', [IttangoController::class,'seach'])->name('seach');

//新規登録画面
Route::get('/create', [IttangoController::class,'create'])->name('create');

//新規登録処理
/**
 * urlがgetでアクセスされた場合、errorとなる為、matchとしてる。
 *controller内でloginページに戻す処理をしている。
 */
Route::match(['get', 'post'],'/store', [IttangoController::class,'store'])->name('store');

//編集画面
Route::get('/edit/{id}', [IttangoController::class,'edit']);

//編集・削除処理
/**
 * urlがgetでアクセスされた場合、errorとなる為、matchとしてる。
 *controller内でloginページに戻す処理をしている。
 */
Route::match(['get', 'post'],'/up_dest',[IttangoController::class,'up_dest'])->name('up_dest');