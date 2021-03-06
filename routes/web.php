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

Route::get('/addTeacher','Rest@inscriptionProf');

Route::get('/courses/add/{id}/{name}/{nbHours}','Rest@addCourse');

Route::get('/missions','Rest@missions');

Route::get('/missions/add/{title}/{nbHours}/{cat}','Rest@addMission');

Route::get('/courses/delete/{id}','Rest@deleteCourse');

