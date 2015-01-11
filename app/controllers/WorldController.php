<?php

class WorldController extends ApplicationController {

	public function index()	{
		$map = new WorldMap();

		// dd($map->getSize());

		return View::make('world.map.index')
			->with('map', $map)
			->with('tiles', $map->getTiles());
	}
}