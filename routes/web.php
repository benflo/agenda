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



Auth::routes();

Route::get('/events', 'EventController@index')->name('event');
Route::get('/', 'EventController@index')->name('events');
Route::post('/events', 'EventController@addEvent')->name('events.add');