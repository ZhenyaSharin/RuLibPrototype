<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// api methods Controllers/Api/v1

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/getallauthors', [
    'uses' => 'AuthorController@getAllAuthors',
]);

Route::post('/getsomebooks', [
    'uses' => 'BookController@getSomeBooks',
]);

Route::post('/getsomeanotherauthors', [
    'uses' => 'AuthorController@getSomeAuthors',
]);

Route::post('/getauthorsbooks', [
    'uses' => 'BookController@getAuthorsBooks',
]);

Route::post('/getauthorbyname', [
    'uses' => 'AuthorController@getAuthorByName',
]);
