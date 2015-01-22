<?php
namespace App\Controllers;

class WorldController extends ApplicationController {

	public function index(\App\Models\World\Map $map = null)	{
		if($map === null) {
			return \Redirect::route('world.wizard');
		}

		return \View::make('world.map.index')
			->with('map', $map)
			->with('tiles', $map->getTiles());
	}

	public function wizard() {
	}

	public function store($id = null) {
		$map 				= new \App\Models\World\Map();
		$arguments	= \Input::all();

		if($id !== null) {
			$map = \App\Models\World\Map::find($id);
		}

		if($map->store($arguments) === false) {
			return \Redirect::back()
				->withInput()
				->withErrors($map->errors());
		}

		return \Redirect::route('world.index', array('map' => $map->id));
	}
}