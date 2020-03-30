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

// Todo cara 1
Route::get('/','TodolistsController@index');
Route::get('/{todolist}','TodolistsController@show');
Route::post('/','TodolistsController@store');
Route::delete('/{todolist}','TodolistsController@destroy');
Route::get('/{todolist}/edit','TodolistsController@edit');
Route::patch('/{todolist}','TodolistsController@update');

// Todo cara 2
// Route::resource('/','TodolistsController');
//tapi gak bisa mungkin salah penamaan

