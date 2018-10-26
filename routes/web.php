<?php

Route::get('/', 'LocationController@home');
Route::get('/location/id/'|| '/id/', 'LocationController@locationDef')->;
Route::post('/location/searchResult', 'LocationController@searchResult');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');