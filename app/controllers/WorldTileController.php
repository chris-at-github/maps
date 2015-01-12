<?php

class WorldTileController extends ApplicationController {
	public function index($x = 0, $y = 0)	{
		$tile = new WorldTile(array(
			'x'	=> $x,
			'y'	=> $y
		));

		return View::make('world.tile.index')
			->with('tile', $tile);
	}
}