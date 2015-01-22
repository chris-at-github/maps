<?php

class WorldController extends ApplicationController {

	public function index(World $world = null)	{
		if($world === null) {
			return Redirect::route('world.wizard');
		}

		return View::make('world.map.index')
			->with('world', $world)
			->with('tiles', $world->getTiles());
	}

	public function wizard() {
	}

	public function save() {
		$map = new Map();
		$map->name = Input::get('name');

		$map->save();
		dd($map->id);
	}
}