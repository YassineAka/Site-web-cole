<?php

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

Route::get('/','Rest@index');

Route::get('/teachers','Rest@teachers');

Route::get('/version','Rest@version');

Route::get('/courses','Rest@courses');

Route::get('/courses/add/{id}/{name}','Rest@add');
Route::get('/missions','Rest@missions');
