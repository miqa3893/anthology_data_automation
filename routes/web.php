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
});

Route::get('/oauth', function () {
    // return view('oauth');
    return redirect('/home');
})->name('oauth');

Route::get('/home', 'UploadController@input')->name('home');
Route::patch('/confirm', 'UploadController@confirm')->name('confirm');

Route::post('/complete', function () {
    return view('complete');
})->name('complete');


// Route::get('/oauth', '');
