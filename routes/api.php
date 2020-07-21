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

Route::get('news', 'NewsController@allArticles');
Route::post('news/create', 'NewsController@create');
Route::get('news/{id}', 'NewsController@article');
Route::get('news/author/{author}', 'NewsController@newsByAuthor');
Route::get('news/rubric/{rubric}', 'NewsController@newsByRubric');
Route::get('news/heading/{heading}', 'NewsController@newsByHeading');

Route::get('authors/all', 'UserController@allAuthors');
Route::post('author/create', 'UserController@create');

Route::post('rubric/create', 'RubricController@create');