<?php
namespace App\Controllers\World;

class TileController extends \App\Controllers\ApplicationController {
	public function index($x = 0, $y = 0)	{
		$tile = new \App\Models\World\Tile(array(
			'x'	=> $x,
			'y'	=> $y
		));

		return \View::make('world.tile.index')
			->with('tile', $tile);
	}
}