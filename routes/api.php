<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/posts', 'Api\PostController@index');
Route::get('/posts/{slug}', 'Api\PostController@show');
//rotta per i commenti:
Route::post('/comments', 'Api\CommentController@store');
// rotta per categorie
Route::get('/categories', 'Api\CategoryController@index');
Route::get('/categories/{slug}', 'Api\CategoryController@show');