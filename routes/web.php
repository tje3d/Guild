<?php

Route::get('/', 'HomeController@index');

// Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'panel'], function () {
    // Default Panel Url
    Route::get('panel', 'PanelController');

    // Users
    Route::get('users', 'UsersController@index');
});
