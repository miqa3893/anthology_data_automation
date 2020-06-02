<?php

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
    return view('index');
})->name('index');

// Twitter API 認証
Route::get('oauth/login', 'TwitterLoginController@getAuth')->name('login');

// Twitter API 認証後コールバック
Route::get('oauth/callback', 'TwitterLoginController@authCallback')->name('auth');

// ログイン後提出フォーム
Route::get('/home', 'UploadController@input')->name('home');

// 提出データ確認
Route::patch('/confirm', 'UploadController@confirm')->name('confirm');

// 提出実行
Route::post('/complete', 'SubmissionController@submitData')->name('complete');
