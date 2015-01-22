<?php

// Routes to model injection
Route::model('world', 'World', function() {
  return null;
});

// Routes for the world controller
Route::get('/', 'WorldController@index');

Route::any('world/store/{id?}', array(
	'as'		=> 'world.store',
	'uses' 	=> 'WorldController@store'
));

Route::get('world/wizard', array(
	'as'		=> 'world.wizard',
	'uses' 	=> 'WorldController@wizard'
));

Route::get('world/{world}', array(
	'as'		=> 'world.index',
	'uses' 	=> 'WorldController@index'
));

Route::get('tile/{x}/{y}', 'WorldTileController@index');