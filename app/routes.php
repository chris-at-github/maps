<?php

// Routes to model injection
Route::model('map', 'App\Models\World\Map', function() {
  return null;
});

// Routes for the world controller
Route::get('/', 'App\Controllers\WorldController@index');

Route::any('world/store/{id?}', array(
	'as'		=> 'world.store',
	'uses' 	=> 'App\Controllers\WorldController@store'
));

Route::get('world/wizard', array(
	'as'		=> 'world.wizard',
	'uses' 	=> 'App\Controllers\WorldController@wizard'
));

Route::get('world/{map}', array(
	'as'		=> 'world.index',
	'uses' 	=> 'App\Controllers\WorldController@index'
));

Route::get('tile/{x}/{y}', 'App\Controllers\World\TileController@index');