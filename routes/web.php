<?php

// User
Route::get('login', 'PagesController@showLogin');


// Admin
Route::get('admin', 'PagesController@admin');
Route::post('signin', 'UsersController@signin');
Route::get('logout', 'UsersController@logout');

// Pages
Route::get('/', 'PagesController@index');

// Location
Route::group(['prefix' => 'location'], function() {
	Route::get('getLocationRecords', 'LocationsController@getLocationRecords');
});
Route::resource('location', 'LocationsController');

// Food
Route::group(['prefix' => 'food'], function() {
	Route::get('getFoodRecords', 'FoodsController@getFoodRecords');
});
Route::resource('food', 'FoodsController');

// Tour
Route::group(['prefix' => 'tour'], function() {
	Route::get('getTourRecords', 'ToursController@getTourRecords');
});
Route::resource('tour', 'ToursController');
