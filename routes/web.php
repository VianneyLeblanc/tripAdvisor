<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@form')->name('login');
Route::get('/register', 'Auth\RegisterController@form')->name('register');
Route::get('/location/login', 'Auth\LoginController@form')->name('login');
Route::get('/location/register', 'Auth\RegisterController@form')->name('register');

Route::get('/', 'LocationController@home');
Route::get('/{id}', 'LocationController@detail');
Route::get('/location/{id}', 'LocationController@detail');
Route::post('/location/searchResult', 'LocationController@searchResult');

Route::get('abo_motpasse/abo_mel', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('abo_motpasse.email');
Route::post('abo_motpasse/abo_mel', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('abo_motpasse/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('abo_motpasse.request');
Route::post('abo_motpasse/reset', 'Auth\ResetPasswordController@postReset')->name('abo_motpasse.reset');