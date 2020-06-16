<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'admin\DashboardController@index')->name('admin.dashboard');




Route::group(['namespace' => 'admin', 'middleware' => 'guest'], function(){

	Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
	Route::post('login', 'LoginController@login')->name('admin.login');
});


/* Languages routes */
Route::get('/list-languages', 'admin\LanguagesController@index')->name('admin.languages.list');
Route::get('/create-language', 'admin\LanguagesController@create')->name('admin.language.create');
Route::post('/store-language', 'admin\LanguagesController@store')->name('admin.language.store');
Route::get('/edit-language/{language}', 'admin\LanguagesController@edit')->name('admin.language.edit');
Route::put('/update-language/{language}', 'admin\LanguagesController@update')->name('admin.language.update');

/* End Languages routes */


