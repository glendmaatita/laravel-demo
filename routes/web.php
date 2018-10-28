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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function ($router) {
	Route::get('page', ['as' => 'page.index', 'uses' => 'PageController@index']);
	Route::get('page/create', ['as' => 'page.create', 'uses' => 'PageController@create']);
	Route::post('page/store', ['as' => 'page.store', 'uses' => 'PageController@store']);
	Route::get('page/{id}/edit', ['as' => 'page.edit', 'uses' => 'PageController@edit']);
	Route::put('page/{id}/update', ['as' => 'page.update', 'uses' => 'PageController@update']);
	Route::delete('page/{id}/destroy', ['as'   => 'page.destroy', 'uses' => 'PageController@destroy']);
});
