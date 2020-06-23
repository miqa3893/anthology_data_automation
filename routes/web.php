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

// トップページ
Route::get('/', function () {
    return view('index');
})->name('index');

// ログイン・ログアウト（Twitter API 認証）
Route::get('oauth/login', 'TwitterLoginController@getAuth')->name('login');
Route::get('logout', 'TwitterLoginController@logout')->name('logout');

// Twitter API 認証後コールバック
Route::get('oauth/callback', 'TwitterLoginController@authCallback')->name('auth');

// ユーザマイページに関するルーティング
Route::resource('users','UserController');

// 提出フォーム
Route::get('/submit', 'UploadController@index')->name('submit');

// 提出データ確認
Route::post('/confirm', 'UploadController@confirm')->name('confirm');

// 提出実行
Route::post('/complete', 'SubmissionController@submit')->name('complete');

//動作確認用
Route::get('/dummy', function () {
    return view('user.view');
});
