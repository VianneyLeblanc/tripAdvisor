<?php

Route::get('/', 'LocationController@home');
Route::get('/{id}', 'LocationController@detail');
Route::post('/location/searchResult', 'LocationController@searchResult');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');