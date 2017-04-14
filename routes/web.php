<?php

// Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Site
 */
Route::group([], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/rules', 'RulesController')->name('rules');

    // Contact
    Route::group(['prefix' => 'contact'], function(){
    	Route::get('/', 'ContactController@index')->name('contact');
    	Route::post('/', 'ContactController@postIndex');
    });

    // Apply
    Route::group(['prefix' => 'apply'], function(){
    	Route::get('/', 'ApplyController@index')->name('apply');
    	Route::post('/', 'ApplyController@searchHero');

    	Route::get('/questions', 'ApplyController@questions')->name('apply.questions');
    	Route::post('/questions', 'ApplyController@postQuestions');
    });
});

/**
 * Panel
 */
Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function () {
    // Default Panel Url
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@index')->name('users');
        Route::get('/datatable', 'UsersController@datatable')->name('users.datatable');
        Route::get('/create', 'UsersController@create')->name('users.create');
        Route::post('/create', 'UsersController@postCreate');
        Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
        Route::post('/{user}/edit', 'UsersController@postEdit');
        Route::get('/{user}/delete', 'UsersController@delete')->name('users.delete');
    });

    // Access Control
    Route::group(['prefix' => 'rbac', 'namespace' => 'Rbac'], function(){
    	Route::group(['prefix' => 'roles'], function(){
    		Route::get('/', 'RolesController@index')->name('rbac.roles');
    		Route::get('/datatable', 'RolesController@datatable')->name('rbac.roles.datatable');
    		Route::get('/create', 'RolesController@create')->name('rbac.roles.create');
	        Route::post('/create', 'RolesController@postCreate');
	        Route::get('/{role}/edit', 'RolesController@edit')->name('rbac.roles.edit');
	        Route::post('/{role}/edit', 'RolesController@postEdit');
	        Route::get('/{role}/delete', 'RolesController@delete')->name('rbac.roles.delete');
    	});

    	Route::group(['prefix' => 'permissions'], function(){
    		Route::get('/', 'PermissionsController@index')->name('rbac.permissions');
    		Route::get('/datatable', 'PermissionsController@datatable')->name('rbac.permissions.datatable');
    		Route::get('/create', 'PermissionsController@create')->name('rbac.permissions.create');
	        Route::post('/create', 'PermissionsController@postCreate');
	        Route::get('/{permission}/edit', 'PermissionsController@edit')->name('rbac.permissions.edit');
	        Route::post('/{permission}/edit', 'PermissionsController@postEdit');
	        Route::get('/{permission}/delete', 'PermissionsController@delete')->name('rbac.permissions.delete');
    	});
    });

    // Characters
    Route::group(['prefix' => 'characters'], function () {
        Route::get('/', 'CharactersController@index')->name('characters');
        Route::get('datatable', 'CharactersController@datatable')->name('characters.datatable');
        Route::get('create', 'CharactersController@create')->name('characters.create');
        Route::post('create', 'CharactersController@postCreate');
        Route::get('{character}/delete', 'CharactersController@delete')->name('characters.delete');
        Route::get('{character}/edit', 'CharactersController@edit')->name('characters.edit');
        Route::post('{character}/edit', 'CharactersController@postEdit');
        Route::get('{character}/delete', 'CharactersController@delete')->name('characters.delete');
        Route::get('{character}/setstatus/{type}', 'CharactersController@setStatus')->name('characters.setstatus');
    });

    Route::group(['prefix' => 'imagegallery'], function(){
    	Route::get('/', 'ImageGalleryController@index')->name('imagegallery');
    	Route::post('/', 'ImageGalleryController@postIndex');
    	Route::get('/{imageGallery}/delete', 'ImageGalleryController@delete')->name('imagegallery.delete');
    });

    // Settings
    Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function () {
        Route::get('rules', 'RulesController@index')->name('settings.rules');
        Route::post('rules', 'RulesController@postIndex');
        Route::get('teamspeak', 'TeamSpeakController@index')->name('settings.teamspeak');
        Route::post('teamspeak', 'TeamSpeakController@postIndex');
        Route::get('raidtime', 'RaidTimeController@index')->name('settings.raidtime');
        Route::post('raidtime', 'RaidTimeController@postIndex');
        Route::get('stream', 'StreamController@index')->name('settings.stream');
        Route::post('stream', 'StreamController@postIndex');
    });

    // Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::post('/', 'ProfileController@postIndex');
    });
});
