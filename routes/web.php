<?php
Route::get('links', 'LinksController@index');
Route::get('links/create', 'LinksController@create');
Route::post('links/store', 'LinksController@store');
//Route::get('links/edit/{id}', 'LinksController@edit');
//Route::post('links/update/{id}', 'LinksController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users/{id}', 'UsersController@show')->name('users.show');
    Route::post('/users/{id}', 'UsersController@update_avatar');
});

Route::resource('links', 'LinksController');