<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('front.home');
});





Route::get('/home', 'HomeController@index')->name('home');
