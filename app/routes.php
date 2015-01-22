<?php

// Routes to model injection
Route::model('world', 'World', function() {
  return null;
});

// Routes for the world controller
Route::get('/', 'WorldController@index');

Route::get('world/wizard', array(
	'as'		=> 'world.wizard',
	'uses' 	=> 'WorldController@wizard'
));

Route::get('world/{world}', array(
	'as'		=> 'world.index',
	'uses' 	=> 'WorldController@index'
));

Route::post('world/save/{id}', array(
	'as'		=> 'world.save',
	'uses' 	=> 'WorldController@save'
));

Route::get('tile/{x}/{y}', 'WorldTileController@index');