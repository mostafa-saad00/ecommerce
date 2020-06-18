<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT', 10);
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
Route::delete('/destroy-language/{language}', 'admin\LanguagesController@destroy')->name('admin.language.destroy');
/* End Languages routes */

/* Categories routes */
Route::get('/list-categories', 'admin\CategoriesController@index')->name('admin.categories.list');
Route::post('/store-category', 'admin\CategoriesController@store')->name('admin.category.store');
Route::get('/edit-category/{category}', 'admin\CategoriesController@edit')->name('admin.category.edit');
// Route::put('/update-category/{category}', 'admin\CategoriesController@update')->name('admin.category.update');
Route::delete('/destroy-category/{category}', 'admin\CategoriesController@destroy')->name('admin.category.destroy');
/* End Categories routes */




