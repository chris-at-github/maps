<?php

// Routes to model injection
Route::model('map', 'App\Models\World\Map', function() {
	throw new \App\Exceptions\World\Map(null, \App\Exceptions\World\Map::NOT_FOUND);
});

// Routes for the game controller
// -------------------------------------------------------------------------------
Route::get('/', array(
	'as'		=> 'game.index',
	'uses'	=> 'App\Controllers\GameController@index'
));

Route::any('/login', array(
	'as'		=> 'game.login',
	'uses'	=> 'App\Controllers\GameController@login'
));

// Routes for the world controller
// -------------------------------------------------------------------------------
Route::any('world/store/{id?}', array(
	'as'		=> 'world.store',
	'uses' 	=> 'App\Controllers\World\MapController@store'
));

Route::get('world/wizard', array(
	'as'		=> 'world.wizard',
	'uses' 	=> 'App\Controllers\World\MapController@wizard'
));

Route::get('world/{map?}', array('as' => 'world.index', function($map = null) {
	if($map === null && \Session::get('world.map') !== null) {
		$map = \App\Models\World\Map::find(\Session::get('world.map'));
	}

	if($map === null) {
		return App::make('App\Controllers\World\MapController')->wizard();
	}

	return App::make('App\Controllers\World\MapController')->index($map);
}));

Route::get('world/tile/{x}/{y}', 'App\Controllers\World\TileController@index');


// Routes for plugin controller
// -------------------------------------------------------------------------------
Route::get('plugins/', array(
	'as'		=> 'plugin.index',
	'uses' 	=> 'App\Controllers\Plugins\PluginController@index'
));

Route::get('plugins/install/{key}', array(
	'as'		=> 'plugin.install',
	'uses' 	=> 'App\Controllers\Plugins\PluginController@install'
));