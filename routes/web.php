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
    return view('home');
});

Auth::routes();

Route::get('/authors/{name}', [
    'uses' => 'PageController@index',
])->where('name', '[A-Za-z-]+');

Route::get('/authors/{name}/{book}/{page}', [
    'uses' => 'PageController@index',
])->where('name', '[A-Za-z-]+')->where('book', '[A-Za-z-1-9]+')->where('page', '[1-9]+');

// Route::get('/home', 'HomeController@index')->name('home');
