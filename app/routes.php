<?php

// Routes to model injection
Route::model('map', 'App\Models\World\Map', function() {
	return null;
});

// Routes for the world controller
Route::get('/', 'App\Controllers\World\MapController@wizard');

Route::any('world/store/{id?}', array(
	'as'		=> 'world.store',
	'uses' 	=> 'App\Controllers\World\MapController@store'
));

Route::get('world/wizard', array(
	'as'		=> 'world.wizard',
	'uses' 	=> 'App\Controllers\World\MapController@wizard'
));

Route::get('world/{map}', array(
	'as'		=> 'world.index',
	'uses' 	=> 'App\Controllers\World\MapController@index'
));

Route::get('world/tile/{x}/{y}', 'App\Controllers\World\TileController@index');