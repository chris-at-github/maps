<?php
namespace App\Controllers\World;

class MapController extends \App\Controllers\ApplicationController {

	public function index(\App\Models\World\Map $map = null)	{
		if($map === null) {
			return \Redirect::route('world.wizard');
		} else {

			// save id of current map for later request without map parameter
			\Session::put('world.map', $map->id);
		}

		return \View::make('world.map.index')
			->with('map', $map)
			->with('tiles', $map->getTiles());
	}

	public function wizard() {
		return \View::make('world.map.wizard')
			->with('maps', \App\Models\World\Map::all())
			->with('error', \Session::get('error'));
	}

	public function store($id = null) {
		$map 				= new \App\Models\World\Map();
		$arguments	= \Input::all();

		if($id !== null) {
			$map = \App\Models\World\Map::find($id);
		}

		if(empty($arguments['x']) === false || empty($arguments['y']) === false) {
			$map->x = $arguments['x'];
			$map->y = $arguments['y'];
			$map->generateTiles();
		}

		if($map->store($arguments) === false) {
			return \Redirect::back()
				->withInput()
				->withErrors($map->errors());
		}

		return \Redirect::route('world.index', array('map' => $map->id));
	}
}