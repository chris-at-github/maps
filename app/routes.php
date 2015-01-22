<?php

// Routes to model injection
Route::model('world', 'App\Models\World', function() {
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

Route::get('world/{world}', array(
	'as'		=> 'world.index',
	'uses' 	=> 'App\Controllers\WorldController@index'
));

Route::get('tile/{x}/{y}', 'App\Controllers\World\TileController@index');