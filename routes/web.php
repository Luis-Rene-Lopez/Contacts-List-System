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


Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/edit/{id}', 'HomeController@edit')->middleware('auth');

Route::post('newContact', 'ContactsController@create')->name('newContact')->middleware('auth');

Route::put('/updateContact/{id}', 'ContactsController@update')->name('update.contact')->middleware('auth');

Route::delete('/deleteContact/{id}', 'ContactsController@destroy')->name('delete.contact')->middleware('auth');
