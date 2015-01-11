<?php

class WorldMap extends Eloquent {
	public function getTiles() {
		$tiles = array();

		for($x = 0; $x <= Config::get('world.map.size.x'); $x++) {
			for($y = 0; $y <= Config::get('world.map.size.y'); $y++) {
				$tile = new WorldTile();
				$tile->x = $x;
				$tile->y = $y;

				$tiles[] = $tile;
			}
		}

		return $tiles;
	}
}