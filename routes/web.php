<?php

Route::get('/', 'HomeController@index');

// Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function () {
    // Default Panel Url
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Users
    Route::group(['prefix' => 'users'], function(){
    	Route::get('/', 'UsersController@index')->name('users');
    	Route::get('/datatable', 'UsersController@datatable')->name('users.datatable');
    	Route::get('/create', 'UsersController@create')->name('users.create');
    	Route::post('/create', 'UsersController@postCreate');
    	Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    	Route::post('/{user}/edit', 'UsersController@postEdit');
    	Route::get('/{user}/delete', 'UsersController@delete')->name('users.delete');
    });

    // Settings
    Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function(){
    	Route::get('rules', 'RulesController@index')->name('settings.rules');
    	Route::post('rules', 'RulesController@postIndex');
    	Route::get('teamspeak', 'TeamSpeakController@index')->name('settings.teamspeak');
    	Route::post('teamspeak', 'TeamSpeakController@postIndex');
    	Route::get('raidtime', 'RaidTimeController@index')->name('settings.raidtime');
    	Route::post('raidtime', 'RaidTimeController@postIndex');
    });
});
