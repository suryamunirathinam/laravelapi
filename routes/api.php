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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//list articles
Route::get('articles','ArticleController@index');
//list single articles 
Route::get('article/{id}','ArticleController@show');
//create article
Route::post('article','ArticleController@store');
//update articles
Route::put('article','ArticleController@store');
//delete articles
Route::delete('article/{id}','ArticleController@destroy');
//get comments


// for comments table
Route::get('comments','CommentController@index');
Route::get('comment/{id}','CommentController@show');
Route::post('comment','CommentController@store');
Route::put('comment','CommentController@store');
Route::delete('comment','CommentController@destroy');